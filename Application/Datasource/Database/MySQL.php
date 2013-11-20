<?php

	Namespace Application\Datasource\Database
	{
		Class MySQL Extends \Application\Datasource\Database
		{			
			// Protected $Host;
			// Protected $Username;
			// Protected $Password;	

			// Protected $EAV = False;
			
			Private $Connection;
			
			Public Function __Construct($Data = Null)
			{
				parent::__Construct($Data);
			}
			
			Protected Function Connect($Data = Null)
			{
				parent::__Construct($Data);
				$this->Connection = new \mysqli($this->Host,$this->Username,$this->Password);
				
				Return $this->Connection;
			}
			
			Public Function Select_Database($Database = Null)
			{
				mysqli_select_db($this->Connection, $this->Database);
			}
			
			Public Function Load($Data = null)
			{
				If(IsSet($this->Connection));
				Else
				{
					$this->Connect();
					$this->Select_Database();
				}
				If($this->EAV)
				{
					$EAV = New MySQL\EAV();
				}
				
				If(Is_Object($Data))
				{
					$Attributes = $Data->Attributes();
					
					
					If(IsSet($Attributes))
					{
						$Where = "";
						For($X=0;$X<Count($Attributes);)
						{
							ForEach($Attributes as $Attribute => $Value)
							{
								$Query = "SELECT `Object_ID` FROM `OAV` WHERE `Attribute` = '{$Attribute}' AND `Value` = '{$Value}'";		
								$Resource = $this->Query($Query);
								$Attribute_Objects[] = $this->Format_Data_Array($Resource);	
								$X++;
							}
						}

						
						For($X=0;$X<Count($Attribute_Objects);)
						{
							$Filtered_Array = Array_Intersect($Attribute_Objects[$X],$Attribute_Objects[$X++]);
						}
												
						If(IsSet($Filtered_Array['Object_ID']))
						{
							// Load Attributes
							$Object = New \Application\Model();
							$Query = "SELECT * FROM `OAV` WHERE `Object_ID` = '{$Filtered_Array['Object_ID']}'";
							$Resource = $this->Query($Query);
							$Data = $this->Format_Data_Object($Resource);
							
							For($X=0;$X<Count($Data);$X++)
							{
								$Object->Set_Attribute($Data[$X]->Attribute, $Data[$X]->Value);
							}						
							
							// Load Properties
							$Query = "SELECT * FROM `OPV` WHERE `Object_ID` = '{$Filtered_Array['Object_ID']}'";
							$Resource = $this->Query($Query);
							$Data = $this->Format_Data_Object($Resource);
							For($X=0;$X<Count($Data);$X++)
							{
								$Object->{$Data[$X]->Property} = $Data[$X]->Value;
							}
						}
						Else
						{
							
						}
					}
				}
				
				$Data = $Object;
				
				Return $Data;
			}

			Public Function Query($Query)
			{
				$Data = mysqli_query($this->Connection, $Query);
				
				Return $Data;
			}
			
			Public Function Format_Data_Object($Result = Null)
			{
				If($Count = MySQL_Num_Rows($Result) > 0)
				{
					While($Object = MySQL_Fetch_Object($Result))
					{
						$Data[] = $Object;
					}
				}
				Else
				{
					$Data = Array();
				}
				Return $Data;
			}
			
			Public Function Format_Data_Array($Result = Null)
			{
				If($Count = MySQL_Num_Rows($Result) > 0)
				{
					While($Object = MySQL_Fetch_Array($Result, MYSQL_ASSOC))
					{
						$Data = $Object;
					}
				}
				Else
				{
					$Data = Array();
				}
				Return $Data;
			}
			
		}
	}
?>