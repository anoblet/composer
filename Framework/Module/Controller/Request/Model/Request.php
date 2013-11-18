<?
Extends Framework\Module\Controller\Request\Model
{
	Class Request Extends \Framework\Core\Model
	{
		// Protected $Session;
		Protected $Data;
		
		Public $Namespace;
		Public $Function;
		
		Public $URI;
		Protected $Server;
		
		Function __Construct()
		{
			parent::__Construct();
		}
		
		/**
		
		Public Function __Construct()
		{
			$Configuration = \SYSTEM\Module\Configuration::Retrieve_Configuration("Default_Class");
			$this->Default_Class	=	$Configuration;//Return parent::__Construct();
		}
		
		**/
	
	}
}
?>