<?php

	Namespace Application\Module
	{
		Class HTML Extends \Application\Module
		{
			public function toHTML($data = Null, $node = Null, $document = Null)
			{				
				if(isset($document));
				Else
				{
					$document = New \DOMDocument("1.0", "UTF-8");
					$document->preserveWhiteSpace = false;
					$document->formatOutput = true;
					
					$root = $document->createElement($data->__getClass());
					
					$attributes = $data->__getAttributes();
					
					if(isset($attributes))
					{
						ForEach($attributes as $attribute => $attribute_Value)
						{
							$attribute = StrToLower($attribute);
							$root->setAttribute($attribute, $attribute_Value);
						}
					}
					
					$this->toHTML($data, $root, $document);
					$document->appendChild($root);
										
					$Result = Null;
					
					foreach($document->childNodes as $node)
					{
						$Result .= $document->saveXML($node)."\n";
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
				
				if(Is_String($data));
				Else
				{
					if(Is_Array($data));
					Else
					{
						if(Is_Object($data))
						{
							ForEach($data as $Property => $Value)
							{
								$Property = StrToLower($Property);
								
								if(Is_String($Value))
								{
									$Child = $document->createElement($Property, $Value);
									$node->appendChild($Child);
								}
								Else
								{
									if(Is_Array($Value))
									{										
										ForEach($Value as $Array_Child)
										{		
											$this->toHTML($Array_Child, $node, $document);
										}
									}
									Else
									{
										if(Is_Object($Value))
										{
											$Child = $document->createElement($Property);
											
											$attributes = $Value->__getAttributes();

											if(isset($attributes))
											{
												ForEach($attributes as $attribute => $attribute_Value)
												{
													$attribute = StrToLower($attribute);
													$Child->setAttribute($attribute, $attribute_Value);
												}
											}
											
											$this->toHTML($Value, $Child, $document);
											$node->appendChild($Child);
										}
									}
								}
							}
							
						}
					}
				}

				Return $node;
			}
		}
	}

?>