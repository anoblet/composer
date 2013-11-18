<?PHP
Extends Framework\Template\HTML\Tags\Form
{
	Class __Interface
	{
		Public Function Open($Attributes)
		{
			$HTML = "<Form {$Attributes}>";
			Return $HTML;
		}
		Public Function Close()
		{
			$HTML = "</Form>";
			Return $HTML;
		}
	}
}
?>
