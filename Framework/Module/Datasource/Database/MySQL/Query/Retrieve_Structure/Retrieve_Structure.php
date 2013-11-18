<?PHP

    Extends Framework\Module\Datasource\Database\MySQL\Query
    {
        Class Retrieve_Structure Extends \Framework\Module\Datasource\Database\MySQL\Query
        {
            Public $Table;  
            
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
            Public Function Retrieve_Structure()
            {
                $Library    =   Static::$Library;
                Static::$Library->Select_Database($this->Database);
                $Resource   =   Static::$Library->Query("Describe {$this->Table}");
                $Structure  =   Static::$Library->Fetch_Assoc($Resource);
                Return $Structure;   
            }
            
            Public Function Execute()
            {
                $Data   =   self::Retrieve_Structure();
                ForEach($Data as $Data)
                {
                    $Fields[] = $Data['Field'];
                }
                $this->Data =   $Fields;
                Return $this;
            }
        }
    }
    
?>
