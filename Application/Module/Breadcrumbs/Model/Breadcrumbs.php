<?php
	Namespace Application\Module\Breadcrumbs\Model
	{
		Class Breadcrumbs Extends \Application\Model
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
				);
				
				$this->Set_Property("Text", "Breadcrumbs");
			}
		}
	}
?>