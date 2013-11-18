<?php
Extends Framework\Module\Form
{
	Class Object Extends \Framework\Module\Model
	{
		Public $ID;
		Public $Action;
		Public $Method = "POST";

		Public Function __Construct()
		{
		}
		// Setters
		Public Function Format_Fields()
		{
			Return $this;
		}
	}
}
?>
