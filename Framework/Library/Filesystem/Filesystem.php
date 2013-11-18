<?PHP
/**
 * Copyright Andy Noblet 2010
 **/
?>
<?PHP
Extends Framework\Library
{
	Class Filesystem Extends \Framework\Library
	{
		Function Retrieve_Class_Directory($Class)
		{
			Return "/" . Str_Replace("\\","/",$Class) . "/";
		}
	}
}
?>