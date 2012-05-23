<?
AddEventHandler("main", "OnAfterUserLogin", Array("MyClass", "OnAfterUserLoginHandler"));

class MyClass
{
    // создаем обработчик события "OnAfterUserLogin"
    function OnAfterUserLoginHandler(&$fields)
    {
        // если логин успешен то
        if($fields['USER_ID'] >= 0)
        {
			// ищем пользователя по логину
			$rsUser = CUser::GetByLogin($fields['LOGIN']);
			// и если нашли, то
			if ($arUser = $rsUser->Fetch())
			{
				// Если пользователь находится в группе докторов - перенаправляем
				if (array_search(5, CUser::GetUserGroup($arUser["ID"])) !== false) {
				
					//$_SESSION["DOCTOR_AUTH_SHOW"] = 1;
				
					//LocalRedirect("/doctors/s_chego_nachat/");
				}
			}
        }
    }
}