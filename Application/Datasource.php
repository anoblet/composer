<?php

	Namespace Application
	{
		Class Datasource Extends \Application\Application_Abstract
		{
				
			Public Function __Construct($Data = Null)
			{
				parent::__Construct();
				$this->Import($Data);
			}

			Protected Function Adapter()
			{
				If(IsSet($this->Adapter));
				Else
				{
					$this->Adapter = New $this->Adapter_Text;
				}
				
				Return $this->Adapter;
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