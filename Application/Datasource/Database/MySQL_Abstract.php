<?php

	Namespace Application\Datasource\Database
	{
		Class MySQL_Abstract Extends \Application\Datasource
		{
			Private $_Connection;
			
			Public Function __Construct()
			{
				Print "Here';";
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