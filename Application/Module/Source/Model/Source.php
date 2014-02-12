<?php
	Namespace Application\Module\Source\Model
	{
		Class Source Extends \Application\Model
		{
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
				
				$this->Add_Attribute
				(
						$this->Model("Attribute")
						->Set_Property("Name", "Name")
				)
				->Add_Attribute
				(
					$this->Model("Attribute")
						->Set_Property("Name", "URL")
				)
				->Add_Attribute
				(
					$this->Model("Attribute")
						->Set_Property("Name", "Format")
				)

				;
			}
		}
	}
?>