<?PHP
Extends Framework\Library\Security
{
	Class __Interface
	{
		Public Function Clean_Data($Data)
		{
			If(Is_String($Data))
			{
				$Cleaned_Data    =   addslashes($Data);
			}
			Else
			{
				// Parse Objects / Arrays
				$Cleaned_Data  =   NULL;
			}
			Return $Cleaned_Data;
		}
	}
}

?>
