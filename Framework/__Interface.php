<?PHP
Extends Framework
{
	Class __Interface
	{
		Public Function Call_Function($Function)
		{
			// Check Authentication Level to the Function
			\SYSTEM\Module\Security\Authentication\__Interface::Audit_Authentication_Level($Function,$User);
		}
	}
}

?>
