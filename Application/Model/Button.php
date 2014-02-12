<?php
	Namespace Application\Model
	{
		Class Button Extends \Application\Model
		{
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
			}
			
			Public Function Set_Icon($Icon)
			{
				$this->Icon = $Icon;
				
				Return $this;
			}
		}
	}
?>