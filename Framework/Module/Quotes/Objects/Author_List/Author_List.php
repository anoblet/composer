<?PHP

Extends Framework\Module\Quotes\Objects
{
	Class Author_List Extends \Framework\Module\Quotes
	{

		Public Function Generate()
		{
			$this->Data         =   $this->Retrieve_List_of_Authors();
			Return $this;
		}
		Public Function Retrieve_List_of_Authors()
		{
			/**
			 * @Internal | We can follow this same pattern
			 **/
			$Source =   'SYSTEM/Configuration/Database.xml';
			// Generate Data
			$Authors    = $this->List_Authors($Source);

			$Author_Count   = Count($Authors);

			// Inject into template

			/**
			 * @Internal
			 * Should we pull the individual records (Retrieve Record)
			 * On a Object level?
			 */
			$this->Template   =   "/SYSTEM/Module/Quotes/Objects/Author_List/Template/Author.tpl";
			$Result =   Null;
			For($I=0; $I < $Author_Count;$I++)
			{
				$this->Author   =   NULL;
				$this->Author =   $Authors[$I];
				/** @todo | Switch Author to Name in the sequence **/
				$Author_List->Title = "3";
				$this->Authors .=   \SYSTEM\Module\Template::Load_Template($this->Template/* ,"Author_List" */);
			}
			$Result =   \SYSTEM\Module\Template::Load_Template("/SYSTEM/Module/Quotes/Objects/Author_List/Template/Author_List.tpl");
			Return $Result;
		}
		Function List_Authors($Source)
		{
			/**
			 * @Internal
			 * Fix Parameter Definitions
			 */

			/* $Result =   $Datasource->Execute_Query
			 (
			 */
			$Authors = Static::$Datasource
			->Generate_Query('Retrieve')
			->Set_Database("raheimsg_SYSTEM")
			->Set_Table('Quotes')
			->Set_Operation('Retrieve')
			->Set_Fields(Array("Author_Name"))
			->Set_Distinct(TRUE)
			->Set_Order_By("Author_Name")
			->Execute()
			->Data;
			/*
			 );
			 */

			# Retrieve the Data Resource
			/* TODO Seek Sequence
			$this->Resource =   $Datasource->Resource;
			$Record_Count   =   $Datasource->Record_Count;
			For($I=0; $I < $Record_Count;$I++)
			{
				$Authors[] =   $Datasource->Retrieve_Record($this->Resource,$I);
			}
			*/
			Return $Authors;
		}
	}
}

?>
