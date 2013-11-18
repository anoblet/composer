<?PHP
Extends Framework\Module\Security\Models
{
	Class Security Extends \Framework\Module\Security
	{
		Public Function __Construct()
		{
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
