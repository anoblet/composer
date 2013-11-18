<?PHP
Extends Framework\Template\HTML\Tags\Label
{
	Class __Interface
	{
		Public Function Open($Attributes,$Value)
		{
			$Tag     = NULL;
			$Tag    .= "<Label {$Attributes}>{$Value}";
			Return $Tag;
		}
		Public Function Close()
		{
			$Tag     = NULL;
			$Tag    .= "</Label>";
			Return $Tag;
		}

	}
}
?>