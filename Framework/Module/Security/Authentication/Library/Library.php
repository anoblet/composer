<?PHP
Extends Framework\Module\Security\Authnetication
{
	Class Library Extends \Framework\Module\Security\Authentication
	{

		Public Static $Authentication_Status;


		Public Function Authentication_Status()
		{
			$Authentication_Status  =   $_SESSION['Authentication_Status'];
			Try
			{
				// Check the authentication status
				If(IsSet($Authentication_Status))
				{
					self::$Diagnostics->Log_Append("Authentication Status has been set. {$_SESSION['Authentication-Status']}");
					// Double Check that authentication status can only evaluate as true or false, if so keep it
					If($Authenticatio_Status   =   TRUE || FALSE);
					// There is an invalid authentication status, reset it
					Else
					{
						self::$Diagnostics->Log_Append("WARNING: Invalid Authentication Status");
						$this->Update_Authentication_Status(FALSE);
					}
				}
				// Set the default Authentication status
				Else
				{
					self::$Diagnostics->Log_Append("No Authentication status has been set, defaulting");
					$this->Update_Authentication_Status(FALSE);

				}
			}
			Catch(\Exception $Exception)
			{

			}

			Return $Authentication_Status;
		}
		Public Function Update_Authentication_Status($Status)
		{
			self::$Diagnostics->Log_Append("Updating authentication status to:");
			\SYSTEM\Module\Session::Set_Parameter('Authentication_Status',$Status);
			Return;
		}
		Public Function __Construct()
		{
			Return;
		}
		Public Function Initialize()
		{

			self::$Diagnostics->Log_Append("Initializing .");
			Try
			{
				self::$Diagnostics->Log_Append("Retrieving Authentication Status");
				self::$Authentication_Status = $this->Authentication_Status = $this->Authentication_Status();
				self::$Diagnostics->Log_Append("Authentication Status: {$this->Authentication_Status}");
				If($this->Authentication_Status);
				Else
				{
					/**
					 * @todo
					 * Why don't we automatically authenticate via Anonymous in the authenticate function instead of here.'
					 */
					self::$Diagnostics->Log_Append("We are not authenticated.");
					/** @Todo | Should we be using booleans or integers **/
					If(!\SYSTEM\Module\Configuration::Retrieve_Configuration('Allow_Anonymous_Login') == 'True')
					{
					}
					Else
					{
						self::$Diagnostics->Log_Append("Anonymous Authentication is not allowed.");
						If($_SERVER['REQUEST_URI']  ==   "/SYSTEM/Module/Security/Authentication/Login/Generate_Form")
						{
						}
						Else
						{
							$this->Authenticate();
						}
						self::$Diagnostics->Log_Append("Redirecting to Login");

					}
				}
				// $Authentication->Result = TRUE;
			}
			Catch(\Exception $Exception)
			{
				$Exception->Details    =    $this;
				Throw $Exception;
			}
			Return $this;
		}
		Public Function Retrieve_Model()
		{
			Return Authentication\Models\Authentication::API()->Generate_Object();
		}
		Public Function Login()
		{

			Return;
		}
		Public Function Logout()
		{
			$Result = \SYSTEM\Library\Session::Close_Session();
			Return $Result;
		}
		Public Function Authenticate()
		{
			If($_SERVER['REQUEST_URI']  ==   "/SYSTEM/Module/Security/Authentication/Login/Generate_Form")
			{
			}
			Else
			{
				If(!\SYSTEM\Module\Configuration::Retrieve_Configuration('Allow_Anonymous_Login') == 'True')
				{

				}
				Else
				{
					self::$Diagnostics->Log_Append("Anonymous Authentication is not allowed.");
					If($_SERVER['REQUEST_URI']  ==   "/SYSTEM/Module/Security/Authentication/Login/Generate_Form")
					{
					}
					Else
					{
						$this->Authenticate();
					}
					self::$Diagnostics->Log_Append("Redirecting to Login");
				}
				self::$Diagnostics->Log_Append("Redirecting to Login");
				$Result =   \SYSTEM\Module\Navigation::API()->Redirect("http://www.thefreeintellectual.com/SYSTEM/Module/Security/Authentication/Login/Generate_Form",0);
				Print $Result;
			}
			//\SYSTEM\Module\Controller::$User_Interface = "/SYSTEM/Module/Security/Authentication/Audit/Login/User_Interface/Login.xml";
			Return $Result;
		}


	}
}

?>
