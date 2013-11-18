<?php
	Namespace Application
	{
		Class Model Extends \Application
		{
			Private $ID;
			Private $Element;
				
			Public Function __Construct($Data = Null)
			{
				If(IsSet($Data))
				{
					$this->Load($Data);
				}
			}
			
			Public Function Set_ID($ID)
			{
				$this->ID = $ID;
					
				Return $ID;
			}
				
			Public Function Get_ID()
			{
				$ID = $this->ID;
					
				Return $ID;
			}
				
			Public Function Set_Element($Element)
			{
				$this->Element = $Element;
			
				Return $Element;
			}
				
			Public Function Get_Element()
			{
				$Element = $this->Element;
			
				Return $Element;
			}
		}
	}
?>