<?PHP
Extends Framework\Module\People
{

	Class Create Extends \Framework\Module\People
	{
		Const TEMPLATE = "Create.tpl";

		Public Function __Construct()
		{
			Static::$Datasource =   Static::$Datasource
			->Generate_Object()
			->Generate_Connection_XML_File(Static::$Datasource_XML);
			Return;
		}
		Public Function Generate_Form()
		{
			// Retrieve Model Structure
			/** V1 **/
			/* $Fields = $Datasource
			 ->Execute_Query
			 (     */
			// Todo format fields as attributes
			$Fields =   $this->Attributes;
			/* );*/

			/** V2 **/

			/*
			 $Fields = $Datasource
			 ->Generate_Query("Retrieve_Structure")
			 ->Set_Database('andy_DATA')
			 ->Set_Table('People')
			 ->Execute();
			 */
			$Form   =   \SYSTEM\Module\Form::API()
			->Create_Form_Object()
			->Set_Action('/SYSTEM/Module/People/Create/Process.xml/');
			ForEach($Fields as $Field)
			{
				$Form->Add_Element
				(
				\SYSTEM\Module\Form\Element::API()
				->Create_Element('Text')
				->Set_Label($Field)
				->Set_Name($Field)
				);
			}
			$Form->Add_Element
			(
			\SYSTEM\Module\Form\Element::API()
			->Create_Element('Button')
			->Set_Label("Create")
			);

			$Form   =   $Form->Generate_XHTML();

			/*
			 ->Add_Field
			 (
			 $Form->Generate_Field()
			 ->Set_Type('')
			 );
			 */

			// Retrieve EAV Attributes

			// Generate Form header

			$this->Data	=	$Form;
			Return $this;
		}
		Public Function Retrieve_Fields()
		{
			$Fields =   Static::$Datasource
			->Generate_Query("Retrieve_Structure")
			->Set_Database('raheimsg_DATA')
			->Set_Table('People')
			->Execute()
			->Data;
			Return $Fields;
		}
		Public Function Process()
		{
			$Form_ID;
			$Fields =   $this->Retrieve_Fields();

			ForEach($Fields as $Field)
			{
				$Data[$Field]   =   \SYSTEM\Module\Controller\Request::API()->Retrieve_Parameter($Field);
			}
			// Generate the Quote Object
			$Person_ID  =   Static::$Datasource->Generate_Data_Object()->Retrieve_ID();
			Static::$Diagnostics->Log_Append("Person ID: {$Person_ID}");
			// Set the Object Type
			$Resource =   Static::$Datasource
			->Generate_Query("Create")
			->Set_Database('raheimsg_DATA')
			->Set_Table('People')
			->Set_Data($Data)
			->Execute();
			If($Resource->Result)
			{
				$Result =   \SYSTEM\Module\Template::Load_Template_Relative("Template/Success.tpl");
			}
			Else
			{
				$Result =   \SYSTEM\Module\Template::Load_Template_Relative("Template/Failure.tpl");
			}
			Return $Result;
		}
	}
}
?>