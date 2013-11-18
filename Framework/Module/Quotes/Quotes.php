<?PHP
Extends Framework\Module
{
	Class Quotes Extends \Framework\Entities // \SYSTEM\Entities
	{
		Const Datasource    =   Datasource_XML_Data;
		Const Template      =   "Template/Quote.tpl";
		Const XSL          =   "Template/Quote.xsl";

		Public $XSL =   "Template/Quote.xsl";

		Protected $Configuration = Array
		(
		/* Datasource */
			"Table"	=>	"Quotes"
		);

		Public Function __Construct()
		{
			Static::$Datasource =   Static::$Datasource
			->Generate_Object()
			->Generate_Connection_XML_File(Static::Datasource);
			Return;
		}
		Public Function Generate_HTML()
		{
			Var_Dump($this);
		}
	}
}
?>
