<?php

	Namespace Application\Library
	{
		Class JSON Extends \Application\Library
		{		
			Public Static Function Serialize($Data = Null)
			{
				Return JSON_Encode($Data);
			}
			
			Public Static Function Serialize_ItemFileReadStore($Data = Null, $Root = Null)
			{
				If(IsSet($Root))
				{
					If(Is_String($Data));
					Else
					{
						If(Is_Array($Data));
						Else
						{
							If(Is_Object($Data))
							{
								$Object  = New \Application\Core\Model();
								
								ForEach($Data as $Property => $Value)
								{
									If(Is_String($Value))
									{
										$Object->$Property = $Value;
									}
									Else
									{
										If(Is_Array($Value));
										Else
										{
											IF(Is_Object($Value))
											{
												// $Object->$Property = Static::Serialize_ItemFileReadStore($Value, $Root);
												$Object->children[] = Static::Serialize_ItemFileReadStore($Value, $Root);
											}
										}
									}

								}				
								
								$JSON = $Object;
							}
						}
					}
				}
				Else
				{
					$Root = New \Application\Core\Model();
					
					$Root->label = "Label";
					$Root->identifier = "Identifier";
					$Root->items[] = Static::Serialize_ItemFileReadStore($Data, $Root);
					
					$JSON = JSON_Encode($Root);
				}
				
				Return $JSON;
				
				$Object = New \Application\Core\Model();
				
				$Object = New \Application\Core\Model();
								
				If(Is_String($Data));
				Else
				{
					If(Is_Array($Data));
					Else
					{
						If(Is_Object($Data))
						{
							$Class = $Data->__Class();
							$Object->indentifier = $Class;
							
							$Items = Get_Object_Vars($Data);							
							
							$Item = New \Application\Core\Model();
							
							ForEach($Items as $Property => $Value)
							{
								If(Is_String($Value))
								{
										$Item->$Property = $Value;
								}
								Else
								{
									If(Is_Array($Value));
									Else
									{
										If(Is_Object($Value))
										{
											$Object->items[] = Static::Serialize_ItemFileReadStore($Value, TRUE);
										}
									}
								}
							}
							$Object->items[] = $Item;
						}
					}
				}

				If($Child)
				{
					$JSON = $Object;
				}
				Else
				{
					$JSON = JSON_Encode($Object);
				}
				
				Return $JSON;
			}
		}
	}

?>