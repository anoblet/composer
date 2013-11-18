<?PHP
Namespace Framework
{
	Class Module Extends \Framework\Core
	{
		Const Configuration = NULL;
		// Const Model	=	"";
		// Protected $Configuration;
		// Protected $Class;
		Protected $Module; // Module Name (Relative)
		/*
		Protected Function __Construct($Module)
		{
			$Module	=	"\SYSTEM\Module\\{$this->Module}";
			If(IsSet($this->Configuration));
			Else
			{
				$Configuration = Static::Configuration;
				If(IsSet($Configuration))
				{
					Static::Configuration($Configuration);
					//$this->Model	=	$Module::API()->Retrieve_Model(Static::Model);
				}
			}
				parent::__Construct($Module);
			
		}
		*/
		
		/*
		Protected Function __Construct()
		{
			parent::__Construct();
		}
		*/
		
		Public Function Generate_ID()
		{
			$ID = UniqID();
			Return $ID;
		}
		Public Function Generate_Object()
		{
			$Object = Get_Called_Class() . "";
			$Object =   New $Object;
			//	$Object->Register_Object();
			Return $Object;
		}
		Public Function Generate_Model()
		{
			$Object = Get_Called_Class() . "";
			$Object =   New $Object;
			$Object->Register_Object();
			Return $Object;
		}
		Public Function Retrieve_Template($Template)
		{
			Return \SYSTEM\Module\Template::Load_Template_Relative($Template);
		}
		Public Function Register_Object()
		{
			$this->Attributes['ID'] =   $this->ID   =   self::Generate_ID();
			Return $Object;
		}
		
		Protected Function Configuration($Configuration = NULL)
		{
			If(IsSet($Configuration));
			Else
			{
				$Configuration = Static::Configuration;
				If(IsSet($Configuration));
				Else
				{
					Throw New \Exception("No Configuration Set.");	
				}
			}
			$Configuration = Module\XML::Load_XML($Configuration);
			$this->Configuration = $Configuration;
			Return $Configuration;
		}
		
		Protected Function Datasource($Datasource = NULL)
		{
			Return Module\Datasource::API()->Generate($Datasource);
		}
		
		Public Function Generate_HTML()
		{
			// FIXME This is a generic
			Return $this->Data;
		}
		Function __Destruct()
		{

		}
	}

}
?>