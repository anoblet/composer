<?PHP
	Namespace Framework\Core
	{
		Class Model Extends \Framework\Core
		{
			Const Directory = __DIR__;
			Protected $Context;
			Protected $Model;
			Protected $Data; // TODO
			Protected $Attributes;
			Protected $Attributes_Table; // FIXME
			Public Function __Construct($Parameters = NULL)
			{
				If(IsSet($Parameters))
				{
					If(Is_Array($Parameters) || Is_Object($Parameters))
					{
						ForEach($Parameters as $Parameter => $Value)
						{
							$this->Set_Property($Parameter,$Value);	
						}
					}
				}
				
				$this->Attributes = $this->Retrieve_Attributes();
				
				Return parent::__Construct();
			}
			Public Function Generate($Parameters)
			{debug_print_backtrace();
				If(IsSet($this->Resources['Model']))
				{
					$Model	=	$this->Resources['Model'];
				}
				Else
				{
					$Class = "\\{$this->Retrieve_Property("Class")}\\{$this->Retrieve_Property("Model")}";
					$Model	=	New $Class($Parameters);
				}
				Return $Model;
			}
			Public Function Retrieve_Model($Parameters)
			{
				Print "33333";
				Return self::Generate($Parameters);
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
			// TODO Protected Should be here?
			Public Function Set_Template($Template)
			{
				$this->Template	=	$Template;
				Return $this;
			}
			Public Function Retrieve_Template($Template)
			{
				Return \SYSTEM\Module\Template::Load_Template_Relative($Template);
			}
			Public Function Generate_XML()
			{
				Return \SYSTEM\Module\XML::Generate_XML($this);
			}
			Public Function Generate_HTML()
			{
				// Return \SYSTEM\Module\Template::Load_Template($this->Template);
				Return $this->Data;
			}
		}
	}
?>