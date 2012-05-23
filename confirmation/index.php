<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?$APPLICATION->IncludeComponent("locator:system.auth.confirmation",".default",Array(
		"USER_ID" => "confirm_user_id", 
		"CONFIRM_CODE" => "confirm_code", 
		"LOGIN" => "login" 
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>