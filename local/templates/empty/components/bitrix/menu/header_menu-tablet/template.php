<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<ul id="main-menu_tablet" class="sm header-menu-wrap header-menu-wrap_tablet">
	
	<?
	$previousLevel = 0;
foreach($arResult as $arItem):?>
	
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	
	<?if ($arItem["IS_PARENT"]):?>
	
		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="header-menu__item">
				<a href="<?=$arItem["LINK"]?>" class="header-menu__link header-menu__link_tablet <?if ($arItem["SELECTED"]):?>header-menu__link_active<?endif?>"><?=$arItem["TEXT"]?></a>
			<ul class="header-menu__sub-menu">
		<?else:?>
			<li class="header-menu__item header-menu__item_submenu">
				<a href="<?=$arItem["LINK"]?>" class="header-menu__link header-menu__link_submenu header-menu__link_submenu-tablet <?if ($arItem["SELECTED"]):?>header-menu__link_active<?endif?>"><?=$arItem["TEXT"]?></a>
			<ul class="header-menu__sub-menu">
		<?endif?>
	
	<?else:?>
		
		<?if ($arItem["PERMISSION"] > "D"):?>
			
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="header-menu__item">
					<a href="<?=$arItem["LINK"]?>" class="header-menu__link header-menu__link_tablet <?if ($arItem["SELECTED"]):?>header-menu__link_active<?endif?>"><?=$arItem["TEXT"]?></a>
				</li>
			<?else:?>
				<li class="header-menu__item header-menu__item_submenu">
					<a href="<?=$arItem["LINK"]?>" class="header-menu__link header-menu__link_submenu header-menu__link_submenu-tablet <?if ($arItem["SELECTED"]):?>header-menu__link_active<?endif?>"><?=$arItem["TEXT"]?></a>
				</li>
			<?endif?>
		
		<?else:?>
			
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="header-menu__item">
					<a href="" class="header-menu__link header-menu__link_tablet <?if ($arItem["SELECTED"]):?>header-menu__link_active<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a>
				</li>
			<?else:?>
				<li class="header-menu__item header-menu__item_submenu">
					<a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a>
				</li>
			<?endif?>
		
		<?endif?>
	
	<?endif?>
	
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>
	
	<?if ($previousLevel > 1)://close last item tags?>
		<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
	<?endif?>
	
	</ul>
<?endif?>