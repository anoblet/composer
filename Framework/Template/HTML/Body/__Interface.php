<?PHP
Extends Framework\Template\HTML\Tags\HTML
{
	Class __Interface
	{
		Public Function Open($Attributes)
		{
			$String .= "<HTML" . $Attributes . ">\n";

			Return $String;
		}
		Public Function Close()
		{
			$String .= "</HTML>\n";

			Return $String;
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
