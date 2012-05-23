<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult["FORM_TYPE"] == "login"):?>
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>

<div id="login-popup" class="b-popup-window">
	<a href="" class="b-popup-window__close" title="Закрыть окно"></a>
	
	<div class="b-popup-window_theme-1 b-popup-window_type-login">
		<h2 class="b-popup-window__heading">Вход для врачей</h2>
		
		<div class="b-login__form">
			<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
			
			<?if($arResult["BACKURL"] <> ''):?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?endif?>
			<?foreach ($arResult["POST"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
				<input type="hidden" name="AUTH_FORM" value="Y" />
				<input type="hidden" name="TYPE" value="AUTH" />
				
				<div class="b-form-field">
					<input type="text" name="USER_LOGIN" value="" data-placeholder="Логин" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-field">
					<input type="password" name="USER_PASSWORD" value="" data-placeholder="Пароль" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-link b-form-forgotten">
					<a href="#">Забыли пароль?</a>
				</div>
				
				<div class="b-popup-window__login__note">
					Вся  информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов в области обращения лекарственных средств.  Если Вы не являетесь специалистом в области обращения лекарственных средств, в соответствии с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим вас незамедлительно покинуть данный раздел веб-сайта.
Если Вы являетесь специалистом в области обращения лекарственных средств, в качестве подтверждения нажмите “ВОЙТИ”, чтобы продолжить работу. 
				</div>
				
				<div class="b-form-submit">
					<button class="b-button b-button_type-submit b-button_theme-1-M-enter" type="submit" name="Login"></button>
				</div>
				
				<div class="b-popup-window__sign-in-text">Хотите стать участником проекта?</div>
				<a href="/registration/" class="b-button b-button_type-link b-button_theme-1-S-reg" id="login-popup-registration-link"></a>
			</form>
		</div>
		
	</div>
	
</div>
<?endif?>