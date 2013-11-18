<?php

	Namespace Application\Library
	{
		Class HTML Extends \Application\Library
		{
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
					
					$Class = StrToLower($Class);
					
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
					
					// $HTML= $Document->saveHTML();
					
					$Result = Null;
					
					foreach($Document->childNodes as $node)
					{
						$Result .= $Document->saveXML($node)."\n";
					}
										
					$Implementation = new \DOMImplementation();
					
						$DTD = $Implementation->createDocumentType('html',
	                  '-//W3C//DTD XHTML 1.1//EN',
	                  'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd');
						
						$New_Document = $Implementation->createDocument('http://www.w3.org/1999/xhtml',
		                   'html',
		                   $DTD);
					
					// Quick hack for errors
					
					$New_Document->loadXML($Result);
					
					$HTML = $New_Document->saveHTML();
					
					Return $HTML;
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
		}
	}

?>