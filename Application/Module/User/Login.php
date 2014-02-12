<?PHP
Namespace Application\Module\User
{
	Class Login Extends \Application\Module\User
	{
		Public Function __Construct($Data = Null)
		{
			parent::__Construct($Data);
			
			$this->Form = $this->Model("Form")
				->Add_Field
				(
					$this->Model("Field")
						->Set_Label("Username")
						->Set_Input
						(
							$this->Model("Input")
								->Set_Attribute("Type", "text")
								->Set_Attribute("Name", "Username")
						)
				)
				->Add_Field
				(
					$this->Model("Field")
						->Set_Label("Password")
						->Set_Input
						(
							$this->Model("Input")
								->Set_Attribute("Type", "password")
								->Set_Attribute("Name", "Password")
						)
				)
				->Add_Field
				(
					$this->Model("Field")
						->Set_Input
						(		
							$this->Model("Button")
								->Set_Attribute("ID", "Submit")
								->Set_Attribute("Type", "Button")
								->Set_Text("&#8594;")
						)
				);
		}
	}
}
?>