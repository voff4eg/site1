<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Lilly Answers That Matter");
?>
<!--<nav class="b-bread-crumbs">
	<a href="" class="b-bread-crumbs__link">Локатор</a> <span class="b-bread-crumbs__sep">/</span> <span class="b-bread-crumbs__current">Доктор Балашов</span>
</nav>-->
<div class="b-doctor-page b-person-page">
	<?$APPLICATION->IncludeComponent("locator:main.profile","",Array(
			"USER_PROPERTY_NAME" => "",
			"SET_TITLE" => "Y", 
			"AJAX_MODE" => "N", 
			"USER_PROPERTY" => Array(), 
			"SEND_INFO" => "Y", 
			"CHECK_RIGHTS" => "Y", 
			"AJAX_OPTION_SHADOW" => "Y", 
			"AJAX_OPTION_JUMP" => "N", 
			"AJAX_OPTION_STYLE" => "Y", 
			"AJAX_OPTION_HISTORY" => "N",
			"CHECK_RIGHTS" => "N"
		)
	);?> 
	<div class="i-clearfix"></div>
	
			<?
				require($_SERVER["DOCUMENT_ROOT"].'/classes/comment.class.php');
				require($_SERVER["DOCUMENT_ROOT"].'/classes/factory.class.php');
				
				settype($doctor_id, "integer");
				$doctor_id = (int)$_GET["ID"];
				
				CModule::IncludeModule("iblock");
				$obComment = CFClubComment::getInstance();
				if($arComments = $obComment->getList($doctor_id)){ ?>
					<div class="b-comments">
						<h2 class="b-h2">Отзывы о докторе</h2>
						
						<? foreach($arComments as $arComment){ ?>
							
							<? if ($arComment["CREATED_BY"] == '0') { 
									$arComment["USER"]["COMMON_NAME"] = $arComment["PROPERTY_GUEST_NAME_VALUE"];
								} else {
									$arComment["USER"]["COMMON_NAME"] = $arComment["USER"]["NAME"]." ".$arComment["USER"]["LAST_NAME"];
								}
							?>
							
							<div class="b-comments__item b-comment">
								<div class="b-comment__name"><?=$arComment["USER"]["COMMON_NAME"]?></div>
								<div class="b-comment__text"><?=$arComment["PREVIEW_TEXT"]?></div>
								<div class="b-comment__date"><?=CFactory::human_DATE_CREATE($arComment["~DATE_CREATE"])?></div>
							</div>
							
						<? } ?>
					
					</div>
				
				<? } ?>
			

			<?if($USER->IsAuthorized()){?>
				<div class="b-form-block b-comment-form">
					<form action="comment.php" method="post" class="b-form" name="comment">
						<h2 class="b-form__heading">Добавить отзыв</h2>
						<div class="b-form-field">
							<textarea name="text" data-placeholder="Текст отзыва" class="b-textarea" required></textarea>
						</div>
						<div class="b-form-submit">
							<button class="b-button b-button_type-submit b-button_theme-1-M-comment" type="submit"></button>
						</div>
						<input type="hidden" name="a" value="new">
						<input type="hidden" name="recipe" value="<?=$doctor_id?>">
					</form>
				</div>
			<?} else {?>
				<div class="b-form-block b-comment-form">
					<form action="comment.php" method="post" class="b-form" name="comment">
						<h2 class="b-form__heading">Добавить отзыв</h2>
						<div class="b-form-field">
							<input type="text" name="author" value="" data-placeholder="Автор" class="b-input-text" required>
						</div>
						<div class="b-form-field">
							<textarea name="text" data-placeholder="Текст отзыва" class="b-textarea" required></textarea>
						</div>
						<div class="b-form-submit">
							<button class="b-button b-button_type-submit b-button_theme-1-M-comment" type="submit"></button>
						</div>
						<input type="hidden" name="a" value="new">
						<input type="hidden" name="recipe" value="<?=$doctor_id?>">
					</form>
				</div>
			<?}?>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>