<?PHP
Extends Framework\Classes\Navigation
{
	Class __Interface
	{
		Public Function Redirect($Destination_URL,$Delay)
		{
			$HTML = "<meta http-equiv='refresh'' content={$Delay};url='{$Destination_URL}'>";

			Return $HTML;
		}
	}
}
?>