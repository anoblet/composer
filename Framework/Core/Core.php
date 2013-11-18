<?PHP
	Namespace Framework
	{
		Class Core Extends \Framework
		{
			Const Configuration = NULL;
			
			Protected $Class;
			
			Protected Static $Controller;
			Protected Static $Template;
			Protected Static $Resources;
			Public Static $Diagnostics;
			Protected Static $Environment;
			Protected Static $Request;
			Protected Static $Session;
			Protected Static $User_Interface;
		
			/**
			 * API
			 * Singleton Instance Retriever
			 * @param  $Parameters
			 */
			
			/*
			
			Protected Function __Construct()
			{
				$this->Class = Get_Called_Class();
				
			}
			
			*/
			
			Protected Function Core()
			{
				Return Core::API();	
			}
			
			Final Public Static Function API($Parameters    =   NULL)
			{
				$Class  =   Get_Called_Class();
				If(IsSet(Static::$Resources[$Class]));
				Else
				{
					Static::$Resources[$Class]    =   New $Class($Parameters);
				}
				Return Static::$Resources[$Class];
			}
			/*
			Public Function __Set($Parameter, $Value)
			{
				Print "Setting {$Parameter} = {$Value}";
			}
			Public Function __Get($Parameter)
			{

			}
			*/
			/**
			 * TODO Retrieve the current class
			 */
			/*
			Protected Function Retrieve_Class()
			{
				Return __CLASS__;
			}
			*/
			Protected Function Retrieve_Class_Directory($Class = NULL)
			{
				If($Class);
				Else
				{
					$Class  =   Get_Called_Class();
				}
				Return "/" . Str_Replace("\\","/",$Class) . "/";
			}
			// Should this be relative or absolute
			Protected Function Configuration($Configuration = NULL)
			{
				If(IsSet($Configuration));
				ElseIf($Configuration = Static::Configuration)
				{
					$Configuration = Module\XML::Load_XML($Configuration);
				}

				Return $Configuration;
			}

			Protected Function Model($Parameters = NULL)
			{	
				Return Core\Model::Retrieve_Model($Parameters);
			}
			Protected Function Retrieve_Model_Absolute($Model)
			{
				Return New $Model;
			} 	 	
			/*
			Protected Function Template()
			{
				Return \SYSTEM\Module\Template::Load_Template_Relative($this->Template);
			}
			*/

			Protected Function Bootstrapper()
			{
			
				Try
				{
					Static::$Diagnostics = Static::SYSTEM()->Module()->Diagnostics();
					Static::SYSTEM()->Module()->Environment()->Initialize();
					// Load all of our libraries
						//Module\Bootstrapper::Initialize();
					// Let's retrieve our environment configuration;
					// Lets give everybody access to the request
					Static::$Request	=	Module\Controller\Request::API()->Retrieve_Request();
					Static::$Diagnostics->Log_Append
					(
						Array
						(
							"Request" => Static::$Request
						)
					);
					// TODO Data should return an object

					$Data	=	Module\Router::API()->Route(Static::$Request)->Data;
					If($Data);
					Else
					{
						Throw New \Exception("No Data");
					}
					// TODO Render("HTML");
					// TODO The View
						// Throw an error if the data is not an object / response object?
					$XML	=	$Data->Data->Generate_XML();
					
					$HTML	=	$Data->Data->Generate_HTML();
					$Request	=	Static::$Request->Retrieve_Property("Data");
					
					If(IsSet($Request['Type']))
					{
						$Request_Type = $Request['Type'];
					}
					Else
					{
						$Request_Type	=	NULL;
					}
	
					Switch($Request_Type)
					{
						Default:
						{
							$Request_Type = "Document";		
						}
						Case "Document":
						{
							$Result     =   \SYSTEM\Module\Template::API()
								->Set_Content($HTML)
								->Generate_HTML_Document("Document");
								Break;
						}
						Case "Sub_User_Interface":
						{
							$Result	=	$Data_HTML;
							Break;
						}
					}
				}
				Catch(\Exception $Exception)
				{
					Throw $Exception;
				}
				Print $Result;
			}
			/*
			 *  TODO Seperate This
			 *  
			 *  Should this be an array?
			*/
			
			/*
			 * Set property moved to data.
			 */
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
			Protected Function Retrieve_Property($Property)
			{
				If(Property_Exists($this,$Property))
				{
					$Result	=	$this->$Property;
				}
				Return $Result;
			}
			Protected Function Retrieve_Static_Property($Property)
			{
				Return Static::$Property;
			}

			Protected Function Retrieve_Constant($Constant)
			{
				Return Static::Constant($Constant);
			}
			
			// Instance Getter
			Public Function Generate_Object()
			{
				$Object = Get_Called_Class() . "";
				$Object =   New $Object;
				//	$Object->Register_Object();
				Return $Object;
			}
			
			Protected Function Library($Library = NULL)
			{
				If(IsSet($Library))
				{
					$Namespace  = $this->Application()->Namespace;
					
				}
			}
			
			/*
			Protected Function Module($Module = NULL)
			{
				$Class = "\Framework\Module\\" . $Module;
				$Object = New $Class;
				Return $Object;
			}
			*/
			
			Protected Function XML($XML = NULL)
			{
				$XML = $this->Library("XML");
				
			}
			
		}
	}
?>