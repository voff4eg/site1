<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->RestartBuffer();

//doctors
$Doctors = array();
$rsDoctors =  CUser::GetList(($by="name"), ($order="asc"), array("GROUPS_ID" => array(6)));
while($arDoctor = $rsDoctors->GetNext()){
	$full_name = "";
	if(strlen($arDoctor["LAST_NAME"]) > 0){
		$full_name .= $arDoctor["LAST_NAME"];
		if(strlen($arDoctor["NAME"]) > 0){
			$full_name .= " ".$arDoctor["NAME"];
		}
		if(strlen($arDoctor["SECOND_NAME"]) > 0){
			$full_name .= " ".$arDoctor["SECOND_NAME"];
		}
	}elseif(strlen($arDoctor["NAME"]) > 0){
		$full_name .= $arDoctor["NAME"];
		if(strlen($arDoctor["SECOND_NAME"]) > 0){
			$full_name .= " ".$arDoctor["SECOND_NAME"];
		}
	}elseif(strlen($arDoctor["SECOND_NAME"]) > 0){
		$full_name .= $arDoctor["SECOND_NAME"];
	}else{
		$full_name .= $login;
	}
	$doctor_address = "";
	if (strlen($arDoctor["WORK_CITY"]) > 0 && strlen($arDoctor["WORK_STREET"]) == 0) $doctor_address = $arDoctor["WORK_CITY"];
	elseif (strlen($arDoctor["WORK_STREET"]) > 0 && strlen($arDoctor["WORK_CITY"]) == 0) $doctor_address = $arDoctor["WORK_STREET"];
	elseif (strlen($arDoctor["WORK_STREET"]) > 0 && strlen($arDoctor["WORK_CITY"]) > 0) $doctor_address = $arDoctor["WORK_CITY"].", ".$arDoctor["WORK_STREET"];
	
	$Doctors[] = array(
		"id" => $arDoctor["ID"],
		"name" => $full_name,
		"work_position" => (strlen($arDoctor["WORK_POSITION"]) > 0 ? $arDoctor["WORK_POSITION"] : ""),
		//"address" => (strlen($arDoctor["PERSONAL_CITY"]) || strlen($arDoctor["PERSONAL_STREET"]) > 0 ? $arDoctor["PERSONAL_CITY"]." ".$arDoctor["PERSONAL_STREET"]: ""),
		//"address" => (strlen($arDoctor["WORK_CITY"]) || strlen($arDoctor["WORK_STREET"]) > 0 ? $arDoctor["WORK_CITY"]." ".$arDoctor["WORK_STREET"]: ""),
		//"address" => (strlen($arDoctor["WORK_STREET"]) > 0 ? $arDoctor["WORK_STREET"]: ""),
		"address" => $doctor_address,
		"href" => "/doctor/?ID=".$arDoctor["ID"],
		"experience" => (strlen($arDoctor["UF_EXPERIENCE"]) > 0 ? $arDoctor["UF_EXPERIENCE"] : ""),
		"pic" => (intval($arDoctor["PERSONAL_PHOTO"]) > 0 ? CFile::GetPath($arDoctor["PERSONAL_PHOTO"]) : ""),
	);
}
$Content = "var doctorsJSON = ".json_encode($Doctors).";";
$filename = $_SERVER['DOCUMENT_ROOT']."/js/doctorsJSON.js";

// Вначале давайте убедимся, что файл существует и доступен для записи.
if (is_writable($filename)) {

    // В нашем примере мы открываем $filename в режиме "записи в конец".
    // Таким образом, смещение установлено в конец файла и
    // наш $somecontent допишется в конец при использовании fwrite().
    if (!$handle = fopen($filename, 'a')) {
         echo "Не могу открыть файл ($filename)";
         exit;
    }

    // Записываем $somecontent в наш открытый файл.
    if (fwrite($handle, $Content) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
    }

    echo "Ура! Записали ($Content) в файл ($filename)";

    fclose($handle);

} else {
    echo "Файл $filename недоступен для записи";
}
?>
