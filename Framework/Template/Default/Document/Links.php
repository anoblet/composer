<?PHP
Extends Framework\Template\Document
{
	Class Links
	{
		Public Function Logout()
		{
			$XHTML  .=  "<A HREF='/?Function=Logout'>Logout</A>";
			Return $XHTML;
		}
	}
}
?>