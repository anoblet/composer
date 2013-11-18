<?PHP
	Namespace Framework\Core
	{
		Class Data Extends \Framework
		{
			Public Function __Construct($Parameters = NULL)
			{
				If(IsSet($Parameters))
				{
					ForEach($Parameters as $Parameter => $Value)
					{
						$this->Set_Property($Parameter,$Value);	
					}
				}
				
				$this->Attributes = $this->Retrieve_Attributes();
				
				Return parent::__Construct();
			}
			Public Function __toString()
			{
				Return $this->Generate_XML();
			}
			Protected Function Set_Property($Property, $Value = NULL)
			{
				If(Property_Exists($this,$Property))
				{
					$this->{$Property}	=	$Value;
				}
				Else
				{

					// TODO What if the property doesn't exist.?
				}
				Return $this;

			}
			
			Protected Function Retrieve_Attributes()
			{
				// FIXME
				If(IsSet($this->Attributes_Table))
				{
					$Attributes	= Static::$Datasource
						->Generate_Query("Retrieve")
						->Set_Database('raheimsg_SYSTEM')
						->Set_Table($this->Attributes_Table) // TODO Attributes_Table
						->Execute()
						->Data;
				}
				Return $Attributes;
			}
			
			Public Function Generate_HTML()
			{
				$HTML = \SYSTEM\Module\XML::Generate_XML
				(
					\SYSTEM\Module\XML::Generate_XML
					(
						$this
					)
				);
				
				Return $HTML;	
			}
			/*
			Public Function Generate_XML()
			{
				$XML = \SYSTEM\Module\XML::Generate_XML
				(
					\SYSTEM\Module\XML::Generate_XML
					(
						$Data
					)
				);
				Return $XML;
			}
			*/
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
						'rootName' => $this->Element
					)
				);
				$Serializer->Serialize($this);
 				$XML = $Serializer->getSerializedData();
				Return $XML;
			}
			
		}
	}
?>