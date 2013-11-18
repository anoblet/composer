<?php
Extends Framework\Module\Quotes\Objects
{
	Class Submit Extends \Framework\Module\Quotes
	{
		Public $Author;
		Public $Date;
		Public $Quote;
		Public $Location;

		Public Function Set_Author($Author)
		{
			$this->Author   =   $Author;
			Return $this;
		}
		Public Function Set_Date($Author)
		{
			$this->Date   =   $Date;
			Return $this;
		}
		Public Function Set_Quote($Quote)
		{
			$this->Quote   =   $Quote;
			Return $this;
		}
		Public Function Set_Location($Location)
		{
			$this->Date   =   $Date;
			Return $this;
		}
		Public Function Set_Attribute($Attribute,$Value)
		{
			// Label attribute name
			$this->Attributes[][$Attribute] = $Value;
			Return $this;
		}
		Public Function Generate_Form()
		{
			$Forms  =   Array();
			$Form->Name =   "Submit_a_Quote";
			// Instantiate the object
			$Datasource =   \SYSTEM\Module\Datasource::API()->Generate_Connection(SYSTEM_DEFAULT_DATASOURCE);
			// Database Configuration
			Try
			{
				$this->Datasource   =   $Datasource
				->Generate_Query()
				->Set_Database("andy_SYSTEM")
				->Set_Table('Quotes_Attributes')
				->Set_Operation('Retrieve')
				->Set_Fields(Array("*"))
				->Retrieve();
				Var_Dump(mysql_fetch_object($this->Datasource->Resource));
				// Retrieve the list of attributes
				// Initiate the forms module
				$this->Form   = \SYSTEM\Module\Form\Form::API();

				// Create a form from the attributes
				For($X=0;$X<$this->Datasource->Record_Count;$X++) //
				{

					// Create the fields
					$Form->Fields[] =
					(
					$this->Datasource->Retrieve_Record
					(
					$this->Datasource->Resource,$X
					)
					);

					$Form->Submit   =   $this->Generate_Submit_Object();
				}
				$Forms[]    =   $Form;
				$this->Form->Forms  =   $Forms;
				$Result =   $this->Form->Generate_Forms($Forms);
			}
			Catch(\xception $Exception)
			{
				Throw $Exception;
			}
			Return $Result;
		}
		Public Function Map_Fields($Object) // Mapping Function
		{
			$Field->ID      =   $Object->Object_ID;
			$Field->Name    =   $Object->Name;
			$Field->Label   =   $Object->Label;
			Return $Field;
		}

		Public Function Generate_Submit_Object()
		{
			$Object->Label      =   "Submit Quote";
			$Object->OnClick    =   "";
			Return $Object;
		}

		Public Function Submit()
		{

			Return;
		}
	}
}
?>
