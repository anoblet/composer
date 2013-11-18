<?PHP

Extends Framework
{
	Class Configuration Extends SYSTEM
	{
		Protected $Display_Mode;

		Protected Function __Construct($Configuration)
		{
			Return parent::__Construct($Configuration	);
		}
		
		Public /** Protected **/ Function Initialize()
		{
			// $this->Display_Mode =   $this->Retrieve_Display_Mode();
			Return;
		}

		Protected Function Retrieve_Display_Mode()
		{
			$Parameters =
			Array
			(
                        'Object'    =>   $this->Object,
                        'Parameter' =>   $this->Parameter   
			)
			;
			$Result =   $this->Retrieve_System_Configuration($Parameters);

			Return $Display_Mode;
		}
		// Allows for module usage
		Public Function Set_Context($context)
		{
			$this->Context  =   $Context;
			Return $this;
		}

		// Finalized
		Protected Function Retrieve_System_Configuration($Parameters)
		{
			$Configuration  =   \SYSTEM\SYSTEM::$SYSTEM_Datasource
			->Generate_Query()
			->Set_Context('Configuration')
			->Set_Operation('Retrieve')
			->Set_Requested_Fields('Value')
			->Set_Filters
			(
			Array
			(
                            'Parameter' => $Parameter      
			)
			)
			->Result;
			;
			Return $Configuration;
		}
		Public Function Retrieve_Configuration($Parameter)
		{
			static::$Diagnostics->Log_Append(Array("Retrieving Configuration: " => $Parameter));
			$Datasource  =	Static::Datasource($Configuration->Datasource);
			
			\SYSTEM\SYSTEM::$SYSTEM->Datasource
			->Generate_Query()
			->Set_Table('Configuration')
			->Set_Operation('Retrieve')
			->Set_Fields
			(
				Array
				(
	            	'Value'
	            )
            )
            ->Set_Filters
            (
            	Array
                (
                	'Parameter' => $Parameter      
                )
            )
            ->Execute_Query()
            ->Result;
                            Return $Configuration;
		}

		Public Function Retrieve_Configuration_Deprecated($Context,$Parameter)
		{
			Try
			{
				/** @todo | Should we be returning everything (Key + Value) **/
				// Instantiate the datasource type
				$Datasource =   \SYSTEM\Module\Datasource::API();
				$Datasource
				->Set_Type("Database\\Mysql")
				//->Set_Configuration()
				->Generate_Object()
				;
				// Load the configuration
				$Datasource->Configuration =   \SYSTEM\Library\XML::Convert_to_Object(SYSTEM_DIRECTORY . '/Configuration/Database.xml');
				// Generate the connection
				$Datasource->Connection =   $Datasource->Generate_Connection($Datasource->Configuration);
				// Generate the Query
				$Parameters->Database    =   $Datasource->Configuration->Database;
				$Parameters->Table = $Context;
				$Parameters->Fields = Array('Value');
				$Parameters->Filters = Array("Parameter" => $Parameter);
				// Retrive the configuration data
				$Configuration = \SYSTEM\Module\Datasource\Database\MySQL\__API::Retrieve_Single($Datasource->Connection,$Parameters);
			}
			// Throw an error if there is one;
			Catch(\Exception $Exception)
			{
				Throw $Exception;
			}
			// For right now, only throw the value back
			$Result =   $Configuration->Value;
			// Return
			Return $Result;
		}
	}
}

?>