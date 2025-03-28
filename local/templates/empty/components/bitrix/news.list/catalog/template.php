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

<div class="filter">
	<div class="filter-type">
		<div class="filter-type__item" data-target="nojnici">
			<div class="type-product--image">
				<img src="/images/types_1-2nw.png">
			</div>
			<p>Ножничные</p>
		</div>
		<div class="filter-type__item" data-target="koleno">
			<div class="type-product--image">
				<img src="/images/types_2-1nw.png">
			</div>
			<p>Коленчатые</p>
		</div>
		<div class="filter-type__item" data-target="teleskop">
			<div class="type-product--image">
				<img src="/images/types_3-1nw.png">
			</div>
			<p>Телескопические</p>
		</div>
	</div>
	<div class="filter-fuel">
		<div class="filter-fuel__item" data-target="elektro">
			<img src="/images/icons/icon__filter-elektro.svg">
			<p>Электрический</p>
		</div>
		<div class="filter-fuel__item" data-target="disel">
			<img src="/images/icons/icon__filter-disel.svg">
			<p>Дизельный</p>
		</div>
	</div>
	<div class="filter-cancel" data-target="all">Показать все</div>
</div>

<div class="card-no-results" style="display: none;">По выбранным параметрам подъемников нет</div>

<div class="card card_theme_white">
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
	<div class="card__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-type="<?=$arItem["PROPERTIES"]["ATT_TYPE"]["VALUE_XML_ID"];?>" data-fuel="<?=$arItem["PROPERTIES"]["ATT_TOPLIVO"]["VALUE_XML_ID"];?>">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="card-item--url"></a>
        <div class="card__img-list">
			<div class="card__tech_icons">
                <div class="icon height">
					<? if($arItem["PROPERTIES"]["ATT_VISOTA"]): ?>
						<?
							$heightPodjemnik = (int) $arItem["PROPERTIES"]["ATT_VISOTA"]["VALUE"];
							$heightPodjemnik = round($heightPodjemnik);
						?>
						<span><?=$heightPodjemnik;?></span>
					<? endif; ?>
				</div>
                <div class="icon weight">
					<? if($arItem["PROPERTIES"]["ATT_GRUZ"]): ?>
						<span><?=$arItem["PROPERTIES"]["ATT_GRUZ"]["VALUE"];?></span>
					<? endif; ?>
				</div>
				<? if($arItem["PROPERTIES"]["ATT_TOPLIVO"]): ?>
					<? if($arItem["PROPERTIES"]["ATT_TOPLIVO"]["VALUE"] == "Электрический"): ?>
						<div class="icon akb"></div>
					<? elseif($arItem["PROPERTIES"]["ATT_TOPLIVO"]["VALUE"] == "Дизельный"): ?>
						<div class="icon disel"></div>
					<? endif; ?>
				<? endif; ?>
            </div>
			<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?=$arItem["NAME"];?>" class="card__img img-responsive">
		</div>
		<div class="card__desc">
			<h3 class="card__name"><?=htmlspecialcharsback($arItem["NAME"]); ?></h3>
			<div class="card-property__list">
				<div class="card-property">
					<div class="card-property__name"><?=$arItem["PROPERTIES"]["ATT_TYPE"]["NAME"];?></div>
					<div class="card-property__value"><?=$arItem["PROPERTIES"]["ATT_TYPE"]["VALUE"];?></div>
				</div>
				<div class="card-property">
					<div class="card-property__name"><?=$arItem["PROPERTIES"]["ATT_VISOTA"]["NAME"];?></div>
					<div class="card-property__value"><?=$arItem["PROPERTIES"]["ATT_VISOTA"]["VALUE"];?></div>
				</div>
				<div class="card-property">
					<div class="card-property__name"><?=$arItem["PROPERTIES"]["ATT_GRUZ"]["NAME"];?></div>
					<div class="card-property__value"><?=$arItem["PROPERTIES"]["ATT_GRUZ"]["VALUE"];?></div>
				</div>
				<div class="card-property">
					<div class="card-property__name"><?=$arItem["PROPERTIES"]["ATT_TOPLIVO"]["NAME"];?></div>
					<div class="card-property__value"><?=$arItem["PROPERTIES"]["ATT_TOPLIVO"]["VALUE"];?></div>
				</div>
				<div class="card-property">
					<div class="card-property__name"><?=$arItem["PROPERTIES"]["ATT_VES"]["NAME"];?></div>
					<div class="card-property__value"><?=$arItem["PROPERTIES"]["ATT_VES"]["VALUE"];?></div>
				</div>
			</div>
			<p class="card__price"><?=$arItem["PROPERTIES"]["ATT_PRICE"]["VALUE"];?></p>
		</div>
		<a href="#" class="card__button" data-target="callback">Арендовать</a><!--btn btn--cta-->
	</div>
<?endforeach;?>
</div>

