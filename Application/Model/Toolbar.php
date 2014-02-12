<?php
	Namespace Application\Model
	{
		Class Toolbar Extends \Application\Model
		{
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
				$this->Create_Buttons();
			}
			
			Public Function Create_Buttons()
			{
				$this->Buttons = Array
				(
					$this->Model("Button")
						->Set_Attribute("ID", "Login")
						->Set_Attribute("href", "Application/Module/User/Login")
						->Set_Attribute("alt", "Login")
						->Set_Icon("&#128274;")
						->Set_Property("Dialog" , $this->Model()
							->Set_Attribute("ID", "Login_Dialog")
						),
					$this->Model("Button")
						->Set_Attribute("ID", "Calandar")
						->Set_Attribute("href", "/")
						->Set_Icon("&#128197;"),
					$this->Model("Button")
						->Set_Attribute("ID", "Settings")
						->Set_Attribute("href", "/Application/Module/User/Settings")
						->Set_Icon("&#009881;")
						->Set_Property("Tooltip", $this->Model()
							->Set_Attribute("HREF", "/Application/Module/Settings")
						)						
				);
			}
		}
	}
?>