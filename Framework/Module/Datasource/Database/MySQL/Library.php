<?PHP
Namespace Framework\Module\Datasource\Database\MySQL
{
	Class Library Extends \Framework\Module\Datasource\Database\MySQL
	{
		Public Function __Construct()
		{

		}
		Public Static Function Connect($Host,$Username,$Password)
		{
			Try
			{
				If($Connection = MySQL_Connect($Host,$Username,$Password));
				Else
				{
					Throw New \Exception("Unable to connect.");
                    }
                }
                Catch(\Exception $Exception)
                {
                    Throw $Exception;
                }  
                
                // Result (Exception/Resource)}            
                Return $Connection;
            }
            /* Protected */ Function Select_Database($Database)
            {          
                Try
                {   
                    If($Result   =   MySQL_Select_DB($Database));
                    Else
                    {
                    $Error = MySQL_Error();
                        Throw New \Exception("Unable to select databaseaaa. Error: {$Error}");
                    }
                }
                Catch(\Exception $Exception)
                {
                    Throw $Exception;                   
                } 
                Return $Result;
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
            Public Function Retrieve_Insertion_ID()
            {
            $ID =   MySQL_Insert_ID();
                Return $ID;
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
                If($this->Data =   MySQL_Num_Rows($Resource))
                {
                $this->Result   = TRUE;
                }
                Else
                {
                $this->Result   =   FALSE;
                }
                Return $this;
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
                $Object = MySQL_Fetch_Object($Resource);

                Return $Object;
            }
            /* Protected */ Function Free_Result($Resource)
            {
            $Result = mysql_free_result($Resource);
                
                Return $Result;
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