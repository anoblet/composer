<?PHP
Extends Framework\Module\AJAX
{
	Class __API
	{

		Public Function Refresh_Page()
		{
			$Template   =   BASE_DIRECTORY . "/SYSTEM/Module/Javascript/Refresh_Page.tpl";
			$XHTML =   \SYSTEM\Template\__Interface::Include_Layout($Template);
			Return($XHTML);
		}
	}
}
?>