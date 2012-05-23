<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?require $_SERVER["DOCUMENT_ROOT"]."/classes/factory.class.php";?>

<div class="b-page-content">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

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

	<?endforeach;?>
</div>	