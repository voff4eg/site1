<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-page-space">
	<div class="b-inner-content">
		<div id="change-password" class="b-form">
<h1>Смена пароля</h1>
<?
ShowMessage($arParams["~AUTH_RESULT"]);
?>
<form method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
	<?if (strlen($arResult["BACKURL"]) > 0): ?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<? endif ?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="CHANGE_PWD" />
	<input type="hidden" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" />
	<div class="b-form-field">
		<input type="text" name="USER_LOGIN" value="" data-placeholder="Логин" class="b-input-text" autocomplete="off" required value="<?=$arResult["LAST_LOGIN"]?>">
	</div>
	<div class="b-form-field">
		<input type="email" name="USER_CHECKWORD" value="" data-placeholder="<?=GetMessage("AUTH_CHECKWORD")?>" class="b-input-text" autocomplete="off" required value="<?=$arResult["USER_CHECKWORD"]?>">
	</div>
	<div class="b-form-field">
		<input type="password" name="USER_PASSWORD" value="" data-placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_REQ")?>" class="b-input-text" autocomplete="off" required value="<?=$arResult["USER_PASSWORD"]?>">
	</div>
	<div class="b-form-field">
		<input type="password" name="USER_CONFIRM_PASSWORD" value="" data-placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?>" class="b-input-text" autocomplete="off" required value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>">
	</div>
	<div class="b-form-submit">
		<button type="submit" class="b-button b-button_theme-1-L-send b-button_type-submit"></button>
	</div>
</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
</div>