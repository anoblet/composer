<?PHP
Extends Framework\Template\Document\Head
{
	Class __Interface
	{
		Public Function StyleSheets($Object)
		{

			$StyleSheets = NULL;
			For($I=0;$I<Count($Object);$I++)
			{
				$StyleSheets    .=  \SYSTEM\Template\Document\Head\StyleSheets\__Interface::Generate_StyleSheet($Object[$I]) . "\n";
			}
			Return $StyleSheets;
		}

		Public Function JavaScript($Array)
		{
			$JavaScript  =   NULL;
			For($I=0;$I<Count($Array);$I++)
			{
				$JavaScript .=  \SYSTEM\Template\Document\Head\JavaScript__Interface::Generate_Javascript($Array[$I]);
			}

			Return $JavaScript;
		}

	}
}
?>