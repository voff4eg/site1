<?
class CFClubComment
{
	static private $_instance = null;
	
	/*
	 * Добавления комментария
	 */
	static public function add($intRecipe, $strComment, $intReply, $intRoot, $anonim = false){
		$intID = false;
		global $USER;
		
		
		$arProp = Array("recipe"=>$intRecipe);
		if(isset($intReply))$arProp['reply'] = $intReply;
		if(isset($intReply))$arProp['root'] = $intRoot;
		
		// комментарий от анонима
		if ($anonim != false && $anonim !== "") {
			
			$arProp["guest_name"] = $anonim;
			
		}
		
		$arLoadProductArray = Array(
			"IBLOCK_SECTION"  => false,
			"IBLOCK_ID"       => 12,
			"PROPERTY_VALUES" => $arProp,
			"NAME"            => "Отзыв о докторе ".$intRecipe,
			"ACTIVE"          => "N",
			"PREVIEW_TEXT"    => $strComment,
	    );
	    
	    $elComment   = new CIBlockElement;
		$intID = $elComment->Add($arLoadProductArray);
		
		/*$rsCount = CIBlockElement::GetProperty(5, $intRecipe, "sort", "asc", Array("CODE"=>"comment_count"));
		$arCount = $rsCount->Fetch(); 
		$mixCount = IntVal($arCount["VALUE"]);
		CIBlockElement::SetPropertyValues($intRecipe, 5, IntVal($mixCount)+1, "comment_count");
		
		$obCache = new CPageCache;
		$obCache->Clean("main", "home");*/
		
		//$rsRecipe = CIBlockElement::GetById($intRecipe);
		//$arRecipe = $rsRecipe->Fetch();
		//$rsUser = CUser::GetID();
		//$arUser = $rsUser->Fetch();
		
		$arFields = array(
		    "MESSAGE"	=> $strComment,
		    "EDIT_LINK" => "bitrix/admin/iblock_element_edit.php?WF=Y&ID=".$intID."&type=comments&lang=ru&IBLOCK_ID=12",
		);
		
		CEvent::Send("DOCTOR_COMMENT", array("dl"), $arFields, "N", "28");
		//return $intID;
		
		LocalRedirect($_SERVER["HTTP_REFERER"]);
	}
	
	/*
	 * Добавления комментария
	 */
	static public function update($intComment, $strComment, $intRecipe){
		global $USER;
		
		$rsC = CIBlockElement::GetByID($intComment);
		$arC = $rsC->Fetch();
		
		if($USER->IsAdmin() || $arC['CREATED_BY'] == $USER->GetID()){
			$arProp = Array("recipe"=>$intRecipe);
			$arLoadProductArray = Array(
				"MODIFIED_BY"    => $USER->GetID(),
				"IBLOCK_SECTION"  => false,
				"IBLOCK_ID"       => 6,
				"PROPERTY_VALUES" => $arProp,
				"NAME"            => $intRecipe.".комментарий",
				"ACTIVE"          => "Y",
				"PREVIEW_TEXT"    => $strComment,
		    );
		    
		    $elComment   = new CIBlockElement;
			if($elComment->Update($intComment, $arLoadProductArray)){
				return true;	
			} else {
				return false;
			}//if
		} else {
			return false;
		}//if
	}
	
	static public function delete($intComment){
		$bError = true;
		
		$rsC = CIBlockElement::GetByID($intComment);
		$arC = $rsC->Fetch();
		
		global $DB, $USER;
		
		$rsRecipe = CIBlockElement::GetProperty(6, $intComment, "sort", "asc", Array("CODE"=>"recipe"));
		$arRecipe = $rsRecipe->Fetch(); 
		$mixRecipe = IntVal($arRecipe["VALUE"]);
				
		if($USER->IsAdmin() || $arC['CREATED_BY'] == $USER->GetID()){
			$DB->StartTransaction();
			if(!CIBlockElement::Delete($intComment)){
				$bError = false;
				$DB->Rollback();
			}
			else{
				$DB->Commit();
				
				$rsCount = CIBlockElement::GetProperty(5, $mixRecipe, "sort", "asc", Array("CODE"=>"comment_count"));
				$arCount = $rsCount->Fetch(); 
				$mixCount = IntVal($arCount["VALUE"]);
				CIBlockElement::SetPropertyValues($mixRecipe, 5, IntVal($mixCount)-1, "comment_count");
				
				$obCache = new CPageCache;
				$obCache->Clean("main", "home");
			}
				
		} else $bError = false;
		
		return $bError;
	}
	
