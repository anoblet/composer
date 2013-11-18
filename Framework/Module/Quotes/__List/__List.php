<?php
Extends Framework\Module\Quotes
{
	Class __List Extends \Framework\Module\Quotes
	{

		Public $Action =   "/SYSTEM/Module/Quotes/Submit/Process.xml/";
		Static $Process_URL =   "SYSTEM/Module/Quotes/Submit/Process.xml";
		 
		Public Function __List()
		{
			Try
			{
				Print "X";
				var_Dump(debug_backtrace());
				// Retrieve Form Data

				// Retrieve the structure
				// Retrieve the applicable filters
				// Generate the query

				/**
				 $Datasource
				 ->Execute_Query
				 (
				 $Datasource->Generate_Query()
				 ->Set_Database("andy_DATA")
				 ->Set_Table("Object_Data");
				 )
				 **/

				// Output the data
				If($Quote  =   Static::$Controller->Retrieve_Request()->Retrieve_Parameter("Quote"));
				If($Author =   Static::$Controller->Retrieve_Request()->Retrieve_Parameter("Author"));
				// Validate the data
				// Should be it's own instance of a  connection
				$Datasource =   \SYSTEM\Library\XML::Convert_to_Object(Static::Datasource);
				$Datasource =   Static::$Datasource
				->Generate_Connection($Datasource);
				$Result  =   $Datasource
				->Set_Database("andy_DATA")
				->Set_Table("Object_Data")
				->Set_Operation("Retrieve")
				->Set_Filters
				(
				Array
				(
                            "Parameter"   => "Object_Type",
                            "Value" => "Quote"
                            )
                            )
                            ->Execute();
                            ForEach($Result->Result_Data as $Quotes)
                            {
                            	Var_Dump($Quotes->Object_ID);
                            }
                             
			}
			Catch(\Exception $Exception)
			{
				Throw $Exception;
			}
			Return TRUE;
		}
	}
}
?>
