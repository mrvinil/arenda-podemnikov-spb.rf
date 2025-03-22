<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Аренда подъемников с доставкой по СПб и Л.О.");
?>
	
	<div class="banner">
		<div class="banner--wrapper">
			<div class="banner--slider">
				<div class="banner--slide" style="background-image: url(/images/banner__main2.jpg);"></div>
				<div class="banner--slide" style="background-image: url(/images/banner__main2.jpg);"></div>
				<div class="banner--slide" style="background-image: url(/images/banner__main2.jpg);"></div>
				<div class="banner--slide" style="background-image: url(/images/banner__main2.jpg);"></div>
			</div>
		</div>
		<h2 class="section banner__title banner__title_type_center">Аренда подъемников</h2>
		<div class="section banner__desc">
			<div class="banner__advantage">
				<div class="banner__advantage-item">
					<img src="/images/icons/icon__clock.svg" class="banner__advantage-icon">
					<p class="banner__advantage-name">Будем у вас уже&nbsp;через&nbsp;3&nbsp;часа</p>
				</div>
				<div class="banner__advantage-item">
					<img src="/images/icons/icon__wallet.svg" class="banner__advantage-icon">
					<p class="banner__advantage-name">Стоимость от&nbsp;1&nbsp;850&nbsp;р/сут</p>
				</div>
			</div>
			<!--<a href="#" class="btn btn--yellow banner__button" data-target="callback">Взять в аренду</a>-->
		</div>
	</div>
	
	<div class="section gap" id="models">
		<h2 class="section-title">Типы подъемников</h2>
		
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"catalog",
				array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "N",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "/catalog/detail.php?ELEMENT_ID=#ELEMENT_ID#",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "N",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "100",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
						0 => "ATT_TYPE",
						1 => "ATT_VISOTA",
						2 => "ATT_GRUZ",
						3 => "ATT_TOPLIVO",
						4 => "ATT_VES",
						5 => "ATT_PRICE",
						6 => "MORE_PHOTO",
						7 => "",
						8 => "",
						9 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N",
					"COMPONENT_TEMPLATE" => "catalog"
				),
				false
			);?>
		
	</div>

	<div class="section--banner-s1x">
		<div class="section gap" id="banner-s1x">
			<p class="banner-s1x--title">Подскажем с выбором и поможем с доставкой</p>
		</div>
	</div>
	
	<div class="section gap" id="aboutbit">
        <!-- Как выглядят подъемники<br> сдаваемые в аренду -->
		<h2 class="section-title section-title_type_big">Подъемники в действии</h2>
		<div class="slider" id="slider__about-bit">
			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "slider"
	),
	false
);?>
			<div class="slider__dots" id="slider-dots__about-bit"></div>
		</div>
	</div>
	
	<div class="banner banner_type_small gap"
	     style="background-image: url(/images/banner__srok2.png);" id="delivery">
		<h2 class="section banner__title banner__title_type_small"></h2>
		<div class="section banner__desc">
			<a href="#" class="btn btn--yellow banner__button banner__button_type_small" data-target="callback">Заказать
				доставку</a>
		</div>
	</div>
	
	<div class="section gap" id="aboutass">
		<h2 class="section-title section-title_type_big">Компания БАЛТ-СТРОЙ</h2>
		<span class="section-sub-title">Занимается арендой подъемников, доставкой и обслуживанием</span>
<!--		<div class="slider" id="slider__about-as">-->
<!--			--><?//$APPLICATION->IncludeComponent("bitrix:news.list", "slider", Array(
//				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
//				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
//				"AJAX_MODE" => "N",	// Включить режим AJAX
//				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
//				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
//				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
//				"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
//				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
//				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
//				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
//				"CACHE_TYPE" => "A",	// Тип кеширования
//				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
//				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
//				"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
//				"DISPLAY_DATE" => "N",	// Выводить дату элемента
//				"DISPLAY_NAME" => "Y",	// Выводить название элемента
//				"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
//				"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
//				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
//				"FIELD_CODE" => array(	// Поля
//					0 => "",
//					1 => "",
//				),
//				"FILTER_NAME" => "",	// Фильтр
//				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
//				"IBLOCK_ID" => "1",	// Код информационного блока
//				"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
//				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
//				"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
//				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
//				"NEWS_COUNT" => "20",	// Количество новостей на странице
//				"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
//				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
//				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
//				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
//				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
//				"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
//				"PAGER_TITLE" => "Новости",	// Название категорий
//				"PARENT_SECTION" => "2",	// ID раздела
//				"PARENT_SECTION_CODE" => "",	// Код раздела
//				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
//				"PROPERTY_CODE" => array(	// Свойства
//					0 => "",
//					1 => "ICON",
//					2 => "",
//				),
//				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
//				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
//				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
//				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
//				"SET_STATUS_404" => "N",	// Устанавливать статус 404
//				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
//				"SHOW_404" => "N",	// Показ специальной страницы
//				"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
//				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
//				"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
//				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
//				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
//			),
//				false
//			);?>
<!--			<div class="slider__dots" id="slider-dots__about-as"></div>-->
<!--		</div>-->
	</div>
	
	
	
	<!--<div class="section gap" id="map">
		<h2 class="section-title"></h2>
		<img src="/images/map.png" class="map img-responsive">
	</div>-->

	<div class="section--banner-s2x">
		<div class="section gap" id="banner-s2x">
			<p class="banner-s2x--title">Преимущества услуг аренды подъемной техники</p>
			<div class="banner-s2x--container">
				<div class="banner-s2x--item">
					<p class="banner-s2x--text">Большой ассортимент техники в наличии</p>
				</div>
				<div class="banner-s2x--item">
					<p class="banner-s2x--text">Выгодные цены, скидки постоянным клиентам</p>
				</div>
				<div class="banner-s2x--item">
					<p class="banner-s2x--text">Сервис 24/7 на весь срок аренды</p>
				</div>
				<div class="banner-s2x--item">
					<p class="banner-s2x--text">Склад запасных частей в наличии</p>
				</div>
			</div>
			
		</div>
	</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>