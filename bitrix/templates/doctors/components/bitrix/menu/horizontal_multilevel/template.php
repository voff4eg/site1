<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

//echo "<pre>"; print_r($arResult); echo "</pre>";

if (!empty($arResult))
{
	?>
	<menu class="b-top-menu">
		<?
        $previousLevel = 0;
        foreach($arResult as $arItem)
		{
            if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
			{
				echo str_repeat("</menu><div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
			}
            if ($arItem["IS_PARENT"])
			{
                if ($arItem["DEPTH_LEVEL"] == 1)
				{
					?>
                    <li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?><?=($arItem["SELECTED"])?" b-top-menu__item__current":"";?>">
                        <a href="<?=$arItem["LINK"]?>" class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
                        <div class="b-top-menu__item_relative">
                            <span class="b-top-menu__item__pointer"></span>
                            <menu class="b-top-submenu">
                	<?
				}
				else
				{
					?>
                    <li class="b-top-submenu__item b-top-submenu__item__<?=$arItem["PARAMS"]["image"]?><?=($arItem["SELECTED"])?" b-top-submenu__item__current":"";?>>
                        <a href="<?=$arItem["LINK"]?>" class="b-menu-item b-top-submenu__item__text i-image">
                            <span class="i-image__text"><?=$arItem["TEXT"]?></span>
                        </a>
                    </li>
                	<?
				}
			}
			else
			{
				if ($arItem["PERMISSION"] > "D")
				{
					if ($arItem["DEPTH_LEVEL"] == 1)
					{
						if ($arItem["SELECTED"])
						{
							?>
							<!--<li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?> b-top-menu__item__current">
                                <span class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></span>
                            </li>-->
							<li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?>">
                                <a href="<?=$arItem["LINK"]?>" class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
                            </li>
							<?
						}
						else
						{
							?>
							<li class="b-top-menu__item b-top-menu__item__<?=$arItem["PARAMS"]["image"]?>">
                                <a href="<?=$arItem["LINK"]?>" class="b-top-menu__item__text i-image"><span class="i-image__text"><?=$arItem["TEXT"]?></span></a>
                            </li>
							<?
						}
					}
					else
					{
						
						?>
                        <li class="b-top-submenu__item b-top-submenu__item__<?=$arItem["PARAMS"]["image"]?><?=($arItem["SELECTED"])?' b-top-submenu__item__current':'';?>">
                            <a href="<?=$arItem["LINK"]?>" class="b-menu-item b-top-submenu__item__text i-image">
                                <span class="i-image__text"><?=$arItem["TEXT"]?></span>
                            </a>
                        </li>
                    	<?
					}
				}
				else
				{
					if ($arItem["DEPTH_LEVEL"] == 1)
					{
						?>
                        <li><a href="" class="<?=($arItem["SELECTED"])?"root-item-selected":"root-item";?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                    	<?
					}
					else
					{
						?>
                        <li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                    	<?
					}
				}
			}
            $previousLevel = $arItem["DEPTH_LEVEL"];
		}
        if ($previousLevel > 1)//close last item tags
		{
			echo str_repeat("</menu><div></li>", ($previousLevel-1));
		}
		?>
	</menu>
	<?
}
?>