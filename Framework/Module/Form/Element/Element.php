<?php
Extends Framework\Module\Form
{
	Class Element Extends \Framework\Module\Form
	{
		Const TEMPLATE = "/SYSTEM/Module/Form/Element/Template/Text.tpl";

		Public Function Create_Element($Element)
		{
			$Element = "Element\\{$Element}";
			Switch($Element)
			{
				Default:
					{
						Throw New \Exception("Invalid Element.");
                       Break; 
                    }
                    Case "Element\Text":
						{
							$Element    =   Element\Text::API()->Create_Element();
							Break;
						}
						Case "Element\Button":
							{
								$Element    =   Element\Button::API()->Create_Button();
							}
					}
					Return $Element;
			}
			Public Function Set_Label($Label)
			{
				$this->Label = $Label;
				Return $this;
			}
			Public Function Set_Type($Type)
			{
				$this->Type="Type";
				Return;
			}
			Public Function Set_Name($Name)
			{
				$this->Attributes['Name'] = $Name;
				Return $this;
			}
			Public Function Generate_XHTML()
			{
				$XHTML = $Element   =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
				Return $XHTML;
			}
		}
	}
	?>