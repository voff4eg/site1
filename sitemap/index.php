<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Lilly Answers That Matter");
?>

<?$APPLICATION->IncludeComponent("bitrix:main.map","",Array(
		"LEVEL" => "3", 
		"COL_NUM" => "1", 
		"SHOW_DESCRIPTION" => "Y", 
		"SET_TITLE" => "Y", 
		"CACHE_TYPE" => "N", 
		"CACHE_TIME" => "3600" 
	),
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>