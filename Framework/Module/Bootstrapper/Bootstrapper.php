<?php
Namespace Framework\Module
{
	Class Bootstrapper Extends \Framework\Module
	{
		Static $Diagnostics;
		
		Function __Construct($Bootstrapper = NULL)
		{
			$this->Load_Diagnostics();
			parent::__Construct();
		}
		
		Function Bootstrap()
		{
			
			//\Framework\Module\Session::Initialize();

			self::Load_Diagnostics();
			
			Return $this;
		}
		
		Function Load_Diagnostics()
		{
			
			$this::$Diagnostics = Diagnostics::Initialize();
		}
		/*Public Function Initialize()
		{
			Return;
			$Core	=	Static::Core();
			$Core::$Diagnostics = Static::SYSTEM()->Module()->Diagnostics();
			$Core::$Controller = Static::SYSTEM()->Module()->Controller();
			
			$Core::$Session = Static::SYSTEM()->Module()->Session()->Initialize();
			$Core::$User_Interface = Static::SYSTEM()->Module()->User_Interface();
			// TODO Create these models
			$Core::$Environment  	=   Static::SYSTEM()->Module();
			$Core::$Template		=	Static::SYSTEM()->Module()->Template();
			$Configuration = \SYSTEM\Library\XML::Convert_to_Object("Configuration.xml");
			Date_Default_Timezone_Set((string) $Configuration->Timezone);
			// Static::$Configuration	=	Configuration::API();
			//Static::$Controller     =   Controller::API();
			//Static::$Template       =   Template::API();
			//Static::$User_Interface =   User_Interface::API();
			Return;
		}*/
	}
}
?>
