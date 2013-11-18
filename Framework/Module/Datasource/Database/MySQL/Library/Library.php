<?PHP
    Extends Framework\Module\Datasource\Database\MySQL
    {

        Class Library Extends \Framework\Module\Datasource\Database\MySQL
        {
            Protected Function __Construct()
            {
            }
            /* Protected */ Function Connect($Host,$Username,$Password)
            {
                $Connection = NULL;
                Try
                {
                    If($Connection = \mysql_connect($Host,$Username,$Password))
                    {
                        $Object->Data =   $Connection;
                    }
                    Else
                    {
                        Throw New \Exception;
                    }
                }
                Catch(\Exception $Exception)
                {
                    $Object->Exception  =   $Exception;
                    $Object->Debug      =   "Unable to Cconnect.";
                    $Object->Result =   FALSE;
                }

                // Result (Exception/Resource)}
                Return $Object->Data;
            }
            /* Protected */ Function Select_Database($Database)
            {
                Try
                {
                    If($Object->Result   =   mysql_select_db($Database));
                    Else
                    {
                        $Error = mysql_error();
                        Throw New \Exception("Unable to select databaseaaa. Error: {$Error}");
                    }
                }
                Catch(\Exception $Exception)
                {
                    $Object->Result   =   $Error;
                }

                Return $Object;
            }
            /* Protected */ Function Query($Query, $Connection = NULL)
            {
                Try
                {
                    If(IsSet($Connection))
                    {
                        If($Result = mysql_query($Query, $Connection));
                        Else
                        {
                            $Error = mysql_error();
                            Throw New \Exception("Unable to Query. Query: {$Query} Error: {$Error}");
                        }
                    }
                    Else
                    {
                        If($Result = mysql_query($Query));
                        Else
                        {
                            $Error = mysql_error();
                            Throw New \Exception("Unable to Query. Query: {$Query} Error: {$Error}");
                        }
                    }
                }
                Catch(\Exception $Exception)
                {
                    Throw $Exception;
                }
                Return $Result;
            }
            Public Function Data_Seek($Resource,$Row)
            {
                Try
                {
                    If(!$Result =   mysql_data_seek($Resource,$Row)) Throw New \Exception("Unable to change the pointer. Resource: {$Resource}. Row: {$Row}.");
                }
                Catch(\Exception $Exception)
                {
                    Throw $Exception;
                }
                Return $Result;
            }
            Public Function Number_of_Records($Resource)
            {
              Try
		      {
			    If(Is_Resource($Resource));
			    Else
			    {
				    Throw New \Exception("Invalid Resource");
			    }
			    If($Number_Of_Records =   MySQL_Num_Rows($Resource));
		        Else
		        {
			        // $Result	=	FALSE
		        }
                Return $Number_Of_Records;
		}
		Catch(\Exception $Exception)
		{
			Throw $Exception;
		}

            }
            Public Function Fetch_Assoc($Resource)
            {
                // While($Array = MySQL_Fetch_Assoc($Resource))
                While($Pointer = MySQL_Fetch_Assoc($Resource))
                {
                    $Array[]    =   $Pointer;
                }
                Return $Array;
            }

            Public Function Create_Object($Resource)
            {
                // While($Array = MySQL_Fetch_Assoc($Resource))
                $Object = MySQL_Fetch_Object($Resource /*,$this->Class . "\Data\Models\XML"*/);
                Return $Object;
            }
            /* Protected */ Function Free_Result($Resource)
            {
                $Result = mysql_free_result($Resource);

                Return $Result;
            }
            Public Function Retrieve_Insertion_ID()
            {
            	Return MySQL_Insert_ID();
            }
            Protected Function Disconnect($Connection)
            {
                $Result = NULL;
                $Result = mysql_disconnect($Connection);

                Return $Result;
            }
        }
    }
?>
