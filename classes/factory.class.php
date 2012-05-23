<?
class CFactory {
	function debug($ar) {
		echo "<pre>";
		print_r($ar);
		echo "</pre>";
	}
	
	function humanDate($strDate = ""){
		$arMonth = Array(
			"01"=>"января",
			"02"=>"февраля",
			"03"=>"марта",
			"04"=>"апреля",
			"05"=>"мая",
			"06"=>"июня",
			"07"=>"июля",
			"08"=>"августа",
			"09"=>"сентября",
			"10"=>"октября",
			"11"=>"ноября",
			"12"=>"декабря",
		);
		$strDate = explode(" ",$strDate);
		$arDate = explode(".",$strDate[0]);
		if(strlen($strDate[1]) > 0)
			$strReturn = date("j ".$arMonth[$arDate[1]]." Y", mktime(0, 0, 0, $arDate[1], $arDate[0], $arDate[2])).", ".$strDate[1];
		else
			$strReturn = date("j ".$arMonth[$arDate[1]]." Y", mktime(0, 0, 0, $arDate[1], $arDate[0], $arDate[2]));
		return $strReturn;
	}
	
	function human_ACTIVE_FROM($str) {
		$strReturn = "";
		if ($str !== "") {
			$datetime = CFactory::humanDate($str);
			$strReturn = substr($datetime, 0, strpos($datetime, ','));
		}
		return $strReturn;
	}
	
	function human_DATE_CREATE($str) {
		$strReturn = $str;
		if ($str !== "") {
			$datetime = CFactory::humanDate($str);
			$strReturn = substr($datetime, 0, strpos($datetime, ','));
		}
		return $strReturn;
	}
	
	
	
	function humanMonth($intMonth){
		$arMonth = Array(
			"01"=>"Января",
			"02"=>"Февраля",
			"03"=>"Марта",
			"04"=>"Апреля",
			"05"=>"Мая",
			"06"=>"Июня",
			"07"=>"Июля",
			"08"=>"Августа",
			"09"=>"Сентября",
			"10"=>"Октября",
			"11"=>"Ноября",
			"12"=>"Декабря",
		);
		return $arMonth[ $intMonth ];
	}
	
	function plural_form($n, $forms) {
		return $n%10==1&&$n%100!=11?$forms[0]:($n%10>=2&&$n%10<=4&&($n%100<10||$n%100>=20)?$forms[1]:$forms[2]);
	}
}
?>