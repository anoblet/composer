<?php

	Namespace Application\Datasource
	{
		Class Database Extends \Application\Datasource
		{			
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
			}	
			Public Function Load($Data = null)
			{
				If(IsSet($this->Adapter));
				Else
				{
					$Class = $this->__Class() . "\\" . $this->Adapter_Text;
					$this->Adapter = New $Class;
				}
			
				$Data = $this->Adapter->Load($Data);
				Return $Data;
			}
		}
	}
?>