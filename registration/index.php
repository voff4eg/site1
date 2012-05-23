<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Lilly Answers That Matter");
?>
<div class="b-form b-registration">
	<h1>Регистрация</h1>
	<?$APPLICATION->IncludeComponent(
		"locator:main.register",
		"registration",
		Array(
			"USER_PROPERTY_NAME" => "",
			"SHOW_FIELDS" => array("NAME", "LAST_NAME", "SECOND_NAME", "WORK_POSITION", "PERSONAL_MOBILE", "PERSONAL_BIRTHDATE", "PERSONAL_GENDER", "WORK_ZIP", "WORK_CITY", "WORK_STREET", "WORK_COMPANY", "WORK_PHONE"),
			"REQUIRED_FIELDS" => array("NAME", "LAST_NAME", "SECOND_NAME", "WORK_POSITION", "PERSONAL_MOBILE", "PERSONAL_BIRTHDATE", "PERSONAL_GENDER", "WORK_ZIP", "WORK_CITY", "WORK_STREET", "WORK_COMPANY", "WORK_PHONE"),
			"AUTH" => "N",
			"USE_BACKURL" => "N",
			"SUCCESS_PAGE" => "",
			"SET_TITLE" => "Y",
			"USER_PROPERTY" => array()
		),
	false
	);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
