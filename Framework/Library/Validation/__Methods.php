<?PHP
Extends Framework\Library\Validation
{
	Class __Methods
	{
		Public Function String($Object)
		{
			If(Is_String($Object));
			Else
			{
				Throw New \Exception ("Parameter is not a string");
			}
		}
	}
}
?>