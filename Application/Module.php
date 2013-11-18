<?php

	Namespace Application
	{
		Class Module Extends \Application
		{
			Public Function Model($Model = Null)
			{
				$Class = Get_Called_Class();
				
				If(IsSet($Model))
				{
					$Model = $Class . "\\Model\\" . $Model;
				}
				Else
				{
					$Model = "\\Aplication\\Core\Model";
				}
				
				$Model = New $Model();
				
				Return $Model;
			}
		}
	}
?>