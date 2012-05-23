<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?require $_SERVER["DOCUMENT_ROOT"]."/classes/factory.class.php";?>
<div class="b-page-content">
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?$main_news_exist = FALSE;?>
<?foreach($arResult["ITEMS"] as $arItem):?>

<?if (($arItem["PROPERTY_HOWSTART_ON_MAINPAGE_VALUE"] == "Y" ||
       $arItem["PROPERTY_NOVOSTI_ON_MAINPAGE_VALUE"]  == "Y" ||
	   $arItem["PROPERTY_VMIRE_ON_MAINPAGE_VALUE"]    == "Y" ) && $main_news_exist == FALSE) { ?>	
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<div class="b-illustration b-illustration__size-2 b-illustration__theme-1">
				<div class="b-illustration__text__bg"></div>
				<div class="b-illustration__text">
					<h1><?=$arItem["NAME"]?></h1>
					<?=$arItem["PREVIEW_TEXT"]?>
					
					<div class="b-get-more">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="b-button b-button_type-link b-button_theme-3-M-more"></a>
					</div>
				</div>
				<img src="<?=$arItem["TISER"]["SRC"]?>" width="<?=$arItem["TISER"]["WIDTH"]?>" height="<?=$arItem["TISER"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" />
</div>
<? 
	$main_news_exist = TRUE; 
	$main_news_id = $arItem['ID'];
} 
?>
<?endforeach;?>


<?foreach($arResult["ITEMS"] as $arItem):?>
<?if (($arItem["PROPERTY_HOWSTART_ON_MAINPAGE_VALUE"]  != "Y" ||
       $arItem["PROPERTY_NOVOSTI_ON_MAINPAGE_VALUE"]   != "Y" ||
	   $arItem["PROPERTY_VMIRE_ON_MAINPAGE_VALUE"]     != "Y"  ) && $main_news_id != $arItem['ID']) { ?>	
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>


			<div class="b-rubric-list" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?if (!empty($arItem["PREVIEW_PICTURE"])) {?>
				<div class="b-rubric-list__item">
					<div class="b-rubric-list__item__ill">
						
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>"></a>
					</div>
				<?} else {?>
					<div class="b-rubric-list__item i-no-ill">
				<?}?>
					<div class="b-rubric-list__item__content">
					
					<?if ($arItem["IBLOCK_TYPE_ID"] == "for_doctors" && $arItem["IBLOCK_CODE"] == "news") {?>
						<div class="b-rubric-list__item__date"><?=CFactory::human_ACTIVE_FROM($arItem["ACTIVE_FROM"])?></div>
					<? } ?>
					
						<div class="b-rubric-list__item__rubric"><!--<a href="<?=$arItem["SECTION_PAGE_URL"]?>"><?=$arItem["IBLOCK_SECTION_NAME"]?></a>--></div>
						<h2 class="b-rubric-list__item__header"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>
						<div class="b-rubric-list__item__text">
							<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
						</div>
						<div class="b-get-more"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a></div>
					</div>
					<div class="i-clearfix"></div>
				</div>
			</div>
		<? } ?>
	<?endforeach;?>
</div>	