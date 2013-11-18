<?PHP
Extends Framework\Module\Security\Authentication\Adapters
{

	Class MySQL  Extends \Framework\Module\Security\Authentication  Implements \SYSTEM\Module\Security\Authentication\__Interface
	{

		Public $Result;
		Public Function Authenticate()
		{
			Try
			{
				$Login_Result  =   Static::$Datasource
				->Generate_Query("Retrieve")
				->Set_Database('raheimsg_SYSTEM')
				->Set_Table('Users')
				->Set_Operation('Retrieve')
				->Set_Fields
				(
				Array
				(
                                'Object_ID'
                                )
                                )
                                ->Set_Filters
                                (
                                Array
                                (
                                'Username' => $this->Username,
                                'Password' => $this->Password
                                )
                                )
                                ->Set_Limit(1)
                                ->Execute()
                                ->Result;

                                If($Login_Result)
                                {
                                	self::$Diagnostics->Log_Append("Authentication was successfull");
                                	$this->Result    =    TRUE;
                                }

                                Else
                                {
                                	self::$Diagnostics->Log_Append("Username: {$this->Username} and Password: {$this->Password} combination not found.");
                                	$this->Result    =    FALSE;
                                	Throw New \Exception("Incorrect username and password.");
                    }

                }
                Catch (\Exception $Exception)
                {
                $Object->Result =   FALSE;
                    Throw($Exception);
                }
                // Retrieve The Result //

                Return $this;
            }

        }
    }
?>