<?PHP
Extends Framework\Module\News
{
	Class __Interface
	{
		Public Function Form_Create_News_Item($Object=NULL)
		{
			// API ALlowed Attributes
			/*
			 //
			 */
			$Attributes = array
			(
                    "ID" => NULL
			);

			$Fields[] = array
			(
                    "ID"                =>  NULL,
                    "Type"              =>  'Text',
                    "Label"             =>  "Title",
                    "Label_Attributes"  =>  array
			(

			),
                    "Name"      => "Name"      
                    );
                     
                    $Form = \SYSTEM\Template\Form\__Interface::Generate_Form($Attributes,$Fields);




                    Return $Result;
		}
	}


}
?>
