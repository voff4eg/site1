<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?require $_SERVER["DOCUMENT_ROOT"]."/classes/factory.class.php";?>
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
<?$APPLICATION->SetPageProperty("description", $arResult["PREVIEW_TEXT"]);?>
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
				<?if ($arResult["IBLOCK_CODE"] == "news") {?>					
					<div class="b-date"><?=CFactory::human_ACTIVE_FROM($arResult["ACTIVE_FROM"])?></div>
				<? } ?>
			</div>
			
		</div>