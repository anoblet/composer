<?PHP
Extends Framework\Module\Controller\Request
{

	Class URL
	{
		Public Function Retrieve_Request()
		{
			Return $_REQUEST;
		}
		Public Function Retrieve_Request_Parameters()
		{
			Return htmlspecialchars(AddSlashes($this->Retrieve_Request()));
		}
		Public Function Decode_Object($Object)
		{

			Try
			{
				# Validation
				\SYSTEM\Library\Validation\__Methods::String($Object);
				$Result =   UrlDecode($Object);
				// $Result =   UnSerialize($Result);
			}
			Catch (\Exception $Excepption)
			{

			}
			Return $Result;
		}
	}
}
?>