<?PHP
Extends Framework\Template\Form\Field
{
	Class __Interface
	{
		Public Function Text($Attributes)
		{
			Var_Dump($Attributes);
			$String      = NULL;
			$String     .= "<Input {$Attributes} />";
			Return $String;
		}

	}
}
?>
