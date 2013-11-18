<?PHP
Extends Framework\Template\Form
{
	Class __Interface
	{
		Public Function Generate_Form($Attributes,$Fields)
		{
			// Declare Variable
			$Form   =   NULL;

			//  Allowed Input
			/*      Array $Attributes
			 /           Type
			 /
			 /           Value
			 */
			//

			// Lets Convert the Attributes Array into a html format concencated string
			$Attributes_String = \SYSTEM\Library\String_Manipulation\__Interface::HTML_Array_String($Attributes, "");
			// Generate Form Header
			$Form  .= \SYSTEM\Template\HTML\Tags\Form\__Interface::Open($Attributes_String) . "\n";
			// Generate Fields
			For($I=0;$I<Count($Fields);$I++)
			{
				$Form   .= \SYSTEM\Template/* Module */\Form\__Interface::Generate_Field($Fields[$I]['Type'],$Fields[$I],$Fields[$I]['Value']) . "\n";
			}
			// Generate Form Footer
			$Form  .=   \SYSTEM\Template\HTML\Tags\Form\__Interface::Close() . "\n";

			Return $Form;
		}
		Protected Function Generate_Field($Type,$Attributes,$Value)
		{
			$Field = NULL;
			// Generate Label Attributes //
			$Label_Attributes  = \SYSTEM\Library\String_Manipulation\__Interface::HTML_Array_String($Attributes['Label_Attributes'], "");
			// Generate Input Attributes
			$Type = $Attributes['Type'];
			$Attributes_String = \SYSTEM\Library\String_Manipulation\__Interface::HTML_Array_String($Attributes, "");

			$Field      .=  \SYSTEM\Template\HTML\Tags\Label\__Interface::Open($Label_Attributes,$Attributes['Label']);
			$Field      .=  \SYSTEM\Configuration\Template\__Interface::Label_Terminator . " ";
			$Field      .=  \SYSTEM\Template\Form\Field\__Interface::$Type($Attributes_String);
			$Field      .=  \SYSTEM\Template\HTML\Tags\Label\__Interface::Close();

			Return $Field;
		}

	}
}
?>
