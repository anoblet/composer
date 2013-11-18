<?PHP
Extends Framework\Module\News\Forms
{
	Class __Interface
	{
		Public Function Create_News_Item($Template)
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
