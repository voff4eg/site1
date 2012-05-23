<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
// echo "<pre>";print_r($arResult);echo "</pre>";
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?>
	<form action="" method="get">
		<div class="b-cube-block_type-sign-in__box b-cube-block_type-sign-in__box-5 i-frame-border">
			<div class="i-frame-border__top"></div>
			<div class="i-frame-border__borders">								
				<h3 class="b-cube-block__header">Обратная связь</h3>
				
				<div class="b-cube-block__feedback-message"><?=$arResult["OK_MESSAGE"]?></div>
				
				<div class="b-cube-block__feedback-hidden">
					<div class="b-form-field">
						<textarea name="message" cols="10" rows="5" class="b-textarea" data-placeholder="Сообщение..."></textarea>
					</div>
					
					<div class="b-form-submit">
						<button href="/article/" class="b-button b-button_type-submit b-button_theme-1-S-send" type="submit"></button>
					</div>
				</div>
			</div>
			<div class="i-frame-border__bottom"></div>
		</div>
	</form>
	
<?
} else {
?>

<form action="<?=$APPLICATION->GetCurPage()?>" method="POST">
<?=bitrix_sessid_post()?>

	<div class="b-cube-block_type-sign-in__box b-cube-block_type-sign-in__box-5 i-frame-border">
		<div class="i-frame-border__top"></div>
		<div class="i-frame-border__borders">								
			<h3 class="b-cube-block__header">Обратная связь</h3>
			<div class="b-cube-block__feedback">
				<div class="b-form-field">
					<textarea name="MESSAGE" cols="10" rows="5" class="b-textarea" data-placeholder="Сообщение..."></textarea>
				</div>
				<div class="b-form-submit">
					<button href="/article/" class="b-button b-button_type-submit b-button_theme-1-S-send" type="submit"></button>
				</div>
			</div>
		</div>
		<div class="i-frame-border__bottom"></div>
	</div>

</form>

<? } ?>