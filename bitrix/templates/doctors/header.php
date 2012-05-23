<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<?$APPLICATION->ShowHead();?>
<?$APPLICATION->GetPageProperty("keywords");?>
<?$APPLICATION->GetPageProperty("description");?>
<!--[if lte IE 7]>
<link href="/css/ie6.css" rel="stylesheet" type="text/css">
<![endif]-->
<?$APPLICATION->AddHeadScript('/js/jscript.js');?>
<?$APPLICATION->AddHeadScript('/js/html5shiv.js');?>
<?$APPLICATION->AddHeadString('<link href="/css/styles.css" type="text/css" rel="stylesheet" />');?>
<?$APPLICATION->AddHeadString('<link href="/css/top-menu.css" type="text/css" rel="stylesheet" />');?>
<?if(CUser::IsAuthorized()):?>
    <?$APPLICATION->AddHeadString('<link href="/css/auth.css" type="text/css" rel="stylesheet" />');?>
    <?if (array_search(5, $USER->GetUserGroup($USER->GetID())) !== false) {
        $IS_DOCTOR = TRUE;
        $APPLICATION->AddHeadString('<link href="/css/doctors.css" type="text/css" rel="stylesheet" />');
    }?>
    <?$IS_FILES = TRUE;?>
<?else:?>
	<?
    LocalRedirect("/errors/404.php");
	?>
	<?//$APPLICATION->AddHeadString('<link href="/css/not-auth.css" type="text/css" rel="stylesheet" />');?>
<?endif;?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?=$APPLICATION->ShowPanel();?>
<?$APPLICATION->IncludeComponent(
	"prosto:system.auth.form",
	"",
	Array(
		"REGISTER_URL" => "",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
	),
false
);?>
<?if ($IS_DOCTOR === TRUE) {?>
	<div class="i-page-content i-doctors">
<?} else {?>
	<div class="i-page-content">
<?}?>
<header class="b-top-panel">
	<div class="b-top-panel_logo b-top-panel_column1">
	
		<a href="/"><img src="/images/logo.gif" width="126" height="49" alt="Lilly Answers That Matter" title="Lilly Answers That Matter" /></a>
	
	</div>
    <div class="b-top-panel_menu b-top-panel_column2">
        <?$APPLICATION->IncludeComponent("prosto:menu", "horizontal_multilevel", array(
            "ROOT_MENU_TYPE" => "top",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => array(
            ),
            "MAX_LEVEL" => "2",
            "CHILD_MENU_TYPE" => "subtop",
            "USE_EXT" => "N",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N"
            ),
            false
        );?>
	</div>
	
	<?if ($IS_DOCTOR === TRUE) {?>
		<div class="b-top-panel__doctor-label b-top-panel_column3">
			<div class="b-doctor-label">
				<span class="b-doctor-label__text i-image"><span class="i-image__text">Для врачей</span></span>
				<div class="b-doctor-label__pointer"></div>
			</div>
		</div>
	<?} else {?>
		<div class="b-top-panel__sign-in b-top-panel_column3">
			<a href="" class="b-top-panel__sign-in__link b-top-panel__sign-in__link__type-doctors i-image">
				<span class="i-image__text">Вход для врачей</span>
			</a>
		</div>
	<?}?>
	
	<div class="i-clearfix"></div>
</header>
<?$APPLICATION->ShowNavChain();?>
<div class="b-page-space">	
	<aside class="b-aside">
	
		<div class="b-cube-block b-cube-block__size-1x1 b-cube-block__type_left-menu b-cube-block__theme-2">
            <?$APPLICATION->IncludeComponent("prosto:menu", "left_menu", Array(
	"ROOT_MENU_TYPE" => "subtop",	// Тип меню для первого уровня
	"MAX_LEVEL" => "1",	// Уровень вложенности меню
	"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
	"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	"DELAY" => "N",	// Откладывать выполнение шаблона меню
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
	"MENU_CACHE_TYPE" => "N",	// Тип кеширования
	"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
	"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
	),
	false
);?>
		</div>
		
		<?if ($IS_DOCTOR === FALSE) {?>
		<div class="b-cube-block b-cube-block__size-1x1 b-cube-block__theme-1">
			<div class="b-cube-block__content">
				<h3 class="b-cube-block__header">Скачайте и возьмите с собой</h3>
				<ul class="b-file-short-list">
					<li class="b-file-short-list__item">
						<a href="file.pdf" target="_blank">Как отдохнуть на юге без проблем.pdf</a>
					</li>
					<li class="b-file-short-list__item">
						<a href="file.pdf" target="_blank">Как отдохнуть.pdf</a>
					</li>
				</ul>
			</div>
			<div class="i-clearfix"></div>
		</div>
		
		<div class="b-cube-block b-cube-block__size-1x1 b-cube-block__type-icon b-cube-block__icon-phone b-cube-block__theme-1">
			<div class="b-cube-block__content">
				<h3 class="b-cube-block__header">Консультация уролога</h3>
				<div class="b-phone-number i-image">
					<div class="i-image__text">8 800 200 36 36</div>
				</div>
				<div class="b-cube-block__text">Получи консультацию профессионального врача бесплатно и анонимно</div>
			</div>
			<div class="i-clearfix"></div>
		</div>
		<?} else {/*?>
			<div class="b-cube-block b-cube-block__size-1x1 b-cube-block__type-icon b-cube-block__icon-phone b-cube-block__theme-1">
				<div class="b-cube-block__content">
					<h3 class="b-cube-block__header">Следите за обновлениями проекта!</h3>
					<div class="b-cube-block__text">Получи консультацию профессионального врача бесплатно и анонимно</div>
				</div>
				<div class="i-clearfix"></div>
			</div>
		<?*/}?>
	</aside>	
	<div class="b-page-content">