<?php

	Namespace Application\Module
	{
		Class Request Extends \Application\Module
		{
			
			Public Function __Construct($Data = Null)
			{
				
			}
			
			Public Function Initialize()
			{
				$this->Data = $_REQUEST;
				$this->AJAX = $this->Is_AJAX();
			}
			
			Public Function Is_AJAX()
			{
				if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
				{
					$AJAX = True;
				}
				Else
				{
					$AJAX = False;
				}
				
				Return $AJAX;
			}
			
		}
	}
?>