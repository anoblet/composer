<?php
	Namespace Application\Model
	{
		Class Head Extends \Application\Model
		{
			Public Function __Construct($Data = Null)
			{
				// parent::__Construct($Data);
			}
			
			Public Function Set_Title($Title)
			{
				$this->Title = $Title;
				
				Return $this;
			}
			
			Public Function Add_Stylesheet($Stylesheet)
			{
				$Link = New \Application\Model\Link();
				$Link->Set_Attribute("HREF", $Stylesheet);
				$Link->Set_Attribute("REL", "stylesheet");
				$Link->Set_Attribute("Type", "text/css");
				// $this->Stylesheets[] = $Model;
				$this->Link[] = $Link;
				
				Return $this;
			}
			
			Public Function Add_Javascript($Javascript)
			{
				$Script = New \Application\Model\Script();
				$Script->Set_Attribute("SRC", $Javascript);
				$Script->Set_Attribute("Type", "text/javascript");
				// $this->Stylesheets[] = $Model;
				$this->Script[] = $Script;
				
				Return $this;
			}
		}
	}
?>