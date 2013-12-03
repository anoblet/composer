<?php

	Namespace Application
	{

		Class Application_Abstract
		{
		
			// Protected Static $Application;
			
			Private $Attributes = Array("ID" => NULL);
			
			Private $Element;
			
			// Public $Label;
			// Public $Identifier;
			
			Protected Static $Resource;
			
			// Private $Configuration;
			// Private $Datasource;
					
			// Private $Data;
			
			// Private $Model = "Application.xml";
			
			// Private $XML = "Application.xml";
			
			Public Function __Call($Function, $Parameters)
			{
				If(Method_Exists("Application\Core",$Function))
				{
					$Data = \Application\Core::$Function();
				}
				
				Throw New \Exception("Function {$Function} does not exist");
			}
			
			Function __Construct($Data = Null)
			{	
				// $this->Create("Application.xml");
				// $this->Load("Application.xml");

				// $this->Label = $this->__Class();
				// $this->Identifier = $this->__Class();
				
				If(IsSet($Data));
				Else
				{
					$Data = "Application.xml";
				}
				
				// $this->Import($Data);
				
				
				// $this->Load();
				
				// $this->Configuration = $this->Module("Configuration");
				// $this->Datasource = $this->Module("Datasource");
			}
			

			Public Function __toString()
			{
				/*
				
				$Class = Get_Called_Class();
				$Class = Explode("\\", $Class);	
				$Class = Array_Pop($Class);
				
				Return $Class;
				*/
				
				$Data = $this->HTML();
			
			Return $Data;
			}
			
			Public Function Attributes()
			{
				Return $this->Attributes;
			}

			
			Final Public Function Import($Data = NULL)
			{
				If(Is_String($Data))
				{
					If($this->Library("XML")->Is_XML_File($Data))
					{
						$Data = $this->Library("XML")->Load_XML_File($Data);
					}
				}		
								
				If(Is_Object($Data))
				{
					$Attributes = $Data->Attributes();
					$this->Set_Attributes($Attributes);
					
					ForEach($Data as $Property => $Value)
					{
						If(Is_String($Value))
						{
							$this->{$Property} = $Value;
						}
						If(Is_Object($Value))
						{
							$Child_Attributes = $Value->Attributes();
														
							If(IsSet($Child_Attributes['class']))
							{
								$Class = $Child_Attributes['class'];
							}
							Else
							{
								$Class= "\Application\Core\Model";
							}
							
							$Child = New $Class();
							$this->{$Property} = $Child->Import($Value);
						}
					}
				}		
				
				Return $this;		
			}
			
			Protected Function Merge($Data, $Object)
			{
				ForEach($Data as $Property => $Value)
				{
					If(Is_Object($Value))
					{
						$this->{$Property} = $this->Merge($Value, $Object);
					}
				}
			}
			
			Protected Function Set_Attribute($Attribute, $Value)
			{
				$this->Attributes[$Attribute] = $Value;
			}
			
			Protected Function Set_Attributes($Attributes)
			{
				ForEach($Attributes as $Attribute => $Value)
				{
					$this->Set_Attribute($Attribute, $Value);
				}
			}
			
			Private Function Retrieve_Attribute($Attribute)
			{
				$Attribute = $this->Attributes[$Attribute];
				
				Return $Attribute;
			}
			
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
			
			public function Module($Module = Null)
			{
				If(IsSet($Module))
				{
					$Class = "Application\\Module\\" . $Module;
					If(Class_Exists($Class))
					{
						$Module = New $Class;
					}
					Else
					{
						Die();
					}
				}
				
				Return $Module;
			}
			
			Protected Function Model($Model = Null)
			{
				/*
				If(IsSet($Model));
				Else
				{
					$Model = $this->Model;
				}
				*/
				$Class = Get_Called_Class . "\\Model\\" . $Model;
			}
			
			Public Function Create($Data = NULL)
			{
				If($this->Library("XML")->Is_XML_File($Data))
				{
					$Data = $this->Library("XML")->Load_XML_File($Data);
				}
	            If(Is_Array($Data))
	            {
	            	Print "Here";
	            }
				ForEach($Data as $Property => $Value)
				{
					If(Is_Array($Value))
					{
					}
						If($this->Library("XML")->Is_XML_String($Value))
						{
						    $this->{$Property} = (String) $Value;
						}
						Else
						{
							If(Is_Object($Value))
							{
								$Class = Get_Called_Class() . "\\" . $Property;
								$Class = New $Class();
								$this->{$Property} = $Class->Create($Value);
							}
						}
				}			
				Return $this;
			}
			/*
			@todo Fix
			Public Function Load($Data = NULL)
			{
				If($this->Library("XML")->Is_XML_File($Data))
				{
					$Data = $this->Library("XML")->Load_XML_File($Data);
				}
	            If(Is_Array($Data))
	            {
	            	Print "Here";
	            }
				ForEach($Data as $Property => $Value)
				{
					If(Is_Array($Value))
					{
						PRint "Here";
					}
						If($this->Library("XML")->Is_XML_String($Value))
						{
						    $this->{$Property} = (String) $Value;
						}
						Else
						{
							If(Is_Object($Value))
							{
								$Class = Get_Called_Class() . "\\" . $Property;
								$Class = New $Class();
								// $this->{$Property}[] = $Class->Load($Value);
							}
						}
				}
	
				$this->Flatten($this);
				
				Return $this;
			}
			 */
			Public Function Load($Data = NULL)
			{
				If($this->Library("XML")->Is_XML_File($Data))
				{
					$Data = $this->Library("XML")->Load_XML_File($Data);
				}
	            If(Is_Array($Data))
	            {
	            	Print "Here"; var_dump($Data);
	            }
				ForEach($Data as $Property => $Value)
				{
					If(Is_Array($Value))
					{
					}
						If($this->Library("XML")->Is_XML_String($Value))
						{
						    $this->{$Property} = (String) $Value;
						}
						Else
						{
							If(Is_Object($Value))
							{
								$Class = Get_Called_Class() . "\\" . $Property;
								$Class = New $Class();
								$this->{$Property} = $Class->Create($Value);
							}
						}
				}			
				Return $this;			
			}
			
			Protected Function Flatten($Data)
			{
				ForEach($Data as $Property => $Value)
				{
					If(Is_Array($Value))
					{
						If(Count($Value) == 1)
						{
							$Data->{$Property} = $Value[0];
						}
						
					}
				}
				Return $Data;
			}
			
			Protected Function Diagnostics()
			{
				Return $this->Module("Diagnostics");
			}
			
			Protected Function Application()
			{
				Return Static::$Resource;
			}
			
			Protected Function JSON($Data = Null)
			{
				// $JSON = $this->Library("JSON")->Serialize($this);
				$JSON = $this->Library("JSON")->Serialize_ItemFileReadStore($this);
				
				Return $JSON;
			}
			
			public function XML()
			{							
				// $XML = $this->Module("XML")->XML($this);
				$XML = $this->Library("XML")->Serialize($this);
				
				Return $XML;
			}
			
			Protected Function HTML()
			{
				// $XML = $this->Module("XML")->XML($this);
			
				$XML = $this->Library("HTML")->Serialize($this);
					
				Return $XML;
			}
			
			Public Function __Class()
			{
				$Class = Get_Called_Class();
				$Class = Explode("\\", $Class);
				$Class = Array_Pop($Class);
				
				Return $Class;
			}
			
			Public Static Function Get_Object_Vars_Recursive($Data)
			{
				// $Class = $Data->__Class();
				
				$Data = Get_Object_Vars($Data);
				
				ForEach($Data as $Property => $Value)
				{
					If(Is_String($Value));
					Else
					{
						If(Is_Array($Value));
						Else
						{
							If(Is_Object($Value))
							{
								$Data[$Property] = Static::Get_Object_Vars_Recursive($Value);
							}
						}
					}
				}
				
				Return $Data;
			}
			
			// From object to array.
			function toArray($data) {
				if (is_object($data)) $data = get_object_vars($data);
				return is_array($data) ? array_map(Static::toArray($Data), $data) : $data;
			}
			
			// From array to object.
			function toObject($data) {
				return is_array($data) ? (object) array_map(__FUNCTION__, $data) : $data;
			}
			
			Public Function __Destruct()
			{
			}
		}
	}
?>