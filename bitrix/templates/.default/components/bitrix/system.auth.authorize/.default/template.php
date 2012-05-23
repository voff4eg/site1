<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="b-page-space">
	<div class="b-inner-content">
		<div id="change-password" class="b-form">
<?
ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>
	<h1><?=GetMessage("AUTH_PLEASE_AUTH")?></h1>
	<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<input type="hidden" name="Login" value="Y" />
		<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>
		<div class="b-form-field">
			<input type="text" name="USER_LOGIN" value="" data-placeholder="<?=GetMessage("AUTH_LOGIN")?>" class="b-input-text" autocomplete="off" required value="<?=$arResult["LAST_LOGIN"]?>">
		</div>
		<div class="b-form-field">
			<input type="password" name="USER_PASSWORD" value="" data-placeholder="<?=GetMessage("AUTH_PASSWORD")?>" class="b-input-text" autocomplete="off" required>
		</div>
		<?if($arResult["CAPTCHA_CODE"]):?>
			<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>
			<input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
		<?endif;?>
		<div class="links">
			<?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
					<a href="/auth/?forgot_password=yes<?//=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
			<?endif?>

			<?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
					<a href="/registration/<?//=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a>
			<?endif?>
		</div>
<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
	<label class="checkbox">
		<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" />
		<span><?=GetMessage("AUTH_REMEMBER_ME")?></span>
	</label>
<?endif?>
	<div class="b-form-submit">
		<button type="submit" class="b-button b-button_theme-1-L-send b-button_type-submit"></button>
	</div>
	</form>
</div>		
	</div>
</div>

<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>
