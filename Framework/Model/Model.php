<?php

	Namespace Framework
	{
		Class Model Extends \Framework\Core
		{
			Protected $_Element = NULL;
			Public Function __toString()
			{
				Return $this->Generate_XML();
			}
			Protected Function Generate($Parameters = NULL)
			{
				Return New Static($Parameters);
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
					    'encoding'        => "UTF-8",
						'rootName' => $this->_Element,
						'attributesArray' => "_attributes",
					    'defaultTagName'  => "Item"
					)
				);
				$Serializer->Serialize($this);
 				$XML = $Serializer->getSerializedData();
				Return $XML;
			}
		}	
		
	}