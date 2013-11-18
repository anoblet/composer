<?php

	Namespace Application\Library
	{
		Class XML Extends \Application\Library
		{	
			Public Function Is_XML_Object($Data)
			{
				Return Trim((string) $Data) === "";
			}
				
			Function Is_XML_File($Data)
			{
			
				// We gat an error here
				
				If(Is_String($Data) || PathInfo($Data,PATHINFO_EXTENSION) == "xml")
				{
					$Result = True;
				}
				Else
				{
					$Result = False;
				}
			
				Return $Result;
			
			}
			
			Public Function Load_XML_File($File)
			{
				$XML = SimpleXML_Load_File($File);
				
				$Data = $this->Convert_To_Object($XML);
				
				Return $Data;
			}
			
			Public Static Function Is_XML_String($Data)
			{
				If(Trim((string) $Data) === "")
				{
					$Result = FALSE;
				}
				Else
				{
					$Result = TRUE;
				}
				Return $Result;
			}
			
			Public Static Function Serialize($Data = Null, $Node = Null, $Document = Null)
			{
				If(IsSet($Document));
				Else
				{
					$Document = New \DOMDocument("1.0", "UTF-8");
					$Document->preserveWhiteSpace = false;
					$Document->formatOutput = true;
					
					$Class = Get_Class($Data);
					$Class = Explode("\\", $Class);
					$Class = Array_Pop($Class);
					
					$Class = strToLower($Class);
					
					$Root = $Document->createElement($Class);
					
					$Attributes = $Data->Attributes();
					
					If(IsSet($Attributes))
					{
						ForEach($Attributes as $Attribute => $Attribute_Value)
						{
							$Attribute = StrToLower($Attribute);
							$Root->setAttribute($Attribute, $Attribute_Value);
						}
					}
					
					Static::Serialize($Data, $Root, $Document);
					$Document->appendChild($Root);
					
					$XML = $Document->saveXML();
					
					Return $XML;
				}
				
				If(Is_String($Data));
				Else
				{
					If(Is_Array($Data));
					Else
					{
						If(Is_Object($Data))
						{
							ForEach($Data as $Property => $Value)
							{
								$Property = StrToLower($Property);
								
								If(Is_String($Value))
								{
									$Child = $Document->createElement($Property, $Value);
									$Node->appendChild($Child);
								}
								Else
								{
									If(Is_Array($Value))
									{
										ForEach($Value as $Array_Child)
										{			
											If(Is_String($Array_Child))
											{
												$Child = $Document->createElement($Property, $Array_Child);
												$Node->appendChild($Child);
											}
											Else
											{
												If(Is_Array($Array_Child))
												{
													
												}
												Else
												{
													If(Is_Object($Array_Child))
													{
														$Child = $Document->createElement($Property);
															
														$Attributes = $Array_Child->Attributes();
															
														If(IsSet($Attributes))
														{
															ForEach($Attributes as $Attribute => $Attribute_Value)
															{
																$Attribute = StrToLower($Attribute);
																$Child->setAttribute($Attribute, $Attribute_Value);
															}
														}
															
														Static::Serialize($Array_Child, $Child, $Document);
														$Node->appendChild($Child);
													}
												}
											}
										}
									}
									Else
									{
										If(Is_Object($Value))
										{
											$Child = $Document->createElement($Property);

											$Attributes = $Value->Attributes();

											If(IsSet($Attributes))
											{
												ForEach($Attributes as $Attribute => $Attribute_Value)
												{
													$Attribute = StrToLower($Attribute);
													$Child->setAttribute($Attribute, $Attribute_Value);
												}
											}
											
											Static::Serialize($Value, $Child, $Document);
											$Node->appendChild($Child);
										}
									}
								}
							}
							
						}
					}
				}

				Return $Node;
			}
			
			Public Function Retrieve_Attributes($Data)
			{
				$Attributes = (Array) $Data->attributes();
				If(IsSet($Attributes))
				{
					If(Empty($Attributes));
					Else
					{
						$Attributes = $Attributes['@attributes'];
					}
				}
				
				Return $Attributes;
			}
			
			Protected Function Clean_Attributes()
			{
				If(Empty($Attributes));
				Else
				{
					$Attributes = $Attributes['@attributes'];
				}
				
				Return $Attributes;
			}
			
			Public Function Convert_To_Object($Data, $Object = Null)
			{
				If(IsSet($Object));
				Else
				{
					$Object = New \Application\Core\Model();
				}
					$Attributes = $this->Retrieve_Attributes($Data);
					
					$Object->Set_Attributes($Attributes);
					
					ForEach($Data as $Child => $Value)
					{
							If($this->Library("XML")->Is_XML_String($Value))
							{
								$Object->{$Child} = (String) $Value;
							}
							Else
							{
								$Child_Attributes = $this->Retrieve_Attributes($Value);
								If(IsSet($Child_Attributes['Class']))
								{
									$Class = $Child_Attributes['Class'];
								}
								Else
								{
									$Class = "\Application\Core\Model";
								}
								
								$Object->{$Child} = $this->Convert_To_Object($Value);
							}
					}
										
				Return $Object;
			}			
		}
	}

?>