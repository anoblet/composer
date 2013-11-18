<?php
Extends Framework\Module\Controller
{

	Class Object Extends \Framework\Module\Controller
	{
		Public Function Generate($Object)
		{
			Var_Dump($Object);
			$this->Result   =   \SYSTEM\Module\Template::API()
			->Load_Template($this->Retrieve_Object());
			\SYSTEM\User_Interface::$Response    =   $this->Result;
		}

	}
	 
}
?>
