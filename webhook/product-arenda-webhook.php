<?php
/**
 * User: Mrvinil
 * Date: 22.04.2020
 * Time: 14:09
 */
function writeToLog($data, $title = '') {
	$log = "\n------------------------\n";
	$log .= date("Y.m.d G:i:s") . "\n";
	$log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
	$log .= print_r($data, 1);
	$log .= "\n------------------------\n";
	file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
	return true;
}

$queryUrl = 'https://armadastroy.bitrix24.ru/rest/43/utnw8v3hcnz4ls31/crm.lead.add.json';

$title = 'Заявка на аренду:';

if (!empty($_POST['productName']) && !empty($_POST['productPrice'])) {
	$title .= ' ' . $_POST['productName'] . ' -- ' . $_POST['productPrice'];
} else {
	$title = 'Заявка на обратный звонок';
}

$queryData = http_build_query(array(
	'fields' => array(
		"TITLE" => $title,
		"NAME" => '',
		"LAST_NAME" => '',
		"STATUS_ID" => "NEW",
		"OPENED" => "Y",
		"UTM_SOURCE" => $_POST['productUtm'],
		"ASSIGNED_BY_ID" => 75,
		"PHONE" => Array(
	        "n0" => Array(
	            "VALUE" => $_POST['phone'],
	            "VALUE_TYPE" => "WORK",
	        ),
	    ),
		"EMAIL" => Array(
	        "n0" => Array(
	            "VALUE" => $_REQUEST['email'],
	            "VALUE_TYPE" => "WORK",
	        ),
	    ),
		"UF_CRM_1519071700" => 'аренда-подъемников-спб.рф',
	),
	'params' => array("REGISTER_SONET_EVENT" => "Y")
));
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

$result = json_decode($result, 1);
writeToLog($result, 'webform result');

if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br/>";
?>