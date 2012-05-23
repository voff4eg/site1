<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Lilly Answers That Matter");
?> 
<div id="Locator" class="b-locator">
	
	<div class="b-locator__service">		
	
		<div class="b-locator__my-location">
			<div class="b-locator__my-location__form" id="LocatorForm">
				<form action="" method="get" class="b-search-form">
					<div class="b-form-field">
						<input type="text" name="address" value="" data-placeholder="Уточните свой адрес" class="b-input-text" required>
					</div>
					<div class="b-form-submit">
						<button class="b-button b-button_type-submit b-button_theme-1-M-find" type="submit"></button>
					</div>
				</form>
			</div>
			<!--
			<div class="b-locator__my-location__link">
				<a href="">Определить мое местоположение</a>
			</div>
			-->
			<div class="i-clearfix"></div>
		</div>
		
		<div class="b-locator__map">
			<div class="b-locator__map__more"><a href="#" class="b-button b-locator__map__more__button b-button_theme-1-S-more"></a></div>
			<div id="LocatorMap" style="width: 100%; height: 400px;"></div>
			<div class="i-decor-block-shadow"></div>
		</div>					
  <?/*$APPLICATION->IncludeComponent(
		"prosto:doctors.list",
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
	);*/?>
	<div class="b-locator__result">
		<div class="b-locator__result__tabs b-tabs">
			<div class="b-tabs__item b-tabs__item__type-active" id="tab-locator-result">
				<span class="b-tabs__item__text">Врачи поблизости</span>
			</div>
			<div class="i-clearfix"></div>
		</div>
		<div class="b-locator__result__content">
			<div id="block-locator-result">
				<div class="b-get-more"><a href="">Показать еще</a></div>
			</div>
			
		</div>
		<div class="i-decor-block-shadow"></div>
	</div>
</div>
<div class="i-clearfix"></div>

</div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
