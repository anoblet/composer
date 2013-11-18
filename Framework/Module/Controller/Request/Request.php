<?
Extends Framework\Module\Controller
{
	Class Request Extends \Framework\Module\Controller
	{
		Const Configuration = "Configuration.xml";
		Const Model = "Model\Request";
		Protected $Model = "Model\Request";
		Protected Static $Class = __CLASS__;
		Public Static $Origin;
		Public Static $Type;
		Public Static $Format;
		Public Static $Target;
		Public Static $Object;
		
		Public Function Retrieve_Request()
		{
			// TODO Use xml files for models
			// Return \SYSTEM\Library\XML::Convert_To_Object("Request.mdl");
			$Request	=	Static::Parse(Static::Model()
				->Set_Property("Server",$_SERVER)
				->Set_Property("Session",$_SESSION)
				->Set_Property("Data",$_REQUEST)
				->Set_Property("URI",$_SERVER['REQUEST_URI']));
				Return $Request;
		}
		
		Protected Function Parse($Request)
		{
			$URI = $Request->URI;
			// Lets create an event retrieve the model from the current namespace;
			//$Event	=	self::Retrieve_Model("Event");

			$URL	=	Parse_URL($URI);
			$Path	=	$URL['path'];
			$Model = Static::Model();
			
			// This is the index page
			If($Path === "/");
			$Request_Components =   Explode("/",$Path);
			// Strip off that initial section
			Array_Shift($Request_Components);
			Switch($Request_Components)
			{
				Case 1:
				{

					$Class	=	$Request_Components[0];
					If(Class_Exists($Class));
					Else
					{
						Break;
					}
				}
			}



			$Action_Path	=	"{$Namespace}\\{$Class}\\{$Function}";
			If(Function_Exists($Action_Path))
			{

			}
			// Scenario 2 (Namespace\Class
			$Request_Components =   Explode("/",$Path);
		    Array_Shift($Request_Components);
			$Class		=	Array_Pop($Request_Components);
			$Namespace	=	Implode("\\",$Request_Components);
			// Typical Scenario (Namespace\Class\Function)
			// TODO No need for an object context here?
			$Request_Components =   Explode("/",$Path);
			Array_Shift($Request_Components);
			If(Count($Request_Components) >= 3)
			{
				$Model->Function	=	Array_Pop($Request_Components);
				$Model->Class		=	Array_Pop($Request_Components);
				$Model->Namespace	=	Implode("\\",$Request_Components);
			}
			ElseIf(Count($Request_Components) == 2)
			{
				$Model->Function	=	Array_Pop($Request_Components);
				$Model->Class		=	Array_Pop($Request_Components);
				$Model->Namespace	=	Implode("\\",$Request_Components);
			}
			// FIXME Cleaner Logic

				// TODO Retrieve home page from configuration
				$Model->Set_Property("Class",\SYSTEM\Module\Configuration::API()->Retrieve_Configuration("Default_Class")->Default_Class); // TODO Home Page


				$Model->Set_Property("Function",\SYSTEM\Module\Configuration::API()->Retrieve_Configuration("Default_Function")->Default_Function); // TODO Home Page
				
			//If(Event->Validate_Event());
			Return $Model;
		}
		
		Public Function Retrieve_Model()
		{
			// TODO Use xml files for models
			// Return \SYSTEM\Library\XML::Convert_To_Object("Request.mdl");
			Return Request\Model\Request::API()->Generate_Object();
		}
		Public Function Retrieve_Origin()
		{
			Switch($_REQUEST['Origin'])
			{
				Default:
					{
						$this->Origin   =   "Unknown";
						Break;
					}
				Case "Internal":
					{
						$this->Origin   =   "Internal";
						Break;
					}
				Case "External":
					{
						$this->Origin   =   "External";
					}
			}
			Return $this->Origin;
		}
		/**
		 * Takes request key
		 * Returns cleaned request variable
		 */
		Public Function Retrieve_Parameter($Parameter)
		{
			If(IsSet($_REQUEST[$Parameter]))
			{
				$Result   =   Request\Library::API()->Clean_Data($_REQUEST[$Parameter]);
			}
			Else
			{
				$Result =   FALSE;
			}
			Return $Result;
		}
		Static Protected Function Retrieve_Object()
		{
			Return self::Retrieve_Parameter('Object');
		}
		// Local Context Populating Function
		Public Function Retrieve_Type()
		{
			Try
			{
				$Type   =   $_REQUEST['Type'];
				Switch($Type)
				{
					Default:
						{
							// Throw New \SYSTEM\Module\Exception("Request Type Empty");
							$this->Type   =   "User_Interface";
							Break;
						}
					Case "Sub_User_Interface":
						{
							$this->Type   =     "Sub_User_Interface";
							Break;
						}
					Case "User_Interface":
						{
							$this->Type   =   "User_Interface";
							Break;
						}
					Case "Sub_User_Interface":
						{
							$this->Type   =   "Sub_User_Interface";
							Break;
						}
					Case "SubRoutine":
						{
							$this->Type  =   "SubRoutine";
							Break;
						}
					Case "Function":
						{
							$this->Type  =   "Function";
							Break;
						}
					Case "Template":
						{
							$this->Type  =   "Template";
							Break;
						}
				}
			}
			Catch (\Exception $Exception)
			{
				Throw $Exception;
			}
			Return $this->Type;
		}
		Public Function Retrieve_Referrer()
		{
			Return $_SERVER["HTTP_REFERER"];
		}
		Public Function Retrieve_Request_Format()
		{
			Try
			{
				$Format   =   $_REQUEST['Format'];
				Switch($Format)
				{
					Default:
						{
							// Throw New \SYSTEM\Module\Exception("Request Format Empty");
							$this->Format   =   "XML";
							Break;
						}
					Case "Object":
						{
							$this->Format   =     "Object";
							Break;
						}
					Case "User_Interface":
						{
							$this->Format   =   "User_Interface";
							Break;
						}
					Case "Sub_User_Interface":
						{
							$this->Format   =   "Sub_User_Interface";
							Break;
						}
					Case "SubRoutine":
						{
							$this->Format  =   "SubRoutine";
							Break;
						}
					Case "Function":
						{
							$this->Format  =   "Function";
							Break;
						}
					Case "Template":
						{
							$this->Format  =   "Template";
							Break;
						}
				}
			}
			Catch (\Exception $Exception)
			{
				Throw $Exception;
			}
			Return $this->Format;
		}
		Public Function Retrieve_User_Interface()
		{
			If(IsSet($_REQUEST['User_Interface']))
			{
				$this->User_Interface   =   $_REQUEST['User_Interface'];
			}
			Else
			{
				$this->User_Interface   =   "/SYSTEM/User_Interface/User_Interface.xml";
			}
			Return $this->User_Interface;
		}
	}
}
?>