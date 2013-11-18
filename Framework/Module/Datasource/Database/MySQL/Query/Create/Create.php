<?PHP

    Extends Framework\Module\Datasource\Database\MySQL\Query
    {
        Class Create Extends \Framework\Module\Datasource\Database\MySQL\Query
        {
            Public $Database;
            Public $Table;
            Protected $Data = Array();


              Public Function __Construct()
              {

              }
              Public Function Create()
              {

                  If(IsSet($this->Data));
                  Else
                  {
                      Throw New \Exception("Data is not set.");
                  }
                  // Make sure the data is an array
                    //$Object->Created_Date   =   \SYSTEM\Library\Date\Functions::Retrieve_Time_Stamp();
                    $Field_Count   = Count($this->Data);

                    For($X=0; $X < $Field_Count;)
                    {
                        ForEach($this->Data as $Key => $Value)
                        {
                          $Field_Array[] =  \SYSTEM\Library\Security\__Interface::Clean_Data($Key);
                          $Value_Array[] =  \SYSTEM\Library\Security\__Interface::Clean_Data($Value);
                          $X++;
                        }

                    }
                    // Format fields into a string

                    $Fields     =   $this->Format_Fields($Field_Array);
                    $Values     =   $this->Format_Values($Value_Array);

                    // Generate the Query
                    $Query   =  NULL;
                    $Query   =  "INSERT INTO `{$this->Database}`.`{$this->Table}` ({$Fields}) VALUES({$Values});";
                    Try
                    {

                        If(Static::$Library->Select_Database($this->Database,$Connection));
                        Else
                        {
                            $Error = \SYSTEM\Module\Datasource\Database\MySQL::Create_Error_Object(mysql_error());
                            Throw New \Exception("Unable to select database: {$Error}");
                        }
                        // This is a create no need to define a resource
                        If(Static::$Library->Query($Query,$this->Connection))
                        {
                            $Result->ID;
                        }
                        Else
                        {
                            $Error = \SYSTEM\Module\Datasource\Database\MySQL::Create_Error_Object(mysql_error());
                            Throw New \Exception("Unable to Query: {$Error}");
                        }
                        $this->Result   =   TRUE;
                    }
                    Catch(\Exception $Exception)
                    {
                        Throw $Exception;
                    }
                    Return $this;
              }
              Public Function Retrieve_ID()
	          {
	          	Return Static::$Library->Retrieve_Insertion_ID();
	          }
              Public Function Create_EAV()
              {

              }
              Function Set_Data($Data)
              {
                  $this->Data    =   $Data;
                  Return $this;
              }
              Public Function Execute()
              {
                  $this->Create();
                  $this->Create_EAV();
                  Return $this;
              }
        }
    }

?>