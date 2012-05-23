<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-page-content">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<div class="b-illustration b-illustration__size-2 b-illustration__theme-1">
				<div class="b-illustration__text__bg"></div>
				<div class="b-illustration__text">
					<h1>Проблемы с эрекцией</h1>
					<p>Вот что действительно заботит мужчин, и здесь действительно нужно лечение. Я часто думаю, что если бы у мужчин был выбор: иметь полный набор чувств, возбуждение и желание</p>					
					<p>Или иметь «железную» стабильную эрекцию в любое время, но безо всяких чувств.</p>
					
					<div class="b-get-more">
						<a href="/article/" class="b-button b-button_type-link b-button_theme-3-M-more"></a>
					</div>
				</div>
				<img src="<?=$arResult["SECTION"]["SECTION_PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["SECTION"]["SECTION_PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["SECTION"]["SECTION_PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" />
</div>

	<?foreach($arResult["ITEMS"] as $arItem):?>
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
						<div class="b-rubric-list__item__rubric"><a href="<?=$arItem["SECTION_PAGE_URL"]?>"><?=$arItem["IBLOCK_SECTION_NAME"]?></a></div>
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
	<?endforeach;?>
</div>	