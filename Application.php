<?php

	Require_Once("Framework/Framework.php");
	
	Defined('BASE_DIRECTORY') || Define('BASE_DIRECTORY', RealPath(DirName(__FILE__) . ''));
	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	Set_Include_Path
	(
		RealPath("./") . PATH_SEPARATOR.
		Get_Include_Path()
	);
	
	Class Application Extends Application\Application_Abstract
	{	
		Public Function Initialize()
		{
			/*
			// Let's grab our model
			$Application = New Application\Model();
			$Application->Load("Application.xml");
			*/
		
			Application::$Resource = $this;
		
			$this->Import("Application.xml");
						
			$Data = $this->Datasource->Load($this);
			$this->Import($Data);
				
			
			$this->Controller = New Application\Controller();
		
			$Request = New Application\Module\Request();
			$Request->Initialize();
						
			Print $this->Controller->Execute($Request);
					
		}
	}
	
?>