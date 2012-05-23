<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->RestartBuffer();

//doctors
$Doctors = array();
$rsDoctors =  CUser::GetList(($by="name"), ($order="asc"), array("GROUPS_ID" => array(6)/*,"ID" => 1*/));
while($arDoctor = $rsDoctors->GetNext()){
	$user = new CUser;
	$fields = Array(
	  "PERSONAL_PHOTO" => CFile::MakeFileArray($_SERVER['DOCUMENT_ROOT'] . '/images/avatar.jpg'),
	);
	$user->Update($arDoctor["ID"], $fields);
	$strError .= $user->LAST_ERROR;
}
?>
