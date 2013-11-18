<?php
Extends Framework\Module\Form\Element
{
	Class Button Extends \Framework\Module\Form\Element
	{
		Const TEMPLATE  =   "/SYSTEM/Module/Form/Element/Button/Template/Button.tpl";
		Public $ID;
		Public $Label;
		Public $Name;

		Public Function __Construct()
		{
		}
		Public Function Create_Button()
		{
			Return Button\Models\Button::API()->Generate_Object();
		}
		Public Function Generate_XHTML()
		{
			$XHTML = $Element   =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
			Return $XHTML;
		}

	}
}
?>
