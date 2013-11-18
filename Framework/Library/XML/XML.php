<?php

	Namespace Application\Module
	{
		Class XML Extends \Application\Module
		{
			Public Function __Construct($Data = Null)
			{
				
			}
			
			Public Function Create($Data = Null)
			{
				$Document = $this->Create_Document($Data);
				
				Return $Document;
			}
			
			Public Function Create_Document($Data = Null)
			{
				$Document = New \DOMDocument("1.0", "UTF-8");
				$Document->preserveWhiteSpace = false;
				$Document->formatOutput = true;
				$Document->appendChild($this->Serialize($Data));
				
				Return $Document;
			}

			Public Function Create_Element($Document = Null, $Data = Null)
			{
				If(Is_String($Data))
				{
					$Element = $Document->createTextNode($Data);
				}
				Else
				{
					$Class = Get_Class($Data);
					$Class = Explode("\\", $Class);
					$Class = Array_Pop($Class);
										
					If(Is_Array($Data))
					{
						For($X=0;$X<Count($Data);$X++)
						{
							$Element = $Document->createElement($Class);
							$Element->AppendChild($this->Create_Element($Document, $Data[$X]));
						}
					}
					Else
					{
						If(Is_Object($Data))
						{
							ForEach($Data as $Property => $Value)
							{
								If(Is_String($Value))
								{
									$Element->AppendChild($this->Create_Element($Document, $Value));
								}
								Else
								{
									If(Is_Array($Value))
									{
										For($X=0;$X<Count($Value);$X++)
										{
											$ELement->AppendChild($this->Create_Element($Document, $Value[$X]));
										}
										
									}
									Else
									{
										If(Is_Object($Value))
										{
											$Element = $Document->createElement($Class);

											$Element->AppendChild($this->Create_Element($Document, $Value));
										}
									}
								}
							}
						}
					}
				}
				Return $Element;
			}
			
			Public Static Function Serialize($Data = Null)
			{
				$Document = New \DOMDocument("1.0", "UTF-8");
				$Document->preserveWhiteSpace = false;
				$Document->formatOutput = true;
				$Document->appendChild(Static::Itterate($Data, $Document));
				
				$XML = $Document->saveXML();
				
				Return $XML;;
			}
			
			Protected Static Function Itterate($Data, $Document)
			{
				If(Is_String($Data))
				{
					Print "Here";
				}
				Else
				{
					If(Is_Array($Data));
					Else
					{
						If(Is_Object($Data))
						{
							$Class = Get_Class($Data);
							$Class = Explode("\\", $Class);
							$Class = Array_Pop($Class);
							
							$Element = $Document->createElement($Class);
								
							ForEach($Data as $Property => $Value)
							{
								If(Is_String($Value))
								{
									$Child = $Document->createElement($Property,$Value);
								}
								Else
								{
									If(Is_Array($Value));
									Else
									{
										If(Is_Object($Value))
										{
											$Child = $Document->createElement($Property);
											$Child->appendChild(Static::Itterate($Value, $Document));
										}
									}
								}

							}
							
						}
					}
				}

				Return $Element;
				
				If(IsSet($Node));
				Else
				{
					$Node = new DOMElement();
				}
				
				If(Is_String($Data))
				{
					$Element = $Document->createTextNode($Data);
				}
				Else
				{
					$Class = Get_Class($Data);
					$Class = Explode("\\", $Class);
					$Class = Array_Pop($Class);
										
					If(Is_Array($Data))
					{
						For($X=0;$X<Count($Data);$X++)
						{
							$Element = $Document->createElement($Class);
							$Element->AppendChild($this->Create_Element($Document, $Data[$X]));
						}
					}
					Else
					{
						If(Is_Object($Data))
						{
							ForEach($Data as $Property => $Value)
							{
								If(Is_String($Value))
								{
									$Element->AppendChild($this->Create_Element($Document, $Value));
								}
								Else
								{
									If(Is_Array($Value))
									{
										For($X=0;$X<Count($Value);$X++)
										{
											$ELement->AppendChild($this->Create_Element($Document, $Value[$X]));
										}
										
									}
									Else
									{
										If(Is_Object($Value))
										{
											$Element = $Document->createElement($Class);

											$Element->AppendChild($this->Create_Element($Document, $Value));
										}
									}
								}
							}
						}
					}
				}
				Return $Node;
			}
			
			Private Function Get_Class()
			{
				
			}
			
			Public Function XML($Data = Null)
			{
				$Document = $this->Create_Document($Data);
				$XML = $Document->saveXML();
				
				Return $XML;
			}
			
		}
	}

?>