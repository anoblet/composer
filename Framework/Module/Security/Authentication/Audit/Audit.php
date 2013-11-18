<?PHP
Extends Framework\Module\Security\Authentication
{
	/**
	 * @internal This seems like an instruction object.
	 * Should it be seperate from other types of objects
	 * (Ones which don't define Public/External parameters)?
	 */
	Class Audit
	{
		Public Function Process($Object)
		{
			$Username = $Object->Username;
			$Password = $Object->Password;
			static::$Diagnostics->Log_Append("Processing Login.");

			Try
			{
				/**
				 * @todo Create abstract authentication mechanism.
				 */
				$this->Authentication   =   \SYSTEM\Module\Security\Authentication\Audit\Adapters\MySQL::API();
				$this->Authentication->Authenticate($Username,$Password);
				If($this->Authentication->Result)
				{
					static::$Diagnostics->Log_Append("Authentication Successfull.");
				}
				Else
				{
					$this->Debug[] = "We were unable to authenticate.";
					\SYSTEM\Module\Session::Increment_Parameter('Authentication_Attempts');
					Throw New \Exception ("Unable to authenticate via MySQL");
				}
				\SYSTEM\Module\Security\Authentication::Update_Authentication_Status(TRUE);
			}
			Catch(\Exception $Exception)
			{
				Var_Dump($Exception);
				Var_Dump($this);
			}

			Return $this;
		}
		Public Function Authenticate($Username,$Password)
		{
			// Create the Datasource Object
			$Datasource =   \SYSTEM\Module\Datasource::Generate_Object('Database\MySQL');
			$SubRoutine =   \SYSTEM\Library\XML::Convert_to_Object(BASE_DIRECTORY . '/SYSTEM/Module/Quotes/Repositories/localhost.localdomain.xml');
			If($SubRoutine->Result)
			{                                                                                                                                             +
			$Datasource->Configuration  = $SubRoutine->Data;
			}
			// Generate the connection
			$Datasource->Connection =   $Datasource->Generate_Connection($Datasource->Configuration);
			// Generate the Query
			$Parameters->Database    =   "SYSTEM";
			$Parameters->Table = "Users";
			$Parameters->Fields = Array('Object_ID');
			$Parameters->Filters = Array("Username" => $Username,"Password" => $Password);
			$Parameters->Limit = 1;
			// $Query = "SELECT ID FROM `USERS`.`SYSTEM` WHERE `User_Handle`={$User_Handle} AND User_Password={$User_Password}";

			// Retrieve the result //
			Try
			{

				$SubRoutine = \SYSTEM\Module\Datasource\Database\MySQL\__API::Retrieve($Datasource->Connection,$Parameters);
				If($SubRoutine->Result)
				{
					$this->Result    =    TRUE;
				}

				Else
				{
					$this->Result    =    FALSE;
					$this->Debug     =    "Username: {$Username} and Passwowrd: {$Password} combination not found.";
					Throw New \Exception;
				}
			}
			Catch (\Exception $Exception)
			{
				$Object->Result =   FALSE;
				$Object->Exception =   $Exception;
			}
			// Retrieve The Result //

			Return TRUE;
		}
	}
}

?>
