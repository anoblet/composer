<?PHP
Extends Framework\Module
{

	Class User_Interface Extends \Framework\Module
	{
		// Retrieve the Format of the Output
		Public Static $Format;

		Public Static $Response;

		Public Static $Type;
		// To directly propose the content
		Public Static $Content;
		// A layout to user.
		Public Static $Layout;
		// To load the content within a template structure;
		Public Static $User_Interface;

		Public Function Format_Conversion()
		{
			Try
			{
				Switch(\SYSTEM\Module\Controller\Request::$Format)
				{

				}
			}
			Catch (\Exception $Exception)
			{
				Throw $Exception;
			}
			Return $this;
		}
		Public Function Initialize()
		{
			static::$Diagnostics->Log_Append("Initializing the User Interface");
			// This is a dependencey and dtaeriorates the interopability of individualized functions
			$this->Type  =   \SYSTEM\Module\Controller\Request::API()->Retrieve_Type();
			$this->User_Interface = \SYSTEM\Module\Controller\Request::$User_Interface;
			static::$Diagnostics->Log_Append("Format: {$Format}");
			 
			Switch($this->Type)
			{
				// Need Default Function
				Default:
					{
						/** @internal Is this safe? **/
						self::$Type =   "XML";
						Break;
					}
				Case "User_Interface":
					{
						/** @todo | modularize No nests **/
						If(IsSet(self::$User_Interface))
						{
							$User_Interface   =   self::$User_Interface;
						}
						Else
						{
							$User_Interface = \SYSTEM\Module\Controller\Request::$User_Interface;
						}

						\SYSTEM\Module\Template::API()->Content = $this->Retrieve_Sub_User_Interface($User_Interface);
						$this->Result = \SYSTEM\Module\Template::API()->Generate_HTML_Document("Document");
						Break;
					}
				Case "XML":
					{
						\SYSTEM\Module\Template::API()->Content = self::$Content;
						$this->Result = \SYSTEM\Module\Template::API()->Generate_HTML_Document("Document");
						Break;
					}
				Case "Sub_User_Interface":
					{
						Break;
					}
					/* Case "Component":
					 {
					 $Result =   $this->User_Interface;
					 }*/
			}
			// Override and messy
			/* If(IsSet(self::$Content))
			 {
			 \SYSTEM\Module\Template::API()->Content = self::$Content;
			 $this->Result = \SYSTEM\Module\Template::API()->Generate_HTML_Document("Document");
			 }

			 /**
			 * @todo Load Javascript Within Template
			 * Result Should not be printed here;
			 *
			 */
			static::$Diagnostics->Log_Append("Finished Initializing User Interface Sub-System");

			Return $this->Result;
		}
		Public Function Generate_User_Interface()
		{
			$Output =   \SYSTEM\Module\Template::Load_Template("/SYSTEM/User_Interface/User_Interface.tpl");
			Return $Output;
		}
		Public Function Set_Template($Template)
		{
			$this->Template =   $Template;
			Return;
		}
		Public Function Set_Content($Content)
		{
			$this->Content  =   $Content;
			Return $this;
		}
		Public Function Set_User_Interface($User_Interface)
		{
			$this->User_Interface   =   $User_Interface;
			Return $this;
		}
		Public Function Retrieve_Sub_User_Interface($User_Interface)
		{
			$Result =   \SYSTEM\Module\Template::Load_Template($User_Interface);

			Return $Result;
		}
		Public Function Generate_Document()
		{
			Return $Document;
		}
		Public Static Function Generate_Window($Content)
		{
			$Result =   \SYSTEM\Module\Template::Load_Template('Template/Window.tpl');
			Return $Result;
		}
	}
}
?>