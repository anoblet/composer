<?PHP
Extends Framework\Template\HTML\Tags\Body
{
	Class __Interface
	{
		Public Function Open($Attributes)
		{
			$Tag .= "<Body" . $Attributes . ">\n";

			Return $Tag;
		}
		Public Function Close()
		{
			$Tag = "</Body>\n";

			Return $Tag;
		}

	}

	Class Backend
	{
		Protected Function Generate_Attributes()
		{

		}
	}
}

?>
