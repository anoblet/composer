<?PHP

Namespace Framework\Module
{
	Class Configuration Extends \Framework\Module
	{
		Const Configuration = "Configuration.xml";
		Protected $Model = "Models\Configuration";
		Protected $Display_Mode;
		Protected $Value; // FIXME Stray away from static table representors / eav
		
		/*
		Public Function Initialize()
		{
			// $this->Display_Mode =   $this->Retrieve_Display_Mode();
			Return;
		}
		*/

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
		Public Function Load_XML($XML)
		{
			Return $this->Configuration = XML::Load_XML($XML);
		}
		
		Function Load_Configuration($Configuration)
		{
			$this::$Diagnostics->Log_Append("Loading configuration: {$Configuration}");
			$Configuration = XML::Load_XML($Configuration);
			$this::$Diagnostics->Log_Append("Configuration loaded successfully.");
			Return $Configuration;
		}
		
		// Finalized
		
		Protected Function Retrieve_System_Configuration($Parameters)
		{
			$Configuration  =   \SYSTEM\SYSTEM::$SYSTEM_Datasource
			->Generate_Query()
			->Set_Table('Configuration')
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
			self::$Diagnostics->Log_Append("Retrieving Configuration Parameter: {$Parameter}");
			Try
			{
				$Datasource  =	Static::Datasource($this->Configuration->Datasource);Die();
				/*
				$Datasource  =   Static::$Datasource->Generate_Datasource
				(
					
				)
				->Generate_Query
				(
					Static::$C
				)
				->Set_Parameter("EAV",TRUE)	
				->Set_Database("raheimsg_SYSTEM")
				->Set_Table('Configuration')
				->Set_Operation('Retrieve')
				->Set_Fields
				(
				Array
				(
                	'Parameter','Value'
                )
                                )
                                ->Set_Filters
                                (
	                                Array
	                                (
	                                'Parameter' => $Parameter
	                                )
                                )
                                ->Execute();// Object Version
                                 ;
                                 
			$Model = Configuration::API()->Model($Datasource->Data);		
                                	// XML Version
                                	 // Array 0 Iteration of values within array without array of items?  Fix me, should be on the datasource end. Array type also  
            
            Var_Dump($Model);
			}                	 
			Catch(\Exception $Exception)
			{
				Static::$Diagnostics->Log_Append("");
				Return $Exception;
			}
			self::$Diagnostics->Log_Append("Configuration Parameter: {$Parameter} = {$Configuration_Value}");

			Return $Configuration;
		}
		
		Public Function Retrieve_Configuration_Deprecated($Context,$Parameter)
		{
			Try
			{
				/** @todo | Should we be returning everything (Key + Value) **/
				// Instantiate the datasource type
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
		Public Function Generate_XML()
		{
			Return \SYSTEM\Module\XML::Generate_XML($this->Data);
		}
	}
}

?>