	/*
	 * Получения списка комментариев
	 */
	static public function getList($mixID){
		$arResult = false;
		
		$rsComment = CIBlockElement::GetList(Array("ID"=>"ASC"), 
											 Array("IBLOCK_ID"=>12, "ACTIVE"=>"Y", "PROPERTY_recipe"=>$mixID), 
											 False, 
											 False,
											 Array("ID","CREATED_BY", "PREVIEW_TEXT", "CREATED_USER_NAME", "DATE_CREATE", "PROPERTY_recipe", "PROPERTY_guest_name"));
											 
		while($arComment = $rsComment->GetNext()){
			//$strUserName = substr($arComment['CREATED_USER_NAME'], 1, strpos($arComment['CREATED_USER_NAME'], ")")-1);
			/*
			if(strpos($strUserName, "http") !== false){
				$strUserType = "OPENID";
				if(strpos($strUserName, "livejournal") !== false){
					$strAuthType = "lj";
					$strUserLink = $strUserName;
					$strUserName = substr($strUserName, 7, (strpos($strUserName, ".livejournal")-7));
				}
			} else {
				$strUserType = "INSIDE";
				$strAuthType = "fc";
				$strUserLink = "mailto:".$arComment["EMAIL"];
			}
			*/
			
			$rsUser = CUser::GetById( $arComment['CREATED_BY'] );
			$arComment['DATE_CREATE'] = substr(str_replace(" ", " в ", $arComment['DATE_CREATE']), 0, -3);
			
			//$arComment['USER'] = Array("NAME"=>$strUserName, "TYPE"=>$strUserType, "AUTH"=>$strAuthType, "LINK"=>$strUserLink);
			$arComment['USER'] = $rsUser->Fetch();
			//$arComment['USER'] = Array("NAME"=>$strUserName, "TYPE"=>$strUserType, "AUTH"=>$strAuthType, "LINK"=>$strUserLink);
			
			$arResult[ $arComment['ID'] ] = $arComment;
		}
		/*									 
		while($arComment = $rsComment->GetNext()){
			
			if(is_null($arComment['PROPERTY_ROOT_VALUE'])) $arResult['root'][] = $arComment;
			else $arResult['child'][ $arComment['PROPERTY_ROOT_VALUE'] ][ $arComment['PROPERTY_REPLY_VALUE'] ][ $arComment['ID'] ] = $arComment['ID'];
			
			$arResult['all'][ $arComment['ID'] ] = $arComment;
		}//while
					
		$arDump = Array();
		foreach($arResult['root'] as $arRoot){
			
			while(count($arResult['child'][ $arRoot['ID'] ]) > 1){
				foreach($arResult['child'][ $arRoot['ID'] ][ $arRoot['ID'] ] as $arItem){
					$arDump[] = $arItem;
					if( isset($arResult['child'][ $arRoot['ID'] ][$arItem]) ){
						$arDump = array_merge_recursive($arDump, array_values($arResult['child'][ $arRoot['ID'] ][$arItem]));
						unset($arResult['child'][ $arRoot['ID'] ][$arItem]);
					}
				}
				$arResult['child'][ $arRoot['ID'] ][$arRoot['ID']] = $arDump;
				unset($arDump);
			}
			//unset($arResult['child'][ $arRoot['ID'] ][ $arRoot['ID'] ]);
			
		}
		*/
		return $arResult;
	}
	/*
		Получение фиксированного числа последних отзывов
	*/
	static public function getLastReplies($count){
		$arResult = false;
		$arFilter = Array("ACTIVE"=>"Y", "IBLOCK_ID"=>12);
		$rsComment = CIBlockElement::GetList(Array("created" => "DESC"),
											 $arFilter,
											 false,
											 Array ("nTopCount" => $count),
											 Array("ID","CREATED_BY", "PREVIEW_TEXT", "CREATED_USER_NAME", "DATE_CREATE", "PROPERTY_recipe", "PROPERTY_root", "PROPERTY_reply", "DETAIL_PAGE_URL")
											);
		while($arComment = $rsComment->GetNext()){
			$rsUser = CUser::GetById( $arComment['CREATED_BY'] );
			$arComment['DATE_CREATE'] = substr(str_replace(" ", " в ", $arComment['DATE_CREATE']), 0, -3);
			$arComment['USER'] = $rsUser->Fetch();
			$arResult[ $arComment['ID'] ] = $arComment;
		}
		return $arResult;
	}
	
	static public function getLastRepliesNew($count){
		$arResult = false;
		$arFilter = Array("ACTIVE"=>"Y", "IBLOCK_ID"=>12);
		$rsComment = CIBlockElement::GetList(Array("created" => "DESC"),
											 $arFilter,
											 false,
											 Array ("nTopCount" => $count),
											 Array("ID","CREATED_BY", "PREVIEW_TEXT", "CREATED_USER_NAME", "DATE_CREATE", "PROPERTY_recipe", "PROPERTY_root", "PROPERTY_reply", "DETAIL_PAGE_URL")
											);
		while($arComment = $rsComment->GetNext()){
			$rsUser = CUser::GetById( $arComment['CREATED_BY'] );
			$arComment['DATE_CREATE'] = $arComment['DATE_CREATE'];
			$arComment['USER'] = $rsUser->Fetch();
			$arResult[$arComment["ID"]] = $arComment;
		}
		return $arResult;
	}
	
	
	static public function getInstance(){
		return (self::$_instance !== null) ? self::$_instance : (self::$_instance = new CFClubComment());  
	}
}
?>
