<?PHP
Extends Framework\Library
{
	/** Sessuib should be split into functions / methods **/

	Class Session Extends \Framework\Module
	{
		Public Static $API;
		Public Function Is_Started()
		{
			$Session_ID =   Session_ID();
			If($Session_ID)
			{
				$Result = TRUE;
			}
			Else
			{
				$Result =   FALSE;
			}
			Return $Result;
		}
		Public Function Status()
		{
			$Session_ID =   Session_ID();
			If($Session_ID)
			{
				$Status = TRUE;
			}
			Else
			{
				$Status =   FALSE;
			}
			Return $Result;
		}
		/**
		 * @Internal Open_Session
		 */
		Public Function Start_Session()
		{
			$Session    = Session_Start();
			Return $Session;
		}
		Public Function Get_Session_ID()
		{
			$Session_ID =   Session_ID();
			Return $Session_ID;
		}
		Public Function Set_Parameter($Key,$Value)
		{
			$_SESSION[$Key] = $Value;

			Return;
		}
		Public Function Append_To_Parameter($Parameter,$Value)
		{
			// Count the current number of objects
			$Current_Count = Count($Value);
			$Pointer = $Current_Count;
			// Error Checking
			ForEach($Value as $Key => $Value)
			{
				$_SESSION[$Parameter][$Pointer][$Key] = $Value;
			}
			Return;
		}
		Public Function Close_Session()
		{
			Try
			{
				session_destroy();
			}
			Catch(\Exception $Exception)
			{
				Throw $Exception;
			}
			Return;
		}
	}
}
?>
