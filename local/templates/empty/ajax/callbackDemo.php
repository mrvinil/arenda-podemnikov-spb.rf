<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

use Bitrix\Main\Application,
	Bitrix\Main\Context,
	Bitrix\Main\Request;

global $APPLICATION;
define('BIDS_IBLOCK_ID', 21);
$APPLICATION->RestartBuffer();

$context = Application::getInstance()->getContext();
$request = $context->getRequest();

if ($request['fio'] || $request['email']) {
	CModule::includeModule('iblock');
	$el = new CIBlockElement;
	
	$PROP = [
		'ATT_FORM_NAME' => $request['fio'],
		'ATT_FORM_PHONE' => $request['phone'],
		'ATT_FORM_EMAIL' => $request['email'],
		'ATT_FORM_ORGANIZATION' => $request['company'],
		'ATT_FORM_COMMENT' => $request['comment'],
		'ATT_FORM_CHECKBOX' => $request['check']
	];
	
	$arLoadProductArray = Array(
		"IBLOCK_ID"      => BIDS_IBLOCK_ID,
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => 'Запрос демо-доступа: ' . $request['fio'] . ' - ' . date('d.m.Y'),
		"ACTIVE"         => "Y",
	);
	
	if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
		$arEventFields = array(
			"ATT_FORM_NAME"          => $request['fio'],
			"ATT_FORM_PHONE"         => $request['phone'],
			"ATT_FORM_EMAIL"         => $request['email'],
			"ATT_FORM_ORGANIZATION"  => $request['company'],
			"ATT_FORM_COMMENT"       => $request['comment'],
			"ATT_FORM_CHECKBOX"       => $request['check'],
			"DATE"                   => date("Y-m-d H:i:s"),
		);
		if (CEvent::Send("CALLBACK_FORM", 's1', $arEventFields)) {
			echo json_encode(['status' => 'success']);
		}
	}
}