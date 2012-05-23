<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?require $_SERVER["DOCUMENT_ROOT"]."/classes/factory.class.php"?>
<?global $show_register_text;?>
<?if($USER->IsAuthorized()):?>
<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>


<?endif?>

<? if ($show_register_text) { ?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<? } else { ?>
<p>Материалы раздела будут доступны в ближайшее время. Следите за обновлениями.</p>
<p>Уважаемый коллега,</p>
<p>Мы приветствуем Вас от имени Российского Научно-Медицинского Общества «Мужское Здоровье». Мы рады Вашему желанию стать членом нашего общества и принять участие в новом разделе нашего сайта http://www.rusmh.org . Этот раздел под названием «Доктор-Локатор» создан для того, чтобы пациенты, страдающие эректильной дисфункцией, могли найти контакты профильного специалиста в своем городе или регионе и получить необходимую помощь, придя к нему на прием. Таким образом, Вы сможете помочь большему количеству пациентов справиться с этим заболеванием.
<p>Для того, чтобы Вы стали членом ассоциации и приняли участие в проекте «Доктор-Локатор»,  просим заполнить приложенную анкету. Ваши рабочие контактные данные, указанные в анкете (ФИО, телефон, адрес места работы, адрес электронной почты) будут указаны на странице «Доктор-Локатора», чтобы пациент смог обратиться к Вам на прием. Вы сможете в любой момент изменить эти данные или отказаться от участия в проекте, связавшись с нами через сайт.
Часть данных в этой анкете носит характер «Персональные данные», в связи с этим просим заполнить приложенную «Форму запроса на электронную информационную рассылку» для того, чтобы мы могли использовать данные в этой анкете.</p>
<p>С уважением, Российское Научно-Медицинское Общество «Мужское Здоровье»</p>


<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
	<fieldset>
		<legend>Соглашение</legend>
		
		<div class="b-form-field b-checkbox">
			<input type="checkbox" name="" class="b-input-checkbox" required>
			<label class="b-checkbox-label">Я согласен быть членом Российского Научно-Медицинского Общества «Мужское Здоровье» и участником нового раздела сайта «Доктор-Локатор».</label>
		</div>		
	</fieldset>
	<fieldset>
		<legend>Персональные данные</legend>			
		<div class="b-form-colimn1">
			<div class="b-form-field">
				<label class="b-form-label">Логин</label>
				<input type="text" name="login" value="<?=$_REQUEST["LOGIN"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Фамилия</label>
				<input type="text" name="last_name" value="<?=$_REQUEST["LAST_NAME"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Имя</label>
				<input type="text" name="name" value="<?=$_REQUEST["NAME"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Отчество</label>
				<input type="text" name="second_name" value="<?=$_REQUEST["SECOND_NAME"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Должность/Специальность</label>
				<input type="text" name="work_position" value="<?=$_REQUEST["WORK_POSITION"]?>" class="b-input-text" required>
			</div>
			<!--<div class="b-form-field">
				<label class="b-form-label">Стаж</label>
				<input type="text" name="UF_EXPERIENCE" value="" class="b-input-text" required>
			</div>-->
		</div>			
		<div class="b-form-colimn2">
			<div class="b-form-field">
				<label class="b-form-label">Пароль</label>
				<input type="password" name="password" value="" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Подтвердите пароль</label>
				<input type="password" name="confirm_password" value="" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Электронная почта</label>
				<input type="email" name="email" value="<?=$_REQUEST["EMAIL"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Мобильный телефон</label>
				<input type="tel" name="personal_mobile" value="<?=$_REQUEST["PERSONAL_MOBILE"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field b-form-field__date b-form-field__select">
				<label class="b-form-label">Дата рождения</label>
				<div class="b-form-field__date__day">
					<select name="birthday-day" class="b-select">
					<?for ($i=1;$i<=31;$i++) {?>
						<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
					</select>
				</div>
				<div class="b-form-field__date__month">
					<select name="birthday-month" class="b-select">
						<?for ($i=1;$i<=12;$i++) {
							if ($i < 10) $i = '0'.$i;
						?>
							<option value="<?=$i?>"><?=CFactory::humanMonth($i)?></option>
						<? } ?>
					</select>
				</div>
				<div class="b-form-field__date__year">
					<select name="birthday-year" class="b-select">
						<?for ($i=1950;$i<=1990;$i++) {?>
						<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
					</select>
				</div>
				<div class="i-clearfix"></div>
			</div>
			<div class="b-form-field b-form-field__gender b-form-field__select">
				<label class="b-form-label">Пол</label>
				<select name="personal_gender" class="b-select">
					<option value="0">Мужской</option>
					<option value="1">Женский</option>
				</select>
			</div>
		</div>			
		<div class="i-clearfix"></div>			
	</fieldset>	
	<fieldset>
		<legend>Работа</legend>		
		<div class="b-form-colimn1">
			<div class="b-form-field">
				<label class="b-form-label">Место работы</label>
				<input type="text" name="work_company" value="<?=$_REQUEST["WORK_COMPANY"]?>" class="b-input-text" required>
			</div>
		</div>
		
		<div class="b-form-colimn2">
			<div class="b-form-field">
				<label class="b-form-label">Рабочий телефон</label>
				<input type="tel" name="work_phone" value="<?=$_REQUEST["WORK_PHONE"]?>" class="b-input-text" required>
			</div>
		</div>
		
		<div class="i-clearfix"></div>			
	</fieldset>		
	<fieldset>
		<legend>Адрес</legend>			
		<div class="b-form-colimn1">
			<div class="b-form-field">
				<label class="b-form-label">Индекс</label>
				<input type="text" name="work_zip" value="<?=$_REQUEST["WORK_ZIP"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Город</label>
				<input type="text" name="work_city" value="<?=$_REQUEST["WORK_CITY"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Улица</label>
				<input type="text" name="street" value="<?=$_REQUEST["STREET"]?>" class="b-input-text" required>
			</div>
		</div>			
		<div class="b-form-colimn2">
			<div class="b-form-field">
				<label class="b-form-label">Дом</label>
				<input type="text" name="house" value="<?=$_REQUEST["HOUSE"]?>" class="b-input-text" required>
			</div>
			<div class="b-form-field">
				<label class="b-form-label">Корпус/Строение</label>
				<input type="text" name="bld" value="<?=$_REQUEST["BLD"]?>" class="b-input-text" required>
			</div>
			<!--<div class="b-form-field b-form-field__date">
				<label class="b-form-label">Квартира</label>
				<input type="text" name="flat" value="" class="b-input-text" required>
			</div>-->
		</div>		
		<div class="i-clearfix"></div>	
	</fieldset>		
	<fieldset>
		<legend>Соглашение</legend>
		
		<div class="b-form-field b-checkbox">
			<input type="checkbox" name="UF_GET_EMAIL" class="b-input-checkbox" required>
			<label class="b-checkbox-label">Я согласен получать информацию о проекте по электронной почте</label>
		</div>
		<div class="b-form-field b-checkbox">
			<input type="checkbox" name="UF_GET_SMS" class="b-input-checkbox" required>
			<label class="b-checkbox-label">Я согласен получать информацию о проекте в виде смс</label>
		</div>
		<div class="b-form-field b-checkbox">
			<input type="checkbox" name="UF_GET_COURSE" class="b-input-checkbox" required>
			<label class="b-checkbox-label">Я согласен получать информацию в виде обучающих материалов</label>
		</div>			
	</fieldset>
	<fieldset>
	<p>Да, я согласен с тем, что вся указанная мною информация может обрабатываться и использоваться, в том числе для направления мне информации о программе через любые каналы коммуникации, включая почту, SMS, электронную почту, телефон и иные каналы коммуникации, а также мои рабочие контактные данные могут быть указаны на сайте Российского Научно-Медицинского Общества «Мужское Здоровье» в открытом доступе в разделе «Доктор-Локатор».</p>
		<!--<legend>Дата регистрации</legend>	
		<div class="b-form-colimn1">
			<div class="b-form-field b-form-field__date b-form-field__select">
				<label class="b-form-label">Дата регистрации</label>
				<div class="b-form-field__date__day">
					<select name="registration-day" class="b-select">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3" selected="selected">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<div class="b-form-field__date__month">
					<select name="registration-month" class="b-select">
						<option value="0">января</option>
						<option value="1" selected="selected">февраля</option>
						<option value="2">марта</option>
						<option value="3">апреля</option>
					</select>
				</div>
				<div class="b-form-field__date__year">
					<select name="registration-year" class="b-select">
						<option value="1980">1980</option>
						<option value="1981">1981</option>
						<option value="1982" selected="selected">1982</option>
						<option value="1983">1983</option>
					</select>
				</div>
				<div class="i-clearfix"></div>
			</div>
		</div>		
		<div class="b-form-colimn2">
			<div class="b-form-field b-form-field__date b-form-field__select">
				<label class="b-form-label">Дата заполнения бумажного согласия</label>
				<div class="b-form-field__date__day">
					<select name="signing-day" class="b-select">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3" selected="selected">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<div class="b-form-field__date__month">
					<select name="signing-month" class="b-select">
						<option value="0">января</option>
						<option value="1" selected="selected">февраля</option>
						<option value="2">марта</option>
						<option value="3">апреля</option>
					</select>
				</div>
				<div class="b-form-field__date__year">
					<select name="signing-year" class="b-select">
						<option value="1980">1980</option>
						<option value="1981">1981</option>
						<option value="1982" selected="selected">1982</option>
						<option value="1983">1983</option>
					</select>
				</div>
				<div class="i-clearfix"></div>
			</div>
		</div>-->
		<div class="i-clearfix"></div>
	</fieldset>		
	<div class="b-form-submit">
	<button class="b-button b-button_type-submit b-button_theme-1-M-send" type="submit" name="register_submit_button"></button>
	</div>
</form>
<? } ?>
<?endif?>
