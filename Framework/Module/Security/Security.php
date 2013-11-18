<?PHP
Extends Framework\Module
{
	Class Security Extends \Framework\Module
	{
		Public Function __Construct()
		{
			// Static::$Library    =   Security\Library\Authentication::API();
			Return;
		}
		Public Function Initialize()
		{
			Try
			{
				If(\SYSTEM\Module\Configuration::Retrieve_Configuration('Require_Authentication') == "True")
				{
					\SYSTEM\Module\Security\Authentication::API()->Authenticate();
				}
				// Authentication
			}
			Catch(\Exception $Exception)
			{
				$Object =   $Exception;
				Throw $Object;
			}
			Return $Object;
		}
	}
	Class Filters
	{
		Public Function Multiple_IP()
		{
			 
		}
	}
}

?>
