<?php
	Namespace Application\Model
	{
		Class HTML Extends \Application\Model
		{
			Public Function __Construct($Data = Null)
			{
				// parent::__Construct($Data);
				
				$this->Head = New Head();
			}
		}
	}
?>