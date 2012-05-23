	</div>	
	<footer class="b-footer">
		<div class="b-footer_column1">
			<?if($APPLICATION->GetCurDir() == "/" && $APPLICATION->GetCurPage() == "/"):?>
				<span class="b-footer_logo" title="Мужское здоровье"></span>
			<?else:?>
				<a href="/" class="b-footer_logo" title="Мужское здоровье"></a>
			<?endif;?>
		</div>
		<div class="b-footer_column2">
			<div class="b-footer-copyright">
				&copy; Российское Научно-Медицинское Общество «Мужское здоровье»
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "page",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => ""
				),
			false
			);?>
		</div>
		<div class="i-clearfix"></div>
	</footer>

	
<? if($APPLICATION->GetCurPage() == "/doctor/") { ?>

<div id="sign-popup" class="b-popup-window" data-doctor="">

	<a href="" class="b-popup-window__close" title="Закрыть окно"></a>
	
	<div class="b-popup-window_theme-1 b-popup-window_type-sign-in">
		<h2 class="b-popup-window__heading">
		
			<? if (strlen($arDoctor["LAST_NAME"]) > 0) { ?>
				<div class="b-doctor-page__lastname"><?=$arDoctor["LAST_NAME"]?></div>
			<? } ?>
			
			<? if (strlen($arDoctor["NAME"]) > 0 || strlen($arDoctor["SECOND_NAME"]) > 0) { ?>
				<div class="b-doctor-page__name"><?=$arDoctor["NAME"]?> <?=$arDoctor["SECOND_NAME"]?></div>
			<? } ?>
			
			<? if (strlen($arDoctor["WORK_POSITION"]) > 0) { ?>
				<div class="b-doctor-page__occupation"><?=$arDoctor["WORK_POSITION"]?></div>
			<? } ?>
		</h2>
		
		<? if (strlen($arDoctor["PERSONAL_PHOTO"]) > 0) { ?>
			<div class="b-doctor-page__pic b-doctor-page__pic__popup">
				<img src="<?=$arDoctor["PERSONAL_PHOTO"]?>" width="160" height="160" alt="" class="b-doctor-page__pic__img">
			</div>
		<? } ?>
		
		<div class="b-doctor-page__info b-doctor-page__info__popup">
		
			<? if (strlen($arDoctor["PERSONAL_STREET"]) > 0) { ?>
				<div class="b-doctor-page__address">
					<div class="b-doctor-page__heading">Адрес:</div>
					<?=$arDoctor["PERSONAL_STREET"]?>
				</div>
			<? } ?>
			
			<? if (strlen($arDoctor["PERSONAL_PHONE"]) > 0) { ?>
				<div class="b-doctor-page__phone">
					<div class="b-doctor-page__heading">Телефон:</div>
					<?=$arDoctor["PERSONAL_PHONE"]?>
				</div>
			<? } ?>
			
			<? if (strlen($arDoctor["EMAIL"]) > 0) { ?>
				<div class="b-doctor-page__mail">
					<div class="b-doctor-page__heading">Электронная почта:</div>
					<a href="mailto:balashov@gmail.com"><?=$arDoctor["EMAIL"]?></a>
				</div>
			<? } ?>
			
		</div>
		
		<div class="i-clearfix"></div>
		
		<div class="b-doctor-page__about">
			<?=$arDoctor["PERSONAL_NOTES"]?>
		</div>
		
		<div class="b-popup-window__ok">
			<button class="b-button b-button_theme-1-L-ok"></button>
		</div>
		
		<div class="b-popup-window__note">
			<a href="mailto:info@ochenprosto.ru">Сообщите нам</a>, если вам не удалось связаться с доктором
		</div>
		
	</div>

</div>

<? } ?>
<?if($APPLICATION->GetCurPage() == "/" && $APPLICATION->GetCurDir() == "/"):?>
<?$APPLICATION->IncludeComponent(
	"locator:doctors.list",
	"",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "",
		"IBLOCK_ID" => "",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => "",
		"PROPERTY_CODE" => "",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
false
);?>
<?endif;?>

	
</div>
</body>
</html>
