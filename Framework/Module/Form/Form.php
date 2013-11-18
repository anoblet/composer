<?php
Extends Framework\Module
{
	Class Form Extends \Framework\Module
	{
		Const MODEL  =   "/SYSTEM/Module/Form/Form.mdl";
		Const TEMPLATE  =   "/SYSTEM/Module/Form/Template/Form.tpl";
		/*
		 Protected $Attributes  =   Array
		 (
		 'Method'=>"POST"
		 );
		 */
		Public Function Create_Form_Object()
		{
			Return Form\Models\Form::API()->Generate_Object();
		}
		Public Function Set_Action($Action)
		{
			$this->Attributes['Action'] =   $Action;
			Return $this;
		}
		Public Function Set_Method($Method)
		{
			$this->Attributes['Method'] =   $Method;
			Return $this;
		}
		Public Function Add_Element(/* Form\Field\Model */ $Element)
		{
			$this->Elements[] =   $Element;
			Return $this;
		}
		Public Function Remove_Element($Element)
		{
			Return;
		}
		Public Function Generate_XHTML()
		{
			$XHTML   =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
			Return $XHTML;
		}

	}
}
?>