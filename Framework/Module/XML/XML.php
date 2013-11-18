<?php

	NameSpace Framework\Module
	{
		Require_Once 'XML\Serializer.php';
		
		Class XML Extends \Framework\Module/* TODO \Data\Format*/
		{
			Public $Model	=	"Models\XML";
			Protected $Models = Array
			(
				"Document" => "Models\Document",
				"Element" => "Models\Element"
			);
			Public $Data;
			Public Function Generate_XML(/* XML\Models\XML */ $Parameters /* Object Array String */)
			{
				// @TODO 
				$Model = XML::API()->Model($Parameters);
				$XML	=	New \SimpleXMLElement("<{$Model->Retrieve_Property("Element")}></{$Model->Retrieve_Property("Element")}>");
				$XML = self::Iterate($XML,$Model->Retrieve_Property("Data"));
				Return $XML;
			}
			Public Function Generate_Document($Document)
			{
				$Model = Static::Model("Models/Document",$Document);
			}
			Public Function Iterate($XML,$Data)
			{
				
				
				// Data
				If(Is_String($Data))
				{
					Static::$Diagnostics->Log_Append("It's a simple string.");
					$XML[0] = $Data;
				}
				Else
				{
					// XMLElement
					If(Is_Object($Data))
					{
						If(Get_Class($Data) == "SimpleXMLElement")
						{
							$XML->addChild($Data->getName(),$Data);
						}
					}
					ForEach($Data as $Key => $Value)
					{
						Switch($Value)
						{
							Default: 
							{
								Throw New \Exception("Invalid Data.");		
							}
							Case Is_Object($Value):
							{
								$XML->addChild($Key,XML::Iterate($XML,$Value));
								Break;
							}
							Case Is_Array($Value):
							{
								$XML->addChild($Key,XML::Iterate($XML,$Value));
								Break;
							}
							Case Is_String($Value):
							{
								$XML->addChild($Key,$Value);
								Break;		
							}
						}
					}
				}
				Return $XML;
			}
			Public Function Generate_Element($Element)
			{
				Return New \SimpleXMLElement("<{$Element->Retrieve_Property("Element")}></{$Element->Retrieve_Property("Element")}>");
			}
			Public Function Load_XML($XML)
			{
				$this::$Diagnostics->Log_Append("Loading XML: {$XML}");
				/* TODO
					If(Is_Absolute($XML));
					Else
					{
					}
				*/
				$XML = $this::Directory . DIRECTORY_SEPARATOR . $XML; 
				// $File_Path  =   BASE_DIRECTORY . "{Static::$Class}\\{$XML}";
				Try
				{
					If(Is_File($XML))
					{
						$XML = SimpleXML_Load_File($XML);
					}
					ElseIf(Is_File($XML))
					{
						$XML =    SimpleXML_Load_File($XML);
					}
	
					ElseIf(Is_File($File_Path))
					{
						$XML =    SimpleXML_Load_File($File_Path);
					}
					Else
					{
						Throw New \Exception("Cannot find file: {$XML}");
	                }
                }
                Catch (\Exception $Exception)
                {
                    Throw $Exception;
                }

                Return $XML;
			}
			Function Is_XML($XML)
			{
				If(Is_Object($XML))
				{
					If(Get_Class($XML) == "SimpleXMLElement")
					{
						$Result = TRUE;
					}
					Else
					{
						$Result = FALSE;
					}
				}
				Else
				{
					$Result = False;
				}
				Return $Result;
			}
		}
	}