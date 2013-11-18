<?PHP
Extends Framework\Template\Form\Field
{
	Class __Interface
	{
		Public Function Text($Attributes)
		{
			$String      = NULL;
			$String     .= "<Input {$Attributes} />";

			Return $String;
		}
		Protected Function TextArea($Attributes,$Value)
		{
			$String      = NULL;
			$String     .= "<TextArea {$Attributes}>\n";
			$String     .= $Value . "\n";
			$String     .= "</TextArea>\n";

			Return $String;
		}
		Protected Function Drop_Down($Attributes,$Options)
		{

		}
		Protected Function Check_Box($Attributes,$Options)
		{

		}

	}
}
?>
