<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

// Подключаем модуль веб-форм
CModule::IncludeModule("form");

function writeToLog($data, $title = '') {
	$log = "\n------------------------\n";
	$log .= date("Y.m.d G:i:s") . "\n";
	$log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
	$log .= print_r($data, 1);
	$log .= "\n------------------------\n";
	file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/hook.log', $log, FILE_APPEND);
	return true;
}

// Проверка валидности отправки формы
if (check_bitrix_sessid()) {
	$formErrors = CForm::Check($_POST['WEB_FORM_ID'], $_REQUEST, false, "Y", 'Y');
	
	// Если не все обязательные поля заполнены
	if (count($formErrors)) {
		echo json_encode(['success' => false, 'errors' => $formErrors]);
	} elseif ($RESULT_ID = CFormResult::Add($_POST['WEB_FORM_ID'], $_REQUEST)) {
		
		// Отправляем все события как в компоненте веб-форм
		CFormCRM::onResultAdded($_POST['WEB_FORM_ID'], $RESULT_ID);
		CFormResult::SetEvent($RESULT_ID);
		CFormResult::Mail($RESULT_ID);
		
		// Данные для создания сделки в Bitrix24 CRM
		$queryUrl = 'https://armadastroy.bitrix24.ru/rest/43/utnw8v3hcnz4ls31/crm.deal.add.json';
		$title = 'Заявка на аренду: ' . $_POST['product_name'];
		$productName = $_POST['product_name'];
		$productPrice = $_POST['product_price'];
		
		$queryData = http_build_query(array(
			'fields' => array(
				"TITLE" => $title,
				"NAME" => $_POST['form_text_1'],
				"LAST_NAME" => '',
				"STATUS_ID" => "NEW",
				"OPENED" => "Y",
				"UTM_SOURCE" => 'form-arendapodemnikov',
				"ASSIGNED_BY_ID" => 75,
				"PHONE" => array(
					array(
						"VALUE" => $_POST['form_text_2'],
						"VALUE_TYPE" => "WORK",
					),
				),
				"EMAIL" => array(
					array(
						"VALUE" => $_REQUEST['email'],
						"VALUE_TYPE" => "WORK",
					),
				),
				"COMMENTS" => 'Даты аренды ' . $_POST['form_text_3'] . '<br>' . $_POST['form_text_4'],
				"UF_CRM_1519071700" => 'аренда-подъемников-спб.рф',
			),
			'params' => array("REGISTER_SONET_EVENT" => "Y")
		));
		
		// Создаем сделку
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $queryUrl,
			CURLOPT_POSTFIELDS => $queryData,
		));
		
		$result = curl_exec($curl);
		curl_close($curl);
		
		$result = json_decode($result, true);
		writeToLog($result, 'Bitrix24 CRM Deal Result');
		
		if (isset($result['error'])) {
			echo json_encode(['success' => false, 'errors' => ['bitrix24' => 'Ошибка при создании сделки: ' . $result['error_description']]]);
		} else {
			// Получаем ID созданной сделки
			$dealId = $result['result'];
			
			// Добавляем товары в сделку
			$queryUrl = 'https://armadastroy.bitrix24.ru/rest/43/utnw8v3hcnz4ls31/crm.deal.productrows.set.json';
			
			$productData = http_build_query(array(
				'id' => $dealId, // ID сделки
				'rows' => array(
					array(
						"PRODUCT_NAME" => $productName,
						"PRICE" => $productPrice,
						"QUANTITY" => 1, // Количество товара
					),
				),
			));
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_POST => 1,
				CURLOPT_HEADER => 0,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $queryUrl,
				CURLOPT_POSTFIELDS => $productData,
			));
			
			$result = curl_exec($curl);
			curl_close($curl);
			
			$result = json_decode($result, true);
			writeToLog($result, 'Bitrix24 CRM Product Rows Result');
			
			if (isset($result['error'])) {
				echo json_encode(['success' => false, 'errors' => ['bitrix24' => 'Ошибка при добавлении товаров: ' . $result['error_description']]]);
			} else {
				echo json_encode(['success' => true, 'errors' => []]);
			}
		}
	} else {
		// Ошибки при добавлении заявки в Битрикс
		echo json_encode(['success' => false, 'errors' => $GLOBALS["strError"]]);
	}
} else {
	// Предотвратили CSRF атаку
	echo json_encode(['success' => false, 'errors' => ['sessid' => 'Неверная сессия. Попробуйте обновить страницу']]);
}

// Файл ниже подключать обязательно, там закрытие соединения с базой данных
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';