<?PHP
Extends Framework\Configuration\Security\Authentication
{
	Class __Interface
	{
		Public $Anonymous_Login = FALSE;
		 
		Public Function __Instantiate()
		{
			$Class = __CLASS__;

			Return New $Class;
		}
	}
}
?>