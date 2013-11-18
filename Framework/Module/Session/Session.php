<?PHP
NameSpace Framework\Module
{
	Class Session Extends \Framework\Module
	{
		Public Static $Session_ID;
		Public Static $Raw_Session;

		Public Function __Construct()
		{
		}
		Public Function Initialize()
		{
			Static::$Diagnostics->Log_Append("Initializing Session");
			Try
			{
				\SYSTEM\Library\Session::Start_Session();
				$this->Session_ID    =   self::$Session_ID = Session\Library::Get_Session_ID();
				self::$Raw_Session  =   $this->Raw_Session = $this->Retrieve_Raw_Session();
			}
			Catch(\Exception $Exception)
			{
				self::$Diagnostics->Log_Append("We were unable to initialize the Session Sub-System");
				self::$Diagnostics->Log_Append($Exception);
				Return False;
			}
			self::$Diagnostics->Log_Append("Completed Initializing Session Successfully");

			Return $this;
		}
		Public Function Retrieve_Raw_Session()
		{
			$Raw_Session   =   $_SESSION;
			Return $Raw_Session;
		}
		Public Function Set_Parameter($Parameter,$Value)
		{
			$_SESSION[$Parameter] = $Value;
			Return;
		}
		Public Function Increment_Parameter($Parameter)
		{
			$_SESSION[$Parameter]++;
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
	}
}

?>
