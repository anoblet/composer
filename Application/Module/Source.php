<?php
	Namespace Application\Module
	{
		Class Source Extends \Application\Module
		{
			Public $URL;
			
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
				
				$Data = $this->Application()->Controller()->Request()->Get_Data();
				
				If(IsSet($Data))
				{
					
				}
				Else
				{
					$Model = $this->Model("Source");
					$Model_Attributes = $Model->Get_Atrributes();
					
					
					$this->Form = $this->Model("Form")
						->Set_Attribute("Action", $this->URL());
					
					/*
					
					For a string
					
					ForEach($Model_Attributes as $Attribute => $Value)
					{
						$this->Form
							->Add_Field
							(
								$this->Model("Field")
									->Set_Label($Attribute)
									->Set_Input
									(
										$this->Model("Input")
											->Set_Attribute("Type", "text")
											->Set_Attribute("Name", $Attribute)
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
					
					*/
					
					ForEach($Model_Attributes as $Attribute)
					{
						$this->Form
							->Add_Field
							(
								$this->Model("Field")
									->Set_Label($Attribute->Name)
									->Set_Input
									(
										$this->Model("Input")
											->Set_Attribute("Type", "text")
											->Set_Attribute("Name", $Attribute->Name)
									)
							);
					}
					$this->Form->Add_Field
					(
							$this->Model("Field")
							->Set_Input
							(
									$this->Model("Button")
									->Set_Attribute("ID", "Submit")
									->Set_Attribute("Type", "Submit")
									->Set_Text("&#8594;")
							)
					);

				}
			}
		}
	}
?>