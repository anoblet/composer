<?php

	Namespace Application
	{
		Class Controller Extends \Application\Application_Abstract
		{
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
			}
			
			Public Function Execute($Request)
			{
				If($Request->AJAX)
				{
					
					/*
					
					$Data = New \Application\Model();
					$Data->application = $this->Application();
					$Data = $Data->XML();
					
					*/
					
					If(IsSet($_REQUEST["Format"]))
					{
						$Format = $_REQUEST["Format"];
					}
					Else
					{
						$Format = Null;
					}
						
					If($Format == "JSON")
					{
						$Data = $this->Application()->JSON();
					}
					
				}
				Else
				{
					$User_Interface = New Module\User_Interface();
					$Data = $User_Interface->Initialize();
				}
				
				$Request = $_REQUEST;
				
				If(IsSet($Request['Format']))
				{
					$Format = $Request["Format"];
				}
				Else
				{
					$Format = Null;
				}

				If($Format == "XML")
				{
					Header ("Content-Type:text/xml");
					
					$Applications = New \Application\Core\Model();
					$Applications->Set_Element("Applications");
					$Applications->Application = $this->Application();
					$Data = $Applications->XML();
					
					// $Data = $this->Application()->XML();
				}
				
				If($Format == "JSON")
				{
					$Data = $this->Application()->JSON();
				}
				
				Return $Data;
			}
			
		}
	}
?>