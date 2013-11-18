<?php
	Namespace Framework\Module
	{
		Class Application Extends \Framework\Module
		{
			// Public $Application;
			
			Public Static $Application;
			
			Private Static $Resource;
			
			
			Function __Construct($Application = Null)
			{
				// Static::$Application = $this;
				
				Static::$Resource = $this;
				
				$this->Datasource = $this->Module("Datasource");
				var_dump($this);
				
				$this->Class = Get_Called_Class();
				
				If(IsSet($Application));
				Else
				{
					
				}
				
				
				// $this->Application = $Application;
				$this->Data = $Application;
				// $this->Data = $Application;
				// Static::Initialize();
			}
			
		    Public Function Application()
			{
				Return Static::$Resource;
			}
			
			/*
			Function Initialize()
			{
				Return New self(__CLASS__);	
			}
			*/
			
			Public Function Initialize()
			{
				Var_Dump($this->XML());
				Return;
			}
			
			Protected Function Bootstrapper()
			{
				$Application = $this->Application;
			}
			Function Load_Configuration()
			{
				 Return Configuration::Load_Configuration($Application::Configuration);
			}
			Public Function Load($Application)
			{
				$Data = New self($Application);
				$XML = $Data->Generate_XML();
				Print "$XML";
				Return $XML;
			}
			Protected Function Generate_XML()
			{
				$Serializer = New \XML_Serializer
				(
					Array
					(
						'addDecl' => TRUE,
						'indent' => '    ',
						/* 'cdata'	=> TRUE, TODO Fix CData and being able to inspect. */
						'simplexml',
						/* 'rootName' => $this->Data->Element TODO */
					)
				);
				$Serializer->Serialize($this->Data);
 				$XML = $Serializer->getSerializedData();
				Return $XML;
			}
			 /* Public Function Load($Application)
			{
				$Class = Get_Called_Class();
				Var_Dump($Class::Configuration);
			}
			*/
		}
	}
?>
