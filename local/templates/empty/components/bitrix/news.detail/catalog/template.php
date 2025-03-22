<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="section--catalog-item">
	<div class="container">
		<div class="d-block d-sm-none mb-3">
			<? if($arResult["NAME"]): ?>
				<div class="product--main-title">
					<h1><?= html_entity_decode($arResult["NAME"]); ?></h1>
				</div>
			<? endif; ?>
			<div class="d-flex align-items-center justify-content-between product--info">
				<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]): ?>
					<span><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]["VALUE"]; ?></span>
				<? endif; ?>
				<div class="product--info-available">в наличии</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<div class="product--gallery">
					<div class="product--gallery--images">
						<? if($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]): ?>
							<? foreach($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $imageID): ?>
								<? $image = CFile::ResizeImageGet(
									$imageID,
									["width"=> 451, "height"=> 382],
									BX_RESIZE_IMAGE_EXACT,
									false,
									false,
									false,
									false
								); ?>
								<? if($image): ?>
									<div>
										<a data-fancybox="gallery" href="<?=CFile::GetPath($imageID); ?>"><img src="<?=$image["src"];?>" class="img-fluid" alt=""></a>
									</div>
								<? endif; ?>
							<? endforeach; ?>
						<? endif; ?>
					</div>
					<div class="product--gallery--thumbs">
						<? if($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]): ?>
							<? foreach($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $thumbID): ?>
								<? $thumb = CFile::ResizeImageGet(
									$thumbID,
									["width"=> 80, "height"=> 80],
									BX_RESIZE_IMAGE_EXACT,
									false,
									false,
									false,
									false
								); ?>
								<? if($image): ?>
									<div>
										<img src="<?=$thumb["src"];?>" class="img-fluid" alt="">
									</div>
								<? endif; ?>
							<? endforeach; ?>
						<? endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="row">
					<div class="col-md-6">
						<div class="d-none d-sm-block">
							<? if($arResult["NAME"]): ?>
								<div class="product--main-title">
									<h1><?= html_entity_decode($arResult["NAME"]); ?></h1>
								</div>
							<? endif; ?>
							<div class="d-flex flex-row flex-lg-column flex-xl-row align-items-center justify-content-between product--info">
								<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]): ?>
									<span><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]["VALUE"]; ?> подъемник</span>
								<? endif; ?>
								<div class="product--info-available">в наличии</div>
							</div>
						</div>
						<div class="d-flex flex-row flex-lg-column flex-xl-row justify-content-between product--icon-tech-wrapper">
							<div class="d-flex align-items-center product--icon-tech number height">
								<? if($arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]): ?>
									<div>
										<span>Рабочая высота:</span>
										<span><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]["VALUE"]; ?> м.</span>
									</div>
								<? endif; ?>
							</div>
							<div class="d-flex align-items-center product--icon-tech number weight">
								<? if($arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]): ?>
									<div>
										<span>Грузоподъемность:</span>
										<span><?=$arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]["VALUE"]; ?> кг.</span>
									</div>
								<? endif; ?>
							</div>
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]): ?>
								<div class="icon-tech engine <?=$arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]["VALUE_XML_ID"]; ?>"></div>
							<? endif; ?>
						</div>
						<div class="product--tech">
							<p class="product--tech-title">Краткие характеристики:</p>
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]): ?>
								<div class="d-flex justify-content-between product--tech-item">
									<div class="product--tech-property"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]["NAME"]; ?></div>
									<div class="product--tech-value"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]["VALUE"]; ?></div>
								</div>
							<? endif; ?>
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]): ?>
								<div class="d-flex justify-content-between product--tech-item">
									<div class="product--tech-property"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]["NAME"]; ?></div>
									<div class="product--tech-value"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]["VALUE"]; ?></div>
								</div>
							<? endif; ?>
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]): ?>
								<div class="d-flex justify-content-between product--tech-item">
									<div class="product--tech-property"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]["NAME"]; ?></div>
									<div class="product--tech-value"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]["VALUE"]; ?></div>
								</div>
							<? endif; ?>
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]): ?>
								<div class="d-flex justify-content-between product--tech-item">
									<div class="product--tech-property"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]["NAME"]; ?></div>
									<div class="product--tech-value"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]["VALUE"]; ?></div>
								</div>
							<? endif; ?>
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_VES"]): ?>
								<div class="d-flex justify-content-between product--tech-item">
									<div class="product--tech-property"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VES"]["NAME"]; ?></div>
									<div class="product--tech-value"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VES"]["VALUE"]; ?></div>
								</div>
							<? endif; ?>
						</div>
						<div class="d-flex flex-row flex-lg-column flex-xl-row justify-content-between product--info-links">
							<a href="media/guide/T107027ru.pdf" class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-start product--info-link">
								<svg width="21" height="30" viewBox="0 0 21 30" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top:4px;">
									<path d="M17 23H19C19.5523 23 20 22.5523 20 22V2C20 1.44772 19.5523 1 19 1H6.86937C6.60072 1 6.34337 1.10809 6.1553 1.29993L1.28593 6.26669C1.10266 6.45363 1 6.70497 1 6.96676V22C1 22.5523 1.44772 23 2 23H7.5" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
									<path d="M1.49976 8H6.99976C7.55204 8 7.99976 7.55228 7.99976 7V1" stroke="#828282" stroke-width="2"></path>
									<path d="M6 12H15" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
									<path d="M6 16H15" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
									<path d="M12.1155 19.5278L12.1155 26.1978" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
									<path d="M9.89404 25.4567L12.1174 27.6801L14.3407 25.4567" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
								</svg>
								<span>Скачать<br>документацию</span>
							</a>
							<a href="catalog/rent/terms.html" class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-start product--info-link">
								<svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.86848 1H20V23H1L1 6.96765L6.86848 1Z" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
									<path d="M1.49976 8H6.99976C7.55204 8 7.99976 7.55228 7.99976 7V1" stroke="#828282" stroke-width="2"></path>
									<path d="M6 12H15" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
									<path d="M6 16H15" stroke="#828282" stroke-width="2" stroke-linecap="round"></path>
								</svg>
								<span>Условия аренды</span>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product--form-arenda">
							<? if($arResult["DISPLAY_PROPERTIES"]["ATT_PRICE"]): ?>
								<p class="product--form-arenda-price"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_PRICE"]["VALUE"]; ?></p>
							<?endif; ?>
							<div class="product--form-arenda--disclaimers">
								<div class="d-flex align-items-center product--form-arenda--disclaimer-item">
									<svg style="min-width:24px;" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="#0080C3"></path>
										<path d="M12 8V12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M12 16H12.01" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
									<div>Минимальный срок аренды от 5 дней</div>
								</div>
								<div class="d-flex align-items-center product--form-arenda--disclaimer-item">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="12" cy="12" r="10" fill="#0080C3"></circle>
										<path d="M10.6861 13.36V14.0114H13.2555V14.8114H10.6861V16H9.16788V14.8114H8V14.0114H9.16788V8H12.5314C13.6214 8 14.4701 8.22857 15.0774 8.68571C15.6925 9.14286 16 9.80952 16 10.6857C16 11.5543 15.6925 12.2171 15.0774 12.6743C14.4701 13.1314 13.6214 13.36 12.5314 13.36H10.6861ZM14.4701 10.6971C14.4701 10.2324 14.3027 9.8781 13.9679 9.63429C13.6331 9.38286 13.1504 9.25714 12.5197 9.25714H10.6861V12.16H12.5197C13.1426 12.16 13.6214 12.0343 13.9562 11.7829C14.2988 11.5238 14.4701 11.1619 14.4701 10.6971Z" fill="white"></path>
									</svg>
									<div>Цена указана с НДС</div>
								</div>
								<div class="d-flex align-items-center product--form-arenda--disclaimer-item">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" fill="#0080C3"></path>
										<path d="M12 8L13.3102 10.5261L16 11.0557L14.12 13.1465L14.4721 16L12 14.7661L9.52786 16L9.87999 13.1465L8 11.0557L10.6897 10.5261L12 8Z" fill="white"></path>
									</svg>
									<div>Гарантия производителя</div>
								</div>
							</div>
							<?$APPLICATION->IncludeComponent(
								"bitrix:form.result.new",
								"arenda",
								Array(
									"SEF_MODE" => "N",
									"WEB_FORM_ID" => 1,
									"LIST_URL" => "",
									"EDIT_URL" => "",
									"SUCCESS_URL" => "",
									"CHAIN_ITEM_TEXT" => "",
									"CHAIN_ITEM_LINK" => "",
									"IGNORE_CUSTOM_TEMPLATE" => "Y",
									"USE_EXTENDED_ERRORS" => "Y",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "3600",
									"SEF_FOLDER" => "/",
									"VARIABLE_ALIASES" => Array(
									)
								)
							);?>
							<script>
								// Передача данных из PHP в JavaScript
								const productName = "<?= $arResult['NAME']; ?>";
								const productPrice = "<?= $arResult['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE']; ?>";
								
								// Функция для декодирования HTML-сущностей
								function decodeHtmlEntities(str) {
									const textArea = document.createElement('textarea');
									textArea.innerHTML = str;
									return textArea.value;
								}
								
								// Очистка product_name: декодируем сущности и удаляем все HTML-теги
								const cleanProductName = decodeHtmlEntities(productName).replace(/<[^>]*>/g, '').trim();
								
								// Очистка product_price: оставляем только цифры
								const cleanProductPrice = productPrice.replace(/\D/g, '');
								
								// Заполнение скрытых полей
								document.addEventListener('DOMContentLoaded', function() {
									document.getElementById('product_name').value = cleanProductName;
									document.getElementById('product_price').value = cleanProductPrice;
								});
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="product--tabs">
					<ul class="nav product--tabs-nav" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Описание</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="characteristics-tab" data-bs-toggle="tab" data-bs-target="#characteristics-tab-pane" type="button" role="tab" aria-controls="characteristics-tab-pane" aria-selected="false">Характеристики</button>
						</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-xl-6 col-lg-5">
						<div class="tab-content product--tabs-content" id="myTabContent">
							<div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
								<p>Cumque ipsam, tempore laudantium eveniet illo repellat incidunt fugit obcaecati sunt, fuga blanditiis accusamus quam autem dolore vero nesciunt modi, aspernatur impedit.</p>
							</div>
							<div class="tab-pane fade" id="characteristics-tab-pane" role="tabpanel" aria-labelledby="characteristics-tab" tabindex="0">
								<table class="table table-striped product-characteristics--table">
									<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]): ?>
										<tr>
											<td><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]["NAME"]; ?></td>
											<td class="text-end"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]["VALUE"]; ?></td>
										</tr>
									<? endif; ?>
									<? if($arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]): ?>
										<tr>
											<td><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]["NAME"]; ?></td>
											<td class="text-end"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VISOTA"]["VALUE"]; ?></td>
										</tr>
									<? endif; ?>
									<? if($arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]): ?>
										<tr>
											<td><?=$arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]["NAME"]; ?></td>
											<td class="text-end"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_GRUZ"]["VALUE"]; ?></td>
										</tr>
									<? endif; ?>
									<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]): ?>
										<tr>
											<td><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]["NAME"]; ?></td>
											<td class="text-end"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_TOPLIVO"]["VALUE"]; ?></td>
										</tr>
									<? endif; ?>
									<? if($arResult["DISPLAY_PROPERTIES"]["ATT_TYPE"]): ?>
										<tr>
											<td><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VES"]["NAME"]; ?></td>
											<td class="text-end"><?=$arResult["DISPLAY_PROPERTIES"]["ATT_VES"]["VALUE"]; ?></td>
										</tr>
									<? endif; ?>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7">
						<div class="product--info-add">
							<p class="product--info-add--title">Как мы работаем</p>
							<div class="row product--info-add--items">
								<div class="col-md-4 product--info-add--item">
									<div class="product--info-add--item-icon icon--1">
										<div class="how-work-num">
											<svg width="19" height="40" viewBox="0 0 19 40" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.2" d="M19 0V40H7.53049V8.74286H0V0H19Z" fill="#0080C3"></path>
											</svg>
										</div>
									</div>
									<div class="product--info-add--item-title">Заявка</div>
									<div class="product--info-add--item-description">
										<p>Подайте заявку любым удобным способом:</p>
										<ul>
											<li>По телефону:<br><strong>8 (812) 240-85-77</strong></li>
											<li>Заполните форму заказа на сайте</li>
											<li>Напишите на почту:<br><strong>---</strong></li>
										</ul>
									</div>
								</div>
								<div class="col-md-4 product--info-add--item">
									<div class="product--info-add--item-icon icon--2">
										<div class="how-work-num">
											<svg width="33" height="41" viewBox="0 0 33 41" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.2" d="M33 31.9846V41H2.04475V33.8796L16.926 19.8109C18.3649 18.4328 19.3305 17.2652 19.8227 16.3081C20.315 15.3128 20.5611 14.3175 20.5611 13.3221C20.5611 12.0205 20.1256 11.0061 19.2547 10.2787C18.3838 9.55136 17.1153 9.18768 15.4492 9.18768C13.9725 9.18768 12.6093 9.53221 11.3597 10.2213C10.148 10.8721 9.14458 11.8291 8.3494 13.0924L0 8.38375C1.5525 5.78058 3.72978 3.73249 6.53184 2.2395C9.33391 0.746499 12.6472 0 16.4716 0C19.5009 0 22.1704 0.497666 24.4802 1.493C26.8279 2.48833 28.6454 3.9239 29.9329 5.79972C31.2582 7.63726 31.9208 9.78105 31.9208 12.2311C31.9208 14.4132 31.4475 16.4804 30.5009 18.4328C29.5921 20.3469 27.8124 22.5289 25.1618 24.979L17.6644 31.9846H33Z" fill="#0080C3"></path>
											</svg>
										</div>
									</div>
									<div class="product--info-add--item-title">Подтверждение</div>
									<div class="product--info-add--item-description">
										<p>Наши менеджеры свяжутся с вами, чтобы обсудить и согласовать детали. Заключается договор.</p>
									</div>
								</div>
								<div class="col-md-4 product--info-add--item">
									<div class="product--info-add--item-icon icon--3">
										<div class="how-work-num">
											<svg width="33" height="41" viewBox="0 0 33 41" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.2" d="M22.7054 16.0784C26.0225 16.7675 28.5581 18.1457 30.312 20.2129C32.104 22.2418 33 24.711 33 27.6204C33 29.9939 32.3518 32.1951 31.0555 34.2241C29.7972 36.253 27.8527 37.8992 25.2218 39.1625C22.6291 40.3875 19.4073 41 15.5563 41C12.7348 41 9.93241 40.6555 7.14905 39.9664C4.40381 39.2773 2.0208 38.3011 0 37.0378L4.11785 28.4818C5.68111 29.5537 7.43501 30.3768 9.37955 30.951C11.3622 31.5252 13.3068 31.8123 15.2132 31.8123C17.1577 31.8123 18.7019 31.4486 19.8458 30.7213C20.9896 29.9939 21.5615 28.9603 21.5615 27.6204C21.5615 25.0173 19.5217 23.7157 15.4419 23.7157H10.695V16.5378L17.844 8.78571H2.05893V0H30.9983V7.12045L22.7054 16.0784Z" fill="#0080C3"></path>
											</svg>
										</div>
									</div>
									<div class="product--info-add--item-title">Получение</div>
									<div class="product--info-add--item-description">
										<p>Вы получаете приобретенное или арендованное оборудование. Доставка по Москве и по России.</p>
									</div>
								</div>
							</div>
							<div class="d-none d-sm-block product--info-add--questions">
								<p class="product--info-add--questions-title">Часто задаваемые вопросы</p>
								<div class="d-flex">
									<ul class="nav flex-column product--questuions-nav" id="myQuestionsTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="quest--1-tab" data-bs-toggle="tab" data-bs-target="#quest--1-tab-pane" type="button" role="tab" aria-controls="quest--1-tab-pane" aria-selected="true">Гарантии</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="quest--2-tab" data-bs-toggle="tab" data-bs-target="#quest--2-tab-pane" type="button" role="tab" aria-controls="quest--2-tab-pane" aria-selected="true">Варианты оплаты</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="quest--3-tab" data-bs-toggle="tab" data-bs-target="#quest--3-tab-pane" type="button" role="tab" aria-controls="quest--3-tab-pane" aria-selected="true">Когда я могу
												получить технику</button>
										</li>
									</ul>
									<div class="tab-content product--questions-tabs-content" id="myQuestionsTabContent">
										<div class="tab-pane fade show active" id="quest--1-tab-pane" role="tabpanel" aria-labelledby="quest--1-tab" tabindex="0">У нас работает целая команда опытных высококвалифицированных технических специалистов. Мы поставляем подъемное оборудование от мировых производителей. Вы получаете сервисное обслуживание и ремонт в период гарантии. Наличие сертификатов и лицензий говорит о надежности предприятия и продукции. Вся продукция поставляется с необходимой документацией и гарантией.</div>
										<div class="tab-pane fade" id="quest--2-tab-pane" role="tabpanel" aria-labelledby="quest--2-tab" tabindex="0">Оплату техники можете произвести по безналичному расчету или приобрести в лизинг. Оплата рассчитывается для каждого заказа индивидуально.</div>
										<div class="tab-pane fade" id="quest--3-tab-pane" role="tabpanel" aria-labelledby="quest--3-tab" tabindex="0">Время доставки товара будет зависеть от объема заказываемого оборудования, дальности объекта, срочности заказа. При отгрузке продукции в регионы сроки доставки включают время доставки товара на наш склад и время доставки до транспортной компании. Далее сроки доставки зависят от условий ТК.</div>
									</div>
								</div>
							</div>
							<div class="d-block d-sm-none accordion product--accordion-questuion" id="accordionQuestions">
								<p class="product--info-add--questions-title">Часто задаваемые вопросы</p>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Гарантии</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionQuestions">
										<div class="accordion-body">
											<p>У нас работает целая команда опытных высококвалифицированных технических специалистов. Мы поставляем подъемное оборудование от мировых производителей. Вы получаете сервисное обслуживание и ремонт в период гарантии. Наличие сертификатов и лицензий говорит о надежности предприятия и продукции. Вся продукция поставляется с необходимой документацией и гарантией.</p>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Варианты оплаты</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionQuestions">
										<div class="accordion-body">
											<p>Оплату техники можете произвести по безналичному расчету или приобрести в лизинг. Оплата рассчитывается для каждого заказа индивидуально.</p>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Когда я могу получить технику</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionQuestions">
										<div class="accordion-body">
											<p>Время доставки товара будет зависеть от объема заказываемого оборудования, дальности объекта, срочности заказа. При отгрузке продукции в регионы сроки доставки включают время доставки товара на наш склад и время доставки до транспортной компании. Далее сроки доставки зависят от условий ТК.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
