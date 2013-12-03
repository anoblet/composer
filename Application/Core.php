<?php

Namespace Application
{
	Class Core Extends Application_Abstract
	{		
		
		Public Function __Construct($Data = Null)
		{
			// parent::__Construct($Data);
		}
		
		Public Function Set_Attribute($Attribute, $Value)
		{
			$this->Attributes[$Attribute] = $Value;
			Return $this;
		}
		
		/*
		Public Function Get_Object_Vars_Recursive()
		{
			
		}
		*/
		
		Protected Function Library($Library = NULL)
		{
				
			If(IsSet($Library))
			{
				$Class = "Application\Library\\" . $Library;
			}
				
			Else
			{
				$Class = "Application\Library";
			}
				
			$Instance = New $Class();
				
			Return $Instance;
		}
		
		public function HTML()
		{
			// $XML = $this->Module("XML")->XML($this);
		
			$XML = $this->Library("HTML")->Serialize($this);
		
			Return $XML;
		}
		
		Public Function __Destruct()
		{

		}
	}
}

?>