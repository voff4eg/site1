<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
<?
$getPic = CFile::GetByID($arResult["PICTURE"]);
$arPic = $getPic->Fetch();
$arPic["SRC"] = "/upload/".$arPic["SUBDIR"]."/".$arPic["FILE_NAME"];
?>

<div class="b-illustration b-illustration__size-1">
				<img src="<?=$arPic["SRC"]?>" width="<?=$arPic["WIDTH"]?>" height="<?=$arPic["HEIGHT"]?>" alt="">
			</div>
			
			<div class="b-inner-content">
				<div class="b-files-list">
				
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?//=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?if (empty($arResult["ITEMS"])) {?>
	<h1>Материалы раздела будут доступны в ближайшее время. Следите за обновлениями.</h1>
<? } ?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?//echo "<pre>";print_r($arItem);echo "</pre>";?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<div class="b-files-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<table class="b-files-list__item__data">
			<tr>
				<td class="b-files-list__item__content">
					<h2 class="b-files-list__item__header"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["file"]["FILE_VALUE"]["SRC"]?>" target="_blank"><?=$arItem["NAME"]?></a></h2>
					<div class="b-files-list__item__text">
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<?echo $arItem["PREVIEW_TEXT"];?>
					<?endif;?>
					</div>
				</td>
				<td class="b-files-list__item__download">
					<a href="<?=$arItem["DISPLAY_PROPERTIES"]["file"]["FILE_VALUE"]["SRC"]?>" target="_blank" class="b-button b-button_theme-2-L-download b-button_type-link"></a>
				</td>
			</tr>
		</table>
	</div>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?//=$arResult["NAV_STRING"]?>
<?endif;?>
	</div>
</div>
			
