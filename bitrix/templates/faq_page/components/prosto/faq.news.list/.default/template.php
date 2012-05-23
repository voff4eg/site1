<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
$(document).ready(function() {
	if (window.location.hash != '') {
		var str = location.toString();
		if (str.indexOf('#faq') != -1) {
			var hash_start = str.indexOf('#faq');
			var hash_len = location.hash.length;
			var faq_id = str.substr(hash_start, hash_len);
			if ($(faq_id).length > 0) {
				$(faq_id).parent().parent().addClass("b-faq-list__item_type-open");
			}
		}
	}
});
</script>
			<h1>FAQ</h1>
			
			<div class="b-faq-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
				<div class="b-faq-list__item">
					<h2 class="b-faq-list__item__heading"><a href="#" id="faq<?=$arItem['ID']?>" class="b-faq-list__item__heading__link"><?=$arItem["NAME"]?></a></h2>
					<div class="b-faq-list__item__text">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>
				</div>
<?endforeach;?>		

	</div>

