<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
<?$APPLICATION->ShowHead();?>
<?$APPLICATION->GetPageProperty("keywords");?>
<?$APPLICATION->GetPageProperty("description");?>
<!--<link rel="stylesheet" type="text/css" href="/css/styles.css" />-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script src="/js/html5shiv.js" type="text/javascript"></script>
<script src="/js/jscript.js" type="text/javascript"></script>
<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
<script src="/js/doctorsJSON.js" type="text/javascript"></script>
<title>Доктор-локатор</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31297918-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<?$APPLICATION->ShowPanel();?>
<?if(!CUser::IsAuthorized()) {
	$APPLICATION->IncludeComponent("locator:system.auth.form",".default",Array(
		 "REGISTER_URL" => "/registration/index.php",
		 "FORGOT_PASSWORD_URL" => "",
		 "PROFILE_URL" => "profile.php",
		 "SHOW_ERRORS" => "N" 
		 )
	);
}?>
<div class="i-page-content">
	<header class="b-header">
		<div class="b-logo">
			<?if($APPLICATION->GetCurDir() == "/" && $APPLICATION->GetCurPage() == "/"):?>
				<img src="/images/logo.gif" width="71" height="72" alt="Мужское здоровье">
			<?else:?>
				<a href="/"><img src="/images/logo.gif" width="71" height="72" alt="Мужское здоровье"></a>
			<?endif;?>
		</div>		
		<div class="b-top-heading">
			<?if($APPLICATION->GetCurDir() == "/" && $APPLICATION->GetCurPage() == "/"):?>
				<span class="b-top-heading__img i-image"><span class="i-image__text">Доктор-локатор</span></span>
			<?else:?>
				<a href="/" class="b-top-heading__img i-image"><span class="i-image__text">Доктор-локатор</span></a>
			<?endif;?>
		</div>
		<div class="i-clearfix"></div>
		<?if(!CUser::IsAuthorized()):?>
		<div class="b-sign-in">
			<a href="" class="b-sign-in__link">Вход</a>
			<?if($APPLICATION->GetCurDir() != "/registration/"):?> <span class="b-sign-in__sep">|</span><a href="/registration/">Регистрация для врачей</a><?endif;?>
		</div>
		<?else:?>
		<div class="b-personal-card">
			<div class="b-personal-card__info">
				<?
				global $USER;
				// Достаем имя, фамилию и отчество текующего авторизованного пользователя
				$rsUser = CUser::GetByID($USER->GetID());
				$arUser = $rsUser->Fetch();
				if ($arUser["PERSONAL_PHOTO"] != "") 
					$arUser["PERSONAL_PHOTO_SRC"] = CFile::GetPath($arUser["PERSONAL_PHOTO"]);
				else 
					$arUser["PERSONAL_PHOTO_SRC"] = "/upload/main/276/276d4a586cb4e024f997769a3e381388.jpg";
				?>
				<div class="b-personal-card__name"><?=$arUser["LAST_NAME"]?> <?=$arUser["NAME"]?> <?=$arUser["SECOND_NAME"]?></div>
				<div class="b-personal-card__links"><a href="">Редактировать анкету</a> <a href="/?logout=yes">Выход</a></div>
			</div>
			<div class="b-personal-card__pic">
				<a href="/doctor/"><img src="<?=$arUser["PERSONAL_PHOTO_SRC"]?>" width="50" height="50" alt=""></a>
			</div>
			<div class="i-clearfix"></div>
		</div>
		<div class="i-clearfix"></div>
		<?endif;?>
		<div class="b-header-instruction"></div>
	</header>
	<div class="b-page-space">
	<?/*$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"",
		Array(
			"START_FROM" => "0",
			"PATH" => "",
			"SITE_ID" => "-"
		),
	false
	);*/?>
