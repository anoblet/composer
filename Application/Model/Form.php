<?php
	Namespace Application\Model
	{
		Class Form Extends \Application\Model
		{
			Public $Fields;
			
			Public Function Add_Field($Field)
			{
				$this->Fields[] = $Field;
				
				return $this;
			}
		}
	}
?>