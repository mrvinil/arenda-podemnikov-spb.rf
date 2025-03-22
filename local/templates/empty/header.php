<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$utmMark = 'form-arendapodemnikov';
$phonePath = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "include/phonePath.php";
$_monthsList = array(
	"1"=>"Январь","2"=>"Февраль","3"=>"Март",
	"4"=>"Апрель","5"=>"Май", "6"=>"Июнь",
	"7"=>"Июль","8"=>"Август","9"=>"Сентябрь",
	"10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");

$month = $_monthsList[date("n")];
?>
<?IncludeTemplateLangFile(__FILE__);?>
<!doctype html>
<html>
<head>
	<? $APPLICATION->ShowHead() ?>
	<?
	
	use Bitrix\Main\Loader;
	use Bitrix\Main\Page\Asset;
	
	//CSS
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/normalize.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/keyframes.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/FontAwesomePro571.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/slick.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/slick-theme.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/popup.css");
	
	//JS
	CJSCore::Init(array("jquery3", 'fx'));
	CUtil::InitJSCore( array('ajax' , 'popup' ));
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/slick.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/phoneinput.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/popup_callback.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/popup_validate.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/myscript.js");
	
	//OUTSIDE
	Asset::getInstance()->addString("<link rel='icon' href='/favicon.ico' type='image/x-icon'>");
	Asset::getInstance()->addString("<meta name='viewport' content='width=device-width, initial-scale=1.0'>");
	Asset::getInstance()->addString("<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>");
	Asset::getInstance()->addString("<meta name='msvalidate.01' content='EC8F5C6C367270EECEA424441A3E0815'>");
	?>
	<title>Аренда подъемников с доставкой по СПб и Л.О.</title>
</head>
<body>

<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

<header class="header" id="stick">
	<div class="header__top">
		<nav class="section header__nav">
			<ul class="header__menu">
				<li><a href="#models" class="header__menu-link">Модели</a></li>
				<li><a href="#aboutbit" class="header__menu-link">О подъемниках</a></li>
				<li><a href="#delivery" class="header__menu-link">Доставка</a></li>
				<li><a href="#aboutass" class="header__menu-link">О нас</a></li>
				<li><a href="#contacts" class="header__menu-link">Контакты</a></li>
			</ul>
			<div class="header__location header__location_type_desktop">
				<img src="/images/icons/icon__address.png" class="header__location-icon">
				<p class="header__location-value">Санкт-Петербург и область</p>
			</div>
		</nav>
	</div>
	<div class="section header__info">
		<a href="/" class="header__logo link"></a>
		<div class="header__discount"><?//=$month?> <!-- - скидка 10% --></div>
		<div class="header__contacts">
			<a href="tel:<? if(file_exists($phonePath)) require $phonePath; ?>" class="phone-link link">
				<?$APPLICATION->IncludeFile(
						SITE_DIR."/include/phone.php",
						Array(),
						Array("MODE"=>"php")
				);?>
			</a>
			<?$APPLICATION->IncludeFile(
					SITE_DIR."/include/bitrix24Callback.php",
					Array(),
					Array("MODE"=>"php")
			);?>
			<span class="callback-link link" data-target="callback">заказать звонок</span>
<!--			<div class="header__location header__location_type_mobile">-->
<!--				<img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/icons/icon__address.png" class="header__location-icon">-->
<!--				<p class="header__location-value">Санкт-Петербург и область</p>-->
<!--			</div>-->
		</div>
	</div>
</header>

<main class="wrapper">
