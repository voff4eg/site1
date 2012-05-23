<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-page-space">
	<div class="b-inner-content">
		<div id="change-password" class="b-form">
<h1>Восстановление пароля</h1>
<?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
<input type="hidden" name="AUTH_FORM" value="Y" />
<input type="hidden" name="TYPE" value="SEND_PWD" />
<input type="hidden" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
<div class="b-form-field">
	<input type="text" name="USER_LOGIN" value="" data-placeholder="Логин" class="b-input-text" autocomplete="off" required value="<?=$arResult["LAST_LOGIN"]?>">
</div>
<div class="b-form-field">
	<input type="email" name="USER_EMAIL" value="" data-placeholder="E-mail" class="b-input-text" autocomplete="off" required>
</div>
<div class="b-form-submit">
	<button type="submit" class="b-button b-button_theme-1-L-send b-button_type-submit"></button>
</div>
</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
	</div>		
	</div>
</div>
