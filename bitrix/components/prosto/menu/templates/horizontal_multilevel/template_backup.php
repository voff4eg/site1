<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

//echo "<pre>";print_r($arResult);echo "</pre>";

?>
<?if (!empty($arResult)):?>

<menu class="b-top-menu">

<?
$previousLevel = 0;

foreach($arResult as $arItem):?>
<?
//echo "<pre>"; print_r($arItem); echo "</pre>";
?>
	<?if ($arItem["DEPTH_LEVEL"] == 1):?>

		<?if ($arItem["IS_PARENT"] == 1):?>
		
			<li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?>">
					<a href="<?=$arItem["LINK"]?>" class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
					<div class="b-top-menu__item_relative">
						<span class="b-top-menu__item__pointer"></span>
						<menu class="b-top-submenu">

			<!--<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>-->
		<?else:?>
			<li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?>">
					<a href="<?=$arItem["LINK"]?>" class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
					<div class="b-top-menu__item_relative">
						<span class="b-top-menu__item__pointer"></span>
						<menu class="b-top-submenu">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?>">
					<a href="<?=$arItem["LINK"]?>" class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
			
				<!--<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>-->
			<?else:?>
				<li class="b-top-submenu__item b-top-submenu__item__<?=$arItem["PARAMS"]["image"]?>">
                    <a href="<?=$arItem["LINK"]?>" class="b-menu-item b-top-submenu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
				</li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>
	
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</menu></div></li>", ($previousLevel-1) );?>
<?endif?>

</menu>
<?endif?>


