<?PHP
Extends Framework\Template\Document
{
	Class __Interface
	{
		Public Function Head($Title,$StyleSheets,$JavaScript)
		{
			$Head   .= "<Head>" . "\n";
			$Head   .= "<Title>{$Title}</Title>" . "\n";
			$Head   .= \SYSTEM\Template\Document\Head\__Interface::Stylesheets($StyleSheets) . "\n";
			/**
			 * @Internal
			 * Should components be passed or generated
			 *  $Head   .= \SYSTEM\Template\Document\Head\__Interface::JavaScript($JavaScript) . "\n";
			 * Generated:
			 *
			 */
			$Head   .=  $JavaScript;
			$Head   .= "</Head>" . "\n";

			Return $Head;
		}
	}
}
?>