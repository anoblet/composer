<?PHP
Extends Framework\Module\AJAX
{
	Class __Main
	{
		Public Function Perform_Action($Class,$Function)
		{
			$Result  =   NULL;
			// Serialized
			$Result .=  $Class::$Function();

			Return $Result;
		}


	}
}
?>