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
<?//$APPLICATION->AddHeadString('<link href="/css/style_site.css" type="text/css" rel="stylesheet" />');?>
<?$APPLICATION->AddHeadString('<link href="/css/styles.css" type="text/css" rel="stylesheet" />');?>
<?$APPLICATION->AddHeadString('<link href="/css/top-menu.css" type="text/css" rel="stylesheet" />');?>
<?if(CUser::IsAuthorized()):?>
    <?if (array_search(5, $USER->GetUserGroup($USER->GetID())) !== false) {
        $IS_DOCTOR = TRUE;
    }?>
<?endif;?>
<?//$APPLICATION->AddHeadString('<link href="/css/not-auth.css" type="text/css" rel="stylesheet" />');?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?=$APPLICATION->ShowPanel();?>
<?if ($IS_DOCTOR === TRUE) {?>
	<div class="i-page-content i-doctors">
<?} else {?>
	<div class="i-page-content">
<?}?>
