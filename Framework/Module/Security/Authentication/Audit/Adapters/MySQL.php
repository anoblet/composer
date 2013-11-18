<?PHP
    Extends Framework\Module\Security\Authentication\Audit\Adapters
    {
        
        Class MySQL  Extends \Framework\Module\Security\Authentication  Implements \SYSTEM\Security\Authentication\__Interface
        {

            Public $Result;
            Public Function Authenticate($Username,$Password)
            {
                Try
                {
                    $Login_Result  =   \SYSTEM\SYSTEM::$Datasource
                    ->Generate_Query("Retrieve")
                        ->Set_Database('andy_SYSTEM')
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
                                'Username' => $Username,
                                'Password' => $Password      
                            )
                        )
                        ->Set_Limit(1)
                    ->Execute(); 
                          
                    If($Login_Result->Result)
                    {
                        self::$Diagnostics->Log_Append("Authentication was successfull");
                        $this->Result    =    TRUE;
                    }
                    
                    Else
                    {
                        self::$Diagnostics->Log_Append("Username: {$Username} and Passwowrd: {$Password} combination not found.");
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
                
                Return TRUE;
            }
            
        }
    }
?>