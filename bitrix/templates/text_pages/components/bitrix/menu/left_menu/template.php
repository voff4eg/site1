<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!empty($arResult))
{
	?>
    <div class="b-cube-block b-cube-block__size-1x1 b-cube-block__type_left-menu b-cube-block__theme-2">
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
                ?>
                <li class="b-left-menu__item b-left-menu__item__<?=$arItem["PARAMS"]["image"]?>"><a href="<?=$arItem["LINK"]?>" class="b-menu-item b-left-menu__item_text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a></li>
                <?
            }
        }
        ?>
    </menu>
    </div>
	<?
}
?>