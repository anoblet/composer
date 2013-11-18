<?PHP
/**
 * Copyright 2011 Andy Noblet
 */
	Extends Framework\Module
	{
		Class User Extends \Framework\Module
		{
			Protected $Module	=	"User";
			Protected $XML	=	"\SYSTEM\Module\User\Module.xml";
			Const Model	=	"Models\User";
			Protected $Model;
			Protected Static $Namespace	=	__NAMESPACE__;
			// Should be a constant
			Const Datasource_XML	=	Datasource_XML_Data;



			Public Function Register()
			{
				// TODO What if all paths were defined URL wise?
				User\Register::API()->Generate_Object();
				$Model	=	$this->Retrieve_Model("Models\User")
					->Set_Template("Templates/Register.xsl");
				Return $Model;
			}
			Public Function	Login()
			{

			}
			Public Function Logout()
			{

			}
		}
	}
?>