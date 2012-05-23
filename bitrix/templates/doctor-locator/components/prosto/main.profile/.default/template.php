<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
<?$last_name_len = strlen(trim($arResult["arUser"]["LAST_NAME"]));
$name_len = strlen(trim($arResult["arUser"]["NAME"]));
$second_name_len = strlen(trim($arResult["arUser"]["SECOND_NAME"]));
$full_name = "";
if($second_name_len > 0 || $name_len > 0 || $last_name_len > 0){
	if($second_name_len > 0){
		$full_name = trim($arResult["arUser"]["SECOND_NAME"]);
		if($name_len > 0 && $last_name_len > 0){
			$full_name .= " ".trim($arResult["arUser"]["NAME"])." ".trim($arResult["arUser"]["LAST_NAME"]);
		}elseif($name_len > 0){
			$full_name .= " ".trim($arResult["arUser"]["NAME"]);
		}elseif($last_name_len > 0){
			$full_name .= " ".trim($arResult["arUser"]["LAST_NAME"]);
		}		
	}else{
		if($name_len > 0){
			$full_name = trim($arResult["arUser"]["NAME"]);
			if($last_name_len > 0){
				$full_name .= " ".trim($arResult["arUser"]["LAST_NAME"]);
			}
		}elseif($last_name_len > 0){
			$full_name = trim($arResult["arUser"]["LAST_NAME"]);
		}
	}
}
$work_position_len = strlen(trim($arResult["arUser"]["WORK_POSITION"]));
if(strlen(trim($arResult["arUser"]["WORK_STREET"])) > 0 || strlen(trim($arResult["arUser"]["WORK_CITY"])) > 0){
	if(strlen(trim($arResult["arUser"]["WORK_CITY"])) > 0){
		$address = trim($arResult["arUser"]["WORK_CITY"]);
		if(strlen(trim($arResult["arUser"]["WORK_STREET"])) > 0){
			$address .= ", ".trim($arResult["arUser"]["WORK_STREET"]);
		}
	}else{
		if(strlen(trim($arResult["arUser"]["WORK_STREET"])) > 0){
			$address .= trim($arResult["arUser"]["WORK_STREET"]);
		}
	}
	$address_len = strlen(trim($address));	
}
$schedule_len = strlen(trim($arResult["arUser"]["~WORK_PROFILE"]));
$personal_info_len = strlen(trim($arResult["arUser"]["PERSONAL_NOTES"]));
$photo_path = CFile::GetPath($arResult["arUser"]["PERSONAL_PHOTO"]);

// массив для всплывающего окна
global $arDoctor;
$arDoctor = array();
$arDoctor["LAST_NAME"] = $arResult["arUser"]["LAST_NAME"];
$arDoctor["NAME"] = $arResult["arUser"]["NAME"];
$arDoctor["SECOND_NAME"] = $arResult["arUser"]["SECOND_NAME"];
$arDoctor["WORK_POSITION"] = $arResult["arUser"]["WORK_POSITION"];
$arDoctor["PERSONAL_PHONE"] = $arResult["arUser"]["PERSONAL_PHONE"];
$arDoctor["EMAIL"] = $arResult["arUser"]["EMAIL"];
$arDoctor["PERSONAL_STREET"] = $address;
$arDoctor["~WORK_PROFILE"] = $arResult["arUser"]["~WORK_PROFILE"];
$arDoctor["PERSONAL_NOTES"] = $arResult["arUser"]["PERSONAL_NOTES"];
$arDoctor["PERSONAL_PHOTO"] = CFile::GetPath($arResult["arUser"]["PERSONAL_PHOTO"]);
?>
<div class="b-doctor-page__card" data-doctor="<?=$arResult["arUser"]["ID"]?>">
<?if($last_name_len > 0 || $second_name_len > 0 || $name_len > 0 || $work_position_len > 0):?>
	<h1 class="b-doctor-page__h1">
		<?if($last_name_len > 0):?><div class="b-doctor-page__lastname"><?=$arResult["arUser"]["LAST_NAME"]?></div><?endif;?>
		<?if($second_name_len > 0 || $name_len > 0):?><div class="b-doctor-page__name"><?=($name_len > 0 ? $arResult["arUser"]["NAME"] : "")?><?=($name_len > 0 && $second_name_len > 0 ? " " : "")?><?=($second_name_len > 0 ? $arResult["arUser"]["SECOND_NAME"] : "")?></div><?endif;?>
		<?if($work_position_len > 0):?><div class="b-doctor-page__occupation"><?=$arResult["arUser"]["WORK_POSITION"]?></div><?endif;?>
	</h1>
<?endif;?>
<?if(intval($arResult["arUser"]["PERSONAL_PHOTO"]) > 0):?>
	<div class="b-doctor-page__pic">
		<img src="<?=$photo_path?>" width="220" height="220" alt="" class="b-doctor-page__pic__img">
		<div class="b-doctor-page__rating"></div>
	</div>
<?endif;?>
<?if($address_len > 0 || $schedule_len > 0):?>
	<div class="b-doctor-page__info">
	<?if($address_len > 0):?>
		<div class="b-doctor-page__address">
			<div class="b-doctor-page__heading">Адрес:</div>
			<?=$address?>
		</div>
	<?endif;?>
	<?if($schedule_len > 0):?>
		<div class="b-doctor-page__schedule">
			<div class="b-doctor-page__heading">Расписание</div>
			<?=$arResult["arUser"]["~WORK_PROFILE"]?>
		</div>
	<?endif;?>
		<div class="b-doctor-page__sign">
			<button class="b-button b-button_type-sign b-button_theme-1-M-sign" type="submit"></button>
		</div>
	</div>
<?endif;?>
	<div class="i-clearfix"></div>
<?if($personal_info_len > 0):?>
	<div class="b-doctor-page__about">
		<?=$arResult["arUser"]["PERSONAL_NOTES"]?>
	</div>
<?endif;?>		
</div>
<?if($address_len > 0 && strlen($full_name) > 0):?>
<div class="b-doctor-page__map">
	<script type="text/javascript">
		// Как только будет загружен API и готов DOM, выполняем инициализацию
		ymaps.ready(init);

		function init () {
			ymaps.geocode('<?=$address?>', { results: 1 }).then(function (res) {
				var firstGeoObject = res.geoObjects.get(0);
				
				window.doctorMap = new ymaps.Map("doctorPageMap", {
					center: firstGeoObject.geometry.getCoordinates(),
					zoom: 15
				});
				
				doctorMap.controls.add('smallZoomControl', { right: 5, top: 5 });
				
				doctorMap.geoObjects.add(
					new ymaps.Placemark(
						firstGeoObject.geometry.getCoordinates(),
						{
							balloonContent: '<div class="b-locator__map__doctors__item b-map-infopoint"><div class="b-map-infopoint__content"><div class="b-map-infopoint__person"><div class="b-map-infopoint__person__info"><div class="b-map-infopoint__name"><?=$full_name?></div></div><div class="i-clearfix"></div></div><div class="b-map-infopoint__address"><div class="b-map-infopoint__address__heading">Адрес:</div><?=$address?></div><div class="b-map-infopoint__pointer"></div></div></div>',
							iconContent: '<div class="b-locator__map__doctors__item b-map-point"><div class="b-map-point__content"><img width="28" height="28" class="b-map-point__pic" alt="<?=$full_name?>" src="<?=$photo_path?>"></div></div>'
						},
						{
							iconLayout:"default#imageWithContent",
							iconImageHref: '/images/spacer.gif',
							iconImageSize: [1, 1],
							balloonLayout: "default#imageWithContent",
							balloonImageHref: '/images/spacer.gif',
							balloonImageSize: [1, 1],
							balloonShadow: false
						}
					)
				);
			
			}, function (err) {
				alert(err.message);
			})
		}
	</script>
	<div id="doctorPageMap" class="b-doctor-page__map-item"></div>
	<div class="i-decor-block-shadow i-decor-block-shadow__type-middle"></div>
</div>
<?endif;?>
