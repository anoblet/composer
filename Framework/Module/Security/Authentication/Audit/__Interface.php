<?PHP
Extends Framework\Security\Authentication\Audit
{
	Class __Interface
	{
		Public Function Authentication_Status()
		{
			If(IsSet($_SESSION['Authentication_Status']))
			{
				$Status = TRUE;
			}
			Else
			{
				$Status = FALSE;
			}

			Return $Status;
		}

		Public Function Process()
		{

			Return $Result;
		}
	}
}
?>