<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule("iblock");

$APPLICATION->RestartBuffer();
//include($_SERVER['DOCUMENT_ROOT']."/bitrix/templates/fclub/service.header.php");
	
	require($_SERVER["DOCUMENT_ROOT"].'/classes/comment.class.php');
	$obComment = CFClubComment::getInstance();

	if($_REQUEST['a'] == "new"){
		if(isset($_REQUEST['recipe']) && intval($_REQUEST['recipe']) > 0)$intRecipe = IntVal($_REQUEST['recipe']);
			else $bError = true;
			
		if(isset($_REQUEST['text']) && strlen($_REQUEST['text']) > 0)$strComment = StrVal($_REQUEST['text']);
			else $bError = true;
			
		/*if(isset($_REQUEST['author']) && strlen($_REQUEST['author']) > 0 && !$USER->Authorized()) {
		
			echo "11111";
			$strComment = StrVal($_REQUEST['text']);
			else $bError = true;
			
		}*/
		
		if(!$bError){
		
			if ($USER->IsAuthorized()) {
			
				$obComment->add($intRecipe, $strComment, $intReply, $intRoot); 
								
			} else {
				
				$anonim = $_REQUEST["author"];
				$obComment->add($intRecipe, $strComment, $intReply, $intRoot, $anonim); 
				
			}
			
		}
	}
		



include($_SERVER['DOCUMENT_ROOT']."/bitrix/templates/fclub/service.footer.php"); die;?>