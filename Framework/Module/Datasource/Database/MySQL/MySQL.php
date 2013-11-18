<?PHP
Namespace Framework\Module\Datasource\Database
{

	Class MySQL Extends \Framework\Module\Datasource\Database Implements \SYSTEM\Module\Datasource\__Interface
	{
		Public $Class = "SYSTEM\Module\Datasource\Database\MySQL";
		Protected $Model;
		Protected Static $Library;
		Protected $Connection;
		Protected $Data;
		/* Protected $Query;*/
		Protected Function __Construct($Configuration = NULL)
		{
			If(IsSet($Configuration))
			{
				$this->Configuration = $Configuration;
				Try
				{
					$this->Generate_Connection();
				}
				Catch (\Exception $Exception)
				{
					Throw $Exception;
				}
				Var_Dump(debug_print_backtrace());
			}
			$this->Generate_Connection($Configuration);
		}
		/*
		 Public Function Generate_Object()
		 {
		 Return MySQL\Models\MySQL::API();
		 }
		 */
		Protected Function Format()
		{
			
		}
		Protected Function Generate_XML()
		{
			Switch($this->Parameters['Format'])
			{
				Default:
				{

				}
				Case "XML":
				{

					ForEach($this->Data as $Key => $Value)
					{
						
					}
					
					$this->Data	= MySQL\Data\Format\XML::API()->Generate_XML
					(
						Array
						(
							"Data" => $this->Data
						)
					);
				}
			}
			Return $this;
		}
		Protected Function Generate_Connection($Configuration = NULL)
		{
			Try
			{
				If(\Framework\Module\XML::Is_XML($Configuration));
				If($Host = (string) $Configuration->Host);
				If($Username = (string) $Configuration->User);
				If($Password = (string) $Configuration->Password);
				$this->Connection = MySQL\Library::Connect($Host, $Username, $Password);
			}
			Catch (\Exception $Exception)
			{
				Throw $Exception;
			}
		}
		/*
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
                    {Var_Dump($Connection_Object);
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
                Return MySQL\Models\MySQL::API()->Generate_Object()->Generate_Connection($Connection_Object);
            }
            */
            Public Function Generate_Connection_XML_File($XML_File)
            {
                Return self::Generate_Connection(\SYSTEM\Library\XML::Convert_to_Object($XML_File));
            }
            Public Function Set_Connection($Connection)
            {
            $this->Connection   =   $Connection;
            }
            Public Function Generate_Query($Type=NULL)
            {
                If(IsSet($Type));
                Else
                {
                    Throw New \Exception("Type not set.");
                }
                $Query  =   MySQL\Query::API()->Create_Query($Type);

                $Query->Set_Connection($this->Connection);
                Return $Query;
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
            /**
            * Registers an object
            *
            */
            Public Function Generate_Data_Object()
            {
            $Resource   =   $this->Generate_Query("Create")
                                ->Set_Database("raheimsg_DATA")
                                ->Set_Table('Objects')
                                ->Set_Data(Array('ID' => NULL))
                                //->Set_Operation("Create")
                                ->Execute();
                /* $Object         =  \SYSTEM\Module\Data::API()
                                    ->Generate_Data_Model()
                                    ->Set_Object_ID(); */
                Return $Resource;
            }

        }
    }
?>
