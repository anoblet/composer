<?PHP
Extends Framework\Module\Harvest
{
	Class __API
	{
		Public Function Harvest(\stdClass $Object)
		{
			/*
			 $Module     =   $Object->Module;
			 $Repository =   $Object->Repository;
			 $Function   =   $Object->Function;
			 */

			$Datasource =   \SYSTEM\Module\Datasource::Generate_Object('Database\MySQL');
			 
			$SubRoutine =   \SYSTEM\Library\XML::Convert_to_Object('SYSTEM/Configuration/Database.xml');
			If($SubRoutine->Result)
			{                                                                                                                                             +
			$Datasource_Configuration  = $SubRoutine->Data;
			}
			$Datasource->Connection =   $Datasource->Generate_Connection($Datasource_Configuration);
			$Parameters->Database    =   "SYSTEM";
			$Parameters->Table = "Quotes.Repositories";
			$Parameters->Fields = Array('Object_ID','Name','URL','Map');
			$Parameters->Filters = Array("Harvest" => 1);
			$Parameters->Limit = 1;

			Try
			{

				$SubRoutine =   $Datasource->Retrieve($Datasource->Connection,$Parameters);
				If($SubRoutine->Result)
				{
					$Repository_Count  =   $SubRoutine->Record_Count;
					$Repositories   =   $SubRoutine->Data;

					For($I=0;$I < $Repository_Count;$I++)
					{
						$Repository =   $Datasource->Retrieve_Record($Repositories,$I)->Data;
						// Retrieve Remote Data
						$SubRoutine =   \SYSTEM\Library\XML::Convert_to_Object($Repository->URL);
						If($SubRoutine->Result)
						{
							$Source_Object =   $SubRoutine->Data;;
						}
						$SubRoutine =   \SYSTEM\Library\Serialization\__Main::UnSerialize($Repository->Map);
						If($SubRoutine->Result)
						{
							$Abstraction_Map =   $SubRoutine->Data;;
						}
						$Target_Object   =   \SYSTEM\Module\Datasource::Abstraction_Layer($Source_Object,$Abstraction_Map);
						// Set the Target Paraemeters
						$Parameters =   NULL;
						$Parameters->Database    =   "SYSTEM";
						$Parameters->Table = "Quotes";
						// Crate Interdata Object
						$SubRoutine = $Datasource->Create($Datasource->Connection,$Parameters,$Target_Object);
						If($SubRoutine->Result  =   TRUE)
						{


						}
					}
				}
			}
			Catch (\Exception $Exception)
			{
				$Exception->Debug[] =   "Unable to harvest.";
				Throw $Exception;
			}

			Return $Result;
		}
	}
}
?>