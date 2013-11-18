<?php

	Extends Framework\Module
	{
		Class CMS Extends \Framework\Module
		{
			Public $Configuration_XML	=	"Configuration.xml";
			Public $Model	=	"Models\CMS";
			Public $Template	=	"Templates\CMS.tpl";
			Protected $XSL = "CMS.xsl";
			
			Public Function __Construct()
			{
				$this->Configuration	=	\SYSTEM\Library\XML::Convert_to_Object($this->Configuration_XML);
				Return parent::__Construct();
			}
			Public Function Under_Construction()
			{
				header("HTTP/1.1 503 Service Temporarily Unavailable");
				header("Status: 503 Service Temporarily Unavailable");
				header("Retry-After: 120");
				header("Connection: Close");

				/* TODO ()->Retrieve_Model*/("Models\CMS");
				$Data =	Static::Model
				(
					Array
					(
						"Title"	=> "Under Construction",
						"Content" => Static::Retrieve_Template("Templates\Vlexo.tpl"),
						"Template" => $this->/* TODO Configuration->*/Template,
					)
				);

				$this->Data	=	$Data;
				Return $this;
			}
			Public Function Generate_HTML()
			{
				Var_Dump(Template::Parse_XSL($this->Data,$this->XSL));
			}
		}
	}

?>