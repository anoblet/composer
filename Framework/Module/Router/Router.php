<?php
Extends Framework\Module
{
	Class Router Extends \Framework\Module
	{

		Protected $Model = "Model\Router";
		Public Function Route(Controller\Request\Model\Request $Request)
		{
			// $this->Create_Event($Request);
			// Check against rewrites
			$Model = Static::Model($Request);
			
			// FIXME Messy
			// We are rooting it within the "application" namespace
			If(IsSet($Request->Namespace) && $Request->Namespace	!== "")
			{
				$Class_Path	=	"\SYSTEM\Module\\{$Request->Namespace}\\{$Request->Class}";
			}
			
			Else
			{
				$Class_Path	=	"\SYSTEM\Module\\{$Request->Retrieve_Property("Class")}";
			}
			$Function	=	$Request->Function;
			/*
			If(Function_Exists($Class()));
			Else
			{
				Print "Function does not exist. Trying Class";
			}
			$Class	=	"\\$Request->Class\\$Request->Function" ;
			If($Class);
			Else
			{
				Print "Class does not exist.";
			}
			*/
			$this->Data	=	$Class_Path::API()->{(string) $Function}();
			
			Return $this;
		}
	}
}
?>
