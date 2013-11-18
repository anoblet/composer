<?php
Extends Framework\Module\Form\Element
{
	Class Text Extends \Framework\Module\Form\Element
	{
		Const TEMPLATE  =   "/SYSTEM/Module/Form/Element/Text/Template/Text.tpl";


		Public Function __Construct()
		{
		}
		Public Function Create_Element()
		{
			Return Text\Models\Text::API()->Generate_Object();
		}
		Public Function Generate_XHTML()
		{
			$XHTML = $Element   =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
			Return $XHTML;
		}

	}
}
?>
