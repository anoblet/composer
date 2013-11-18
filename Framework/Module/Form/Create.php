<?PHP
Extends Framework\Module\People
{

	Class Create Extends \Framework\Module\People
	{
		Private $Form = "Create.tpl";

		Public Function Generate_Form()
		{
			// Retrieve Model Structure
			$Datasource = Static::$Datasource->Generate_Connection_XML_File(Static::$Datasource_XML);
			$Fields = $Datasource
			->Execute
			(
			$Datasource
			->Generate_Query()
			->Set_Database('andy_DATA')
			->Set_Table('People')
			->Set_Operation('Retrieve_Fields')
			)->Data;
			$Form   =   \SYSTEM\Module\Form::API()
			->Create_Form()
			->Set_Action('/SYSTEM/Module/People/Create/Process.xml/')
			->Generate();
			/*
			 ->Add_Field
			 (
			 $Form->Generate_Field()
			 ->Set_Type('')
			 );
			 */
			Var_Dump($Fields);
			Var_Dump($Form);
			Die;
			$Data = "<Form>";

			$Data .= "<Button OnClick=\"this.form.submit()\"";
			$Data .= "</Form>";

			$Form = $Data;


			// Retrieve EAV Attributes

			// Generate Form header


			Return $Form;
		}

		Protected Function Process()
		{
			Return;
		}
	}
}
?>