<?PHP
Extends Framework\Module\User
{

	Class Register Extends \Framework\Module\User // Move to entity create
	{
		Const TEMPLATE = "Create.tpl";

		Protected Function __Construct()
		{
			$this->Model	=	$this->Generate_Model("Models/User.mdl");

		}
		Public Function Generate_Form()
		{
			// Retrieve Model Structure
			/** V1 **/
			/* $Fields = $Datasource
			 ->Execute_Query
			 (     */
			// Todo format fields as attributes
			$Fields =   $this->Model->Retrieve_Property("Attributes");
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
			->Set_Action('/User/Register/Process');
			ForEach($Fields as $Field)
			{
				$Form->Add_Element
				(
					\SYSTEM\Module\Form\Element::API()
						->Create_Element('Text')
							->Set_Label($Field->Label)
							->Set_Name($Field->Name)
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
		Public Function Process()
		{
			$Form_ID;
			// $Fields =   $this->Retrieve_Fields();
			$Fields	=	$this->Model->Retrieve_Property("Attributes");
			ForEach($Fields as $Field)
			{
				$Data[$Field->Name]   =   \SYSTEM\Module\Controller\Request::API()->Retrieve_Parameter($Field->Name);
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