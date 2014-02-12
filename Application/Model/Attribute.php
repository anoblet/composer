<?php
	Namespace Application\Model
	{
		Class Attribute Extends \Application\Model
		{
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
			}
			
			Public Function __toString()
			{
				Print "Here";
			}
		}
	}
?>