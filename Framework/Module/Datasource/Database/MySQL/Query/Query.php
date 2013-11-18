<?PHP



    Extends Framework\Module\Datasource\Database\MySQL

    {

        Class Query Extends \Framework\Module\Datasource\Database\MySQL

        {
			Protected $Model;
            Protected $Distinct; // TODO Model

        	Public $Result;

			Public $Resource; // FIXME Should be protected

            /*

            Public Function __Construct($Operation)

            {

                $Operation  =   "Query\\{$Operation}";

                Return $Operation::API();

            }

            */

            /** Setters and Getters */

            Public Function Set_Database($Database)

            {

                $this->Database =   $Database;

                Return $this;

            }

            Public Function Set_Table($Table)

            {

                $this->Table    =   $Table;

                Return $this;

            }

            Public Function Set_Distinct($Value)
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

            Public Function Set_Format($Format)
            {
            	$this->Format	=	$Format;
		Return $this;
            }

            Public Function Create_Query($Type = NULL)

            {

                If(IsSet($Type));

                Else

                {

                    Throw New \Exception("Type not set.");

                }

                If($Type)

                {

                    $Query  =   "\\" . __CLASS__ . "\\{$Type}";

                }

                Else

                {

                    $Query  =    "Query";

                }

                $Query =    $Query::API()->Generate_Object();



                Return $Query;

            }

            Public Function Add_Data(Array $Data)

            {

                $this->Data[]   =   $Data;

                Return $this;

            }

            Protected Function Set_Data($Data)

            {

                $this->Data =   $Data;

            }

            Protected Function Retrieve_Data()

            {

                Return $this->Data;

            }

            Public Function Set_Fields(Array $Fields)

            {

                $this->Fields   =   $Fields;

                Return $this;

            }

            Public Function Retrieve_ID()

            {

                Return Static::$Library->Retrieve_Insertion_ID();

            }

            /**

            * Accepts both a single or an array of fields

            */

            Public Function Format_Fields($Fields)

            {

                    If(Is_Array($Fields));

                    ElseIf(Is_String($Fields));

                    $String =   Implode(",",$Fields);

                    Return $String;

                }

            Public Function Format_Values(Array $Values)

            {

                $String =   "'".Implode("','",$Values)."'";

                Return $String;

            }

            Public Function Format_Filters(Array $Filters)

            {

                // $Number_Of_Filters = Count($Filters)

                $String  = NULL;

                $Count = Count($Filters);

                $Current_Filter = 1;

                ForEach($Filters as $Parameter => $Value)

                {

                    $String .=  "{$Parameter}='{$Value}'";

                    If($Current_Filter < $Count)

                    {

                        $String .=  " AND ";

                    }

                    Else

                    {



                    }

                    $Current_Filter++;

                }

                Return $String;

            }

            Public Function Execute()

            {                    Var_Dump($this);

                $Operation  =   $this->Operation;

                $this->Data =   $this->{$this->Operation}();

                Return $this;

            }

        }

    }



?>