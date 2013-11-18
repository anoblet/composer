<?PHP
Extends Framework\Module
{
	Class Navigation Extends \Framework\Module
	{
		Public Function Redirect($Destination_URL,$Delay)
		{
			$HTML = "<meta http-equiv='refresh'' content={$Delay};url='{$Destination_URL}'>";

			Return $HTML;
		}
	}
}
?>