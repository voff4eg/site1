<?

$sChainProlog = "<nav class='b-bread-crumbs'><a href='/' class='b-bread-crumbs__item'>Главная</a><span class='b-bread-crumbs__sep'>&nbsp;/&nbsp;</span>";   // HTML выводимый перед навигационной цепочкой
$sChainBody = "";     // пункт навигационной цепочки
$sChainEpilog = "</nav>";   // HTML выводимый после навигационной цепочки

// разделитель
if ($ITEM_INDEX > 0)
   $sChainBody = "<span class='b-bread-crumbs__sep'>&nbsp;/&nbsp;</span>";

// выводим ссылку
$sChainBody .= "<a  class='b-bread-crumbs__item' href=\"".$LINK."\" >".htmlspecialchars($TITLE)."</a>";
?>