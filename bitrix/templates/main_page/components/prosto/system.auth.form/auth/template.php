<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?global $IS_DOCTOR;?>
<div class="bx-system-auth-form">
<?if($arResult["FORM_TYPE"] == "login"):?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<div id="login-popup" class="b-popup-window">
	<a href="" class="b-popup-window__close" title="Закрыть окно"></a>
	
	<div class="b-popup-window_theme-1 b-popup-window_type-login">
		<h2 class="b-popup-window__heading">Вход для врачей</h2>
		
		<div class="b-login__form">
			<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
			<?if($arResult["BACKURL"] <> ''):?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
				<div class="b-form-field">
					<input type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" data-placeholder="Логин" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-field">
					<input type="password" name="USER_PASSWORD" value="" data-placeholder="Пароль" class="b-input-text" autocomplete="off" required>
				</div>
				<div class="b-form-link b-form-forgotten">
					<a href="">Забыли пароль?</a>
				</div>
				
				<div class="b-popup-window__note">
					Вся  информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов в области обращения лекарственных средств.  Если Вы не являетесь специалистом в области обращения лекарственных средств, в соответствии с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим вас незамедлительно покинуть данный раздел веб-сайта.
Если Вы являетесь специалистом в области обращения лекарственных средств, в качестве подтверждения нажмите “ВОЙТИ”, чтобы продолжить работу. 
				</div>
				
				<div class="b-form-submit">
					<button class="b-button b-button_type-submit b-button_theme-1-L-enter" type="submit"></button>
				</div>
				
				<div class="b-popup-window__sign-in-text">Зарегистрируйтесь, чтобы стать участником проекта</div>
				<a href="#" class="b-button b-button_type-link b-button_theme-1-S-reg" id="login-popup-registration-link"></a>
			</form>
		</div>
		
	</div>
	
</div>



	<?if($arResult["AUTH_SERVICES"]):?>
		<?
		$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "", 
			array(
				"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
				"AUTH_URL"=>"/"/*$arResult["AUTH_URL"]*/,
				"POST"=>$arResult["POST"],
				"POPUP"=>"Y",
				"SUFFIX"=>"form",
			), 
			$component, 
			array("HIDE_ICONS"=>"Y")
		);
		?>
	<?endif?>
	
	<?//unset($_SESSION["DOCTOR_AUTH_SHOW"]);
//if($arResult["FORM_TYPE"] == "login")
elseif(!session_is_registered("DOCTOR_AUTH_SHOW") && $IS_DOCTOR):?>
	<div id="opaco" style="width: 100%; height: 1491px; "></div>
	<div id="login-popup" class="b-popup-window" style="display: block; margin-left: -220px; left: 50%; top: 50px;">
		<a href="/doctors/s_chego_nachat/" class="b-popup-window__close" title="Закрыть окно"></a>
		
		<div class="b-popup-window_theme-1 b-popup-window_type-login" id="b_popup_window_disclaimer">
			<h2 class="b-popup-window__heading">Для врачей</h2>
			<p id="disclaimer_for_doctors">Вся  информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов в области обращения лекарственных средств.  Если Вы не являетесь специалистом в области обращения лекарственных средств, в соответствии с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.
			Если Вы являетесь специалистом в области обращения лекарственных средств, в качестве подтверждения нажмите “ПРОДОЛЖИТЬ”, чтобы начать работу. </p>
			<a href="/doctors/s_chego_nachat/" id="continue_for_doctor"> </a>
		</div>
		
	</div>
	<?session_register("DOCTOR_AUTH_SHOW");?>
<?endif?>
</div>