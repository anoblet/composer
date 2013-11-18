<?PHP
Extends Framework\Module\Google_Services_Integration
{
	Class __Interface
	{
		Public Function Load($Service,$Function)
		{

			$Result;
			Return $Result;
		}
		Public Function Generate_Code()
		{
			$Code   = file_get_contents(BASE_DIRECTORY . "/SYSTEM/Module/Google_Services_Integration/Analytics/Code.tpl");
			Return $Code;
		}
	}
}
?>