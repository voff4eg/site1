<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<nav class="b-bread-crumbs">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($index > 0)
		$strReturn .= ' <span class="b-bread-crumbs__sep">/</span> ';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "")
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" class="b-bread-crumbs__link">'.$title.'</a>';
	else
		$strReturn .= '<span class="b-bread-crumbs__current">'.$title.'</span>';
}

$strReturn .= '</nav>';
return $strReturn;
?>
