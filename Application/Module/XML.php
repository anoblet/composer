<?php

	Namespace Application\Module
	{
		Class XML Extends \Application\Module
		{
			Public Function __Construct()
			{
				
			}

			Public Function Create($Data = Null)
			{
				// $Data = New Data\Model\Data($Data);
				
				// $Data = $this->Model("XML");
				
				// Return $Data;
				
				Return $this;
			}
			
			Public Function Load($Data = Null)
			{
				Return $this;
			}
			
			Public Function Edit($Data = Null)
			{
				
			}
			
			Public Function Delete($Data = Null)
			{
				
			}
			
			Protected Function XML($Data = Null)
			{
				$Document = New \DOMDocument("1.0", "UTF-8");
				$Document->preserveWhiteSpace = false;
				$Document->formatOutput = true;;
				// $Element = $this->Itterate($Data);
				$Document->appendChild($this->Itterate($Data, $Document));
				
				// $Document->AppendChild($Element);
				$XML = $Document->saveXML();
				
				Return $XML;
			}
			
			Private Function Itterate($Data, $Document)
			{
				$Class = Get_Class($Data);
				$Class = Explode("\\", $Class);
				$Class = Array_Pop($Class);
				
				$Element = $Document->createElement($Class);
				
				If(IsSet($Data));
				Else
				{
					Die("NULL");
				}
				
				ForEach($Data as $Property => $Value)
				{

					If(Is_String($Value))
					{
                        $Element->appendChild($Document->createElement($Property,$Value));
					}
					ElseIf(Is_Array($Value))
					{
						Print "Me";
					}
					ElseIf(Is_Object($Value))
					{					
					    $Attributes = $Value->Attributes();
                        If(IsSet($Attributes))
                        {
						    ForEach($Attributes as $Attribute => $Attribute_Value)
						    {
						    	$Element->setAttribute($Attribute, $Attribute_Value);
						    }
                        }
                        $Element->appendChild($this->Itterate($Value, $Document));
					}
				}
				Return $Element;
			}
			
		}
	}

?>