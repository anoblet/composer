<?php
	Namespace Application\Model
	{
		Class Field Extends \Application\Model
		{
			Public Function Set_Label($Label)
			{
				$this->Label = $Label;
				
				Return $this;
			}
			
			Public Function Set_Input($Input)
			{
				$this->Inputs[] = $Input;
				
				Return $this;
			}
		}
	}
?>