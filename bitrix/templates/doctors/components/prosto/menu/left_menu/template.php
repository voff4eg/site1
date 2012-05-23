<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!empty($arResult))
{
	?>
    <menu class="b-left-menu">
		<?
        foreach($arResult as $arItem)
        {
            if ($arItem["SELECTED"]) 
            {
                ?>
                <li class="b-left-menu__item b-left-menu__item__<?=$arItem["PARAMS"]["image"]?> b-left-menu__item__current">
                    <span class="b-menu-item b-left-menu__item_text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></span>
                    <span class="b-left-menu__item_pointer"></span>
                </li>
                <?
            }
            else
            {
				if($arItem["CURRENT"]){
					?>
					<li class="b-left-menu__item b-left-menu__item__<?=$arItem["PARAMS"]["image"]?> b-left-menu__item__current">
						<a href="<?=$arItem["LINK"]?>" class="b-menu-item b-left-menu__item_text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
						<span class="b-left-menu__item_pointer"></span>
					</li>
					<?
				}else{
					?>
					<li class="b-left-menu__item b-left-menu__item__<?=$arItem["PARAMS"]["image"]?>"><a href="<?=$arItem["LINK"]?>" class="b-menu-item b-left-menu__item_text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a></li>
					<?
				}
            }
        }
        ?>
    </menu>
	<?
}
?>