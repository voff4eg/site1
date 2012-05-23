<div class="b-page-content">

	<div class="b-illustration b-illustration__size-1">
		<img src="/images/illustrations/article.jpg" width="706" height="230" alt="Лечение веногенной эректильной дисфункции">
	</div>
			
	<div class="b-inner-content">
		<h1>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<?=$arResult["NAME"]?>
			<?endif;?>
		</h1>
	
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
			<?endif;?>
		<?echo $arResult["DETAIL_TEXT"];?>

	</div>
</div>