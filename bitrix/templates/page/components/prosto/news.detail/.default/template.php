<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->SetPageProperty("description", $arResult["PREVIEW_TEXT"]);?>
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>

<div class="b-page-content">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<div class="b-illustration b-illustration__size-1">
				<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>">
			</div>		
			<?endif?>	
			<div class="b-inner-content">
				<h1><?=$arResult["NAME"]?></h1>
				<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
		<?endif;?>
		
			</div>
			
		</div>