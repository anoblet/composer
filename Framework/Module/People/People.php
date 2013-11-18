<?PHP
Extends Framework\Module
{

	Class People Extends \Framework\Entities
	{
		Protected Static $Datasource_XML = Datasource_XML_Data;
		Protected $Entity	=	"People";
		Protected $XSL  =   "Template/Person.xsl";
	}
}
?>