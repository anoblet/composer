<?php

	Namespace Application
	{
		Class _Abstract Extends \Application
		{
			Private $_Connection;
			
			Public Function __Construct()
			{
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
			
			Public Function Load($Data)
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