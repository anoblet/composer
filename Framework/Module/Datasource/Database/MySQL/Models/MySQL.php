<?PHP
    Namespace Framework\Module\Datasource\Database\MySQL\Models
    {

        Class MySQL Extends \Framework\Module\Datasource\Database\MySQL Implements \SYSTEM\Module\Datasource\__Interface
        {
            Public $Configuration;    
            Public Static $Database;
            
            /* Protected $Query;*/
            // Based off a class instatntiattion with the connection object
            // Returns a resource connection
            Public Function Generate_Connection($Connection_Object)
            {
                If(Get_Class($Connection_Object) == "");
                If(Is_Object($Connection_Object));
                Else
                {
                    Throw New \Exception("Connection configuration must be an object.");
                }                              
                // Set Variables    
                $this->Datasource_Configuration['Host']       =     (string)$Connection_Object->Host;
                $this->Datasource_Configuration['Username']   =     (string)$Connection_Object->Authentication->User;
                $this->Datasource_Configuration['Password']   =     (string)$Connection_Object->Authentication->Password;
                // Perform the connection
                Try
                {
                    If($Result = \SYSTEM\Module\Datasource\Database\MySQL\Library::Connect($this->Datasource_Configuration['Host'],$this->Datasource_Configuration['Username'],$this->Datasource_Configuration['Password']));
                    // There was an error in the Connection    
                    Else
                    {
                        Throw New \Exception("Unable to generate a connection: {$Result}");
                    }
                    $this->Connection   =   $Result;            
                }
                // Capture the error
                Catch (\Exception $Exception)
                {
                    Throw $Exception;
                    $Result = $Exception;
                }
                Return $this;
            }
            Public Function Set_Connection($Connection)
            {
                $this->Connection   =   $Connection;
            }
            Public Function Set_Database($Database)
            {
                $this->Database =   $Database;
                return $this;
            }
            Public Function Set_Operation($Operation)
            {
                $this->Operation    =   $Operation;
                /** Call to a seperate object here? **/
                Return $this;
            }
            Public Function Set_Table($Table)
            {
                $this->Table    =   $Table;
                Return $this;
            }
            Public Function Set_Fields(Array $Fields)
            {
                $this->Fields   =   $Fields;
                Return $this;   
            }
            Public Function Generate_Fields_String($Fields)
            {
                
            }        
            Public Function Set_Filters($Filters)
            {
                   $this->Filters = $Filters;
                   Return $this;
            }
            Public Function Format_Arguments($Arguments)
            {
                For($X = 0; $X < Count($Arguments);)
                {
                    ForEach($Arguments  as $Argument => $Value)
                    {
                        $Arguments_String  .=   "`{$Arguments}` = {$Value}";
                        If($X !== Count($Arguments)-1)
                        {
                            $Arguments_String .= ", ";
                        }
                        $X++;
                    }
                }
                Return $Argument_String;
            }
            Public Function Set_Data($Data)
            {
                $this->Data =   $Data;
                Return $this;
            }
            Public FUnction Set_Distinct($Value)
            {
                $this->Distinct =   $Value;
                Return $this;
            }
            Public Function Set_Limit($Limit)
            {
                $this->Limit    =   $Limit;
                Return $this;
            }
            Public Function Set_Order_By($Order_By)
            {
                $this->Order_By =   $Order_By;
                Return $this;
            }
            Public Function Add_Attributes(Array $Attributes)
            {
                Return $this;
            }
            /** Query **/

            Public Function Execute_Query($Query)
            {
                self::$Diagnostics->Log_Append("Executing Query...");                
                Switch($this->Operation)
                {
                    Case "Retrieve":
                    {
                        $this->Retrieve();
                    }
                    Case "Retrieve_Fields":
                    {
                        $this->Retrieve_Fields();
                    }
                } 
                Return $this;
            }
            /** Query **/

            /** More of on a EAV Scale **/

            /** EAV **/

            Public Function Generate_Request()
            {
                Return MySQL\Query::API();
            }
            /**
            * Create
            *   Array
            *   Object
            */

            Public Function Retrieve_Single($Connection = NULL, $Parameters = NULL)
            {                      
                self::$Diagnostics->Log_Append("Retrieving Single..");  
                    
                Try
                { 
                    $this->Retrieve();
                    $this->Result   =   $this->Retrieve_Record($this->Resource,0);
                }
                Catch(\Exception $Exception)
                {                                
                   self::$Diagnostics->Log_Append("Unable to retrieve single record.");  
                }
 
                Return $this;
            }
            Public Function Retrieve_Record($Resource,$Row)
            {
                Try
                {
                    If(!Is_Resource($Resource)) Throw New \Exception("Unable to retrive record, resource is invalid.");
                    $Pointer   =   \SYSTEM\Module\Datasource\Database\MySQL\Library::Data_Seek($Resource,$Row);
                    $Result =   \SYSTEM\Module\Datasource\Database\MySQL\Library::Create_Object($Resource);
                }
                Catch(\Exception $Exception)
                {
                    Throw New \Exception($Exception);
                }
                Return $Result; 
            }
            Public Function Modify()
            {
                
            }
            Public Function Delete()
            {
                
            }
            Public Function Retrieve_Table_Structure()
            {
                MySQL\Library\Functions::Select_Database($this->Database);
                $Resource = MySQL\Library\Functions::Query("Describe {$this->Table}");
                $Structure = MySQL\Library\Functions::Fetch_Assoc($Resource);
                Return $Structure;   
            }
            Protected Function Retrieve_Fields()
            {
                $Data   =   self::Retrieve_Table_Structure();
                ForEach($Data as $Data)
                {
                    $Fields[] = $Data['Field'];
                }
                $this->Data =   $Fields;
                Return $this;
            }
            Public Function Generate_Error_Object($Error)
            {
                $Object->Result =   $Error;
                Return $Object;
            }
            Public FUnction __Destruct()
            {
                static::$Diagnostics->Log_Append("Destructing MySQL object.");
                Return;
            }
        }
    }
?>
