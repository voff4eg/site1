<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(!empty($arResult["USERS"])):?>
	<?foreach($arResult["USERS"] as $arUser):?>
<?//echo "<pre>";print_r($arUser);echo "</pre>";?>
		<div class="b-popup-window" data-doctor="<?=$arUser["ID"]?>">
			<a href="" class="b-popup-window__close" title="Закрыть окно"></a>
			
			<div class="b-popup-window_theme-1 b-popup-window_type-sign-in">
				<?if(strlen(trim($arUser["LAST_NAME"])) > 0 || strlen(trim($arUser["NAME"])) > 0 || strlen(trim($arUser["SECOND_NAME"])) > 0):?>
				<h2 class="b-popup-window__heading">
					<?if(strlen(trim($arUser["LAST_NAME"])) > 0):?><div class="b-doctor-page__lastname"><?=trim($arUser["LAST_NAME"])?></div><?endif;?>
					<?if(strlen(trim($arUser["LAST_NAME"])) > 0 || strlen(trim($arUser["NAME"])) > 0):?><div class="b-doctor-page__name"><?if(strlen(trim($arUser["NAME"])) > 0):?><?=trim($arUser["NAME"])?><?if(strlen(trim($arUser["SECOND_NAME"])) > 0):?> <?=trim($arUser["SECOND_NAME"])?><?endif;?><?else:?><?=trim($arUser["SECOND_NAME"])?><?endif;?></div><?endif;?>
					<?if(strlen(trim($arUser["WORK_POSITION"])) > 0):?><div class="b-doctor-page__occupation"><?=trim($arUser["WORK_POSITION"])?></div><?endif;?>
				</h2>
				<?endif;?>
				<?if(intval($arUser["PERSONAL_PHOTO"])):?>
				<div class="b-doctor-page__pic b-doctor-page__pic__popup">
					<img src="<?=CFile::GetPath($arUser["PERSONAL_PHOTO"])?>" width="160" height="160" alt="" class="b-doctor-page__pic__img">
				</div>
				<?endif;?>
				
				<div class="b-doctor-page__info b-doctor-page__info__popup">
				
					<?if(strlen(trim($arUser["WORK_STREET"])) > 0 || strlen(trim($arUser["WORK_CITY"])) > 0):?>
					<div class="b-doctor-page__address">
						<div class="b-doctor-page__heading">Адрес:</div>
						<?if(strlen(trim($arUser["WORK_CITY"])) > 0):?><?=trim($arUser["WORK_CITY"])?><?if(strlen(trim($arUser["WORK_STREET"])) > 0):?>, <?=trim($arUser["WORK_STREET"])?><?endif;?><?else:?><?=trim($arUser["WORK_STREET"])?><?endif;?>
					</div>
					<?endif;?>
					<?if(strlen(trim($arUser["WORK_PHONE"])) > 0):?>
					<div class="b-doctor-page__phone">
						<div class="b-doctor-page__heading">Телефон:</div>
						<?=trim($arUser["WORK_PHONE"])?>
					</div>
					<?endif;?>
					<?if(strlen(trim($arUser["EMAIL"])) > 0):?>
					<div class="b-doctor-page__mail">
						<div class="b-doctor-page__heading">Электронная почта:</div>
						<a href="mailto:<?=trim($arUser["EMAIL"])?>"><?=trim($arUser["EMAIL"])?></a>
					</div>
					<?endif;?>
				</div>
				
				<div class="i-clearfix"></div>
				<?if(strlen(trim($arUser["PERSONAL_NOTES"])) > 0):?>
				<div class="b-doctor-page__about">
					<?=trim($arUser["PERSONAL_NOTES"])?>
				</div>
				<?endif;?>
				<div class="b-popup-window__ok">
					<button class="b-button b-button_theme-1-L-ok"></button>
				</div>
				
				<div class="b-popup-window__note">
					<a href="mailto:info@ochenprosto.ru">Сообщите нам</a>, если вам не удалось связаться с доктором
				</div>
				
			</div>
			
		</div>
		
	<?endforeach;?>
<?endif;?>
