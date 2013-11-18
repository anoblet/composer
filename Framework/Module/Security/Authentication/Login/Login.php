<?
Extends Framework\Module\Security\Authentication
{
	Class Login Extends \Framework\Module\Security\Authentication
	{
		Const Anonymous_Username    =   "Anonymous";
		Public /*Protected*/ $CSS;
		Public /* Protected */ $Javascript;
		Public /* Protected */ $OnClick;
		Public /* Protected */ $_Template  = '/SYSTEM/Module/Security/Authentication/Login/Template/Login.tpl';
		Public /* Protected */ $XSL  = Array
		(
                "Form"          =>  "/Template/Login.tpl",
                "Small_Form"    =>  "/Template/Small_Form.xsl"
                );

                Public Function Generate_Form()
                {
                	// Harvest the referencing url
                	$Refferal_URL   =   Static::$Request->Retrieve_Referrer();
                	// Store it in the session
                	Static::$Session->Set_Parameter("Refferal_URL",$Refferal_URL);
                	Static::$Diagnostics->Log_Append("Generating the login form.");
                	Try
                	{
                		If($this->Username   = Static::$Request->Retrieve_Request()->Retrieve_Parameter("Username"));
                		ElseIf(\SYSTEM\Module\Configuration::API()->Retrieve_Configuration('Allow_Anonymous_Login'))
                		{
                			$this->Username =   self::Anonymous_Username;
                		}

                		$this->CSS  =   \SYSTEM\Library\Stylesheets\Stylesheets::Generate_Stylesheet(BASE_URL."/SYSTEM/Module/Security/Authentication/Login/Template/Login.css");
                		$this->Javascript   =   \SYSTEM\Module\Javascript::API()->Load_Javacript(BASE_URL .'/SYSTEM/Module/Security/Authentication/Login/Javascript/Login.js',NULL);

                		// \SYSTEM\Module\Form\__Interface::Generate_Form()
                		$this->OnClick  =   "Login(this.form)";
                		$Result  = \SYSTEM\Module\Template::Load_Template($this->_Template);
                	}
                	Catch(\Exception $Exception)
                	{
                		static::$Diagnostics->Log_Append("Error generating the login form.");
                		static::$Diagnostics->Log_Append($Exception);
                		$Result =   FALSE;
                	}
                	$this->Data	=	$Result;
                	Return $this;
                }
                Public Function Generate_Form_Small()
                {
                	Return;
                }

                Protected Function Set_CSS($CSS)
                {
                	$this->CSS  =   $CSS;
                	Return $this;
                }
                Protected Function Set_Javascript($Javascript)
                {
                	$this->Javascript   =   $Javascript;
                	Return $this;
                }

                Public Function Process()
                {
                	Try
                	{
                		$this->Username   = Static::$Request->Retrieve_Request()->Retrieve_Parameter("Username");
                		$this->Password   = Static::$Request->Retrieve_Request()->Retrieve_Parameter("Password");
                		If(Adapters\MySQL::Authenticate())
                		{
                			$this->Message  =   "Login Successfull.";
                			$this->Result =   TRUE;
                			static::$Diagnostics->Log_Append("You have been authenticated succesfully");
                		}
                		Else
                		{
                			$this->Result =   FALSE;
                			static::$Diagnostics->Log_Append("Authentication Unsuccessfull");
                		}
                		$XML_Template    =   "/SYSTEM/Module/Security/Authentication/Audit/Login/Return_Objects/Login_Request.xml";
                		//$this->Result   =   \SYSTEM\Module\Template::Load_Template($XML_Template);
                	}
                	Catch(\Exception $Exception)
                	{
                		static::$Diagnostics->Log_Append("Error Authenticating: {$Exception}");
                		Throw $Exception;
                	}
                	$this->Data   =   \SYSTEM\Module\Controller::API()->Load_Object("/User_Interface/Generate_User_Interface","Body");
                	Return $this;
                }
	}
}
?>
