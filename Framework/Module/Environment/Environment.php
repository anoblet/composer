<?php
Namespace   SYSTEM\Module
{
	Class Environment Extends \Framework\Module
	{
		Public Static $Base_URL;
		Public Static $CSS_Directory;

		Protected Function __Construct()
		{
			Static::SYSTEM()->Module()->Diagnostics()->Log_Append("Loading Environment Configuration");
			Return parent::__Construct();
		}
		Public Function Initialize()
		{
			Var_Dump(Debug_backtrace());
			static::$Diagnostics->Log_Append("Initializing the Environment Sub-System.");
			static::$Base_URL = $this->Base_URL =    "http://{$_SERVER['HTTP_HOST']}" . substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
			$this->Define_Parameter(BASE_URL,self::$Base_URL);
			/**
			 * @todo
			 * - More modularized template SYSTEM
			 * - Included Styleshets with PHP
			 **/
			static::$CSS_Directory  =   $this->CSS_Directory   =   BASE_URL . "SYSTEM/Template/Default/Document/Head/Stylesheets/";
			$this->Define_Parameter(CSS_DIRECTORY,self::$CSS_Directory);
			self::Define_Parameter(Datasource_XML_Data, SYSTEM_DIRECTORY . "/Configuration/Data.xml");
			Return;
		}
		Public Function Define_Parameter($Parameter,$Value)
		{
			static::$Diagnostics->Log_Append("Defining parameter: {$Parameter} = {$Value}");
			Define($Parameter,$Value);
			Return $this;
		}
		Public Function Set_Base_URL()
		{
			self::$Base_URL =   $this->Base_URL = $this->Retrieve_Current_URL();
			Return $this;
		}

		Static Public Function Retrieve_Current_URL()
		{
			$URL  =   $_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
			Return $URL;
		}
		Static Public Function Retrieve_Current_Directory()
		{
			Return __DIR__;
		}
	}
}
?>