<?PHP

    Extends Framework\Module\Datasource\Database\MySQL\Query
    {
        Class Retrieve Extends \Framework\Core\Model
        {
            Public $Configuration = Array
            (
            	"Model"	=>	"Retrieve.mdl"
            );
            Public $Parameters	=	Array
            (
            	"Format"	=>	"XML"
            );
        	
            Protected $Model = "Data";
            
            Public $Table;
            Public $Data;
            /*
            Public Function __Construct($Operation)
            {
                $Operation  =   "Query\\{$Operation}";
                Return $Operation::API();
            }
            */
            Public Function __Construct()
            {

            }
            Public Function Set_Filters($Filters)
            {
                   $this->Filters = $Filters;
                   Return $this;
            }
			/**
			 * @TODO Move to model
			 */
            Public Function Set_Format($Format)
			{
				$this->Parameters['Format']	=	$Format;
				Return $this;
			}
            Public Function Retrieve($Connection = NULL, $Parameters = NULL)
            {
            	$Model = Static::Model();

                self::$Diagnostics->Log_Append("Retrieving");

                Try
                {

                // Accepted Objects
                // Table, Fields,Where,Limit
                // Generate The Query

                // Manual Parameters / For degradation
                If(IsSet($Parameters->Database))    $this->Database =   $Parameters->Database;
                If(IsSet($Parameters->Table))       $this->Table    =   $Parameters->Table;
                If(IsSet($Parameters->Fields))      $this->Fields   =   $Parameters->Fields;
                If(IsSet($Parameters->Filters))     $this->Filters  =   $Parameters->Filters;
                If(IsSet($Parameters->Limit))       $this->Limit    =   $Parameters->Limit;
                // Checks
                If(!IsSet($this->Connection))       Throw New \Exception($this->Connection);
                If(!IsSet($this->Database))         Throw New \Exception("Database must be set.");
                If(!IsSet($this->Table))            Throw New \Exception("Table must be set.");
                // Checks
                // If no fields are set, retrieve all of the fields
                If(!IsSet($this->Fields))
                {
                    $this->Fields[] =   "*";
                }

                // Checks
                // Format fields into a string
                $this->Fields     =   $this->Format_Fields($this->Fields);
                If(IsSet($this->Distinct))
                {
                    $this->Distinct = "Distinct {$this->Distinct},";
                }
                Else
                {
                    $this->Distinct = NULL;
                }
                If(IsSet($this->Filters))
                {
                    $Filter_String     =   $this->Format_Filters($this->Filters);
                    $this->Filters    =   "WHERE {$Filter_String}";
                }
                If(IsSet($this->Limit))
                {
                    $this->Limit = "LIMIT {$this->Limit}";
                }
                If(IsSet($this->Order_By))
                {
                    $this->Order = "ORDER BY {$this->Order_By}";
                }
                /**
                * @Internal
                * MySQL LIbrary should be transported to Module.
                */
                // Generate Query

                $Query   =  Null;
                $Query   =  "SELECT {$this->Distinct} {$this->Fields} FROM `{$this->Database}`.`{$this->Table}` {$this->Filters} {$this->Order} {$this->Limit}";
                self::$Diagnostics->Log_Append("Query: {$Query}");
                    If($Object->Result = \SYSTEM\Module\Datasource\Database\MySQL\Library::Select_Database($this->Database)->Result);
                    Else
                    {
                        $Error = \SYSTEM\Module\Datasource\Database\MySQL::Generate_Error_Object(mysql_error())->Result;
                        Throw New \Exception("Unable to select database: {$Error}");
                    }

                    /** @todo - Convert to Resource **/
                    $this->Resource    =   \SYSTEM\Module\Datasource\Database\MySQL\Library::Query($Query);

                    If($Number_Of_Records = \SYSTEM\Module\Datasource\Database\MySQL\Library::API()->Number_Of_Records($this->Resource))
                    {
                    	$this->Result	=	TRUE;
                    }
                    Else
                    {

                    }
                    self::$Diagnostics->Log_Append("Number of Records: " . (String) $Number_Of_Records ."");
                    // FIXME
                    /*
                    Switch($Number_Of_Records)
                    {
                    	Case 0:
                    	{
                    		Break;
                    	}
                    	Case 1:
                    	{
                    		$this->Data	= $this->Retrieve_Record($this->Resource,$X);
                    	}
                    	Case $Number_Of_Records > 1:
                    		{

                    		}
                    }
                    */
                     /*
                     * TODO Object Model
                     */
                    $Data = Static::$Library->Create_Object($this->Resource);
                    /*
                    If($Number_Of_Records > 0);
                    If($Number_Of_Records	== 1)
                    {
                    	$Data	=	$this->Retrieve_Record($this->Resource,$X);
                    	$this->Data->{$Data->Parameter}	=	$Data->Value;
                    }

                    ElseIf($Number_Of_Records	> 1)
                    {
                        For($X=0;$X<$Number_Of_Records;$X++)
                        {
                            // Should return an array
                            $this->Data[]   =   $this->Retrieve_Record($this->Resource,$X);
                        }
                    }
                    Else
                    {
                        $this->Result   =   FALSE;
                    }
                    */
                    If($this->EAV)
                    {
                    	$Model->{$Data->Parameter} = $Data->Value;
                    }
                    $this->Data = $Model;
                }
                Catch(\Exception $Exception)
                {
                    $this->Result = FALSE;
                    Throw $Exception;
                }
                Return $this;
            }

            Public Function Execute()
            {
                Return self::Retrieve();
            }
        }
    }

?>
