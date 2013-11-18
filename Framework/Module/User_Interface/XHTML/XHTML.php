<?
Extends Framework\Module\User_Interface
{
	Class XHTML
	{
		Print "Here";
		Die();
		Const Model =   "/SYSTEM/Module/User_Interface/XHTML/Models/Document.mdl";
		Const Template  =   "/SYSTEM/Module/User_Interface/XHTML/Models/Document.tpl";

		Public Function __Construct($Document)
		{

		}
		Public Function Generate_XHTML_Document()
		{
			$Document   =  \SYSTEM\Module\User_Interface\XHTML\Models\Document::API()
			->Generate()
			->Set_Title()
			->Set_CSS()
			->Set_Javscript();

			$XHTML_Document =   \SYSTEM\Module\Template::Load_Template(self::Template);
			Return $XHTML_Document;
		}
	}
}
?>