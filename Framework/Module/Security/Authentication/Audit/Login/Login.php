<?
    Extends Framework\Module\Security\Authentication\Audit
    {
        Class Login Extends \Framework\Module\Security\Authentication
        {
            Public $CSS;
            Public $Javascript;
            Public $OnClick;
            Protected Static $_Template  = '/SYSTEM/Module/Security/Authentication/Audit/Login/Template/Login.tpl';
            Public Function Generate()
            {
                Static::$Diagnostics->Log_Append("Generating the login form.");
                Try
                {    
                    $this->CSS  =   \SYSTEM\Library\Stylesheets\Stylesheets::Generate_Stylesheet(BASE_URL."/SYSTEM/Module/Security/Authentication/Audit/Login/Template/Login.css");
                    $this->Javascript   =   \SYSTEM\Module\Javascript::API()->Load_Javacript(BASE_URL .'/SYSTEM/Module/Security/Authentication/Audit/Login/Javascript/Login.js',NULL);
                
                       // \SYSTEM\Module\Form\__Interface::Generate_Form()
                    $this->OnClick  =   "Login(this.form)";
                    $Result  = \SYSTEM\Module\Template::Load_Template(self::$_Template);
                }
                Catch(\Exception $Exception)
                {
                    static::$Diagnostics->Log_Append("Error generating the login form.");
                    static::$Diagnostics->Log_Append($Exception);
                    $Result =   FALSE;
                }
                Return $Result;   
            }
            Public Function Process()
            {                                                     
                Try
                {
                    $this->Username   =  $_REQUEST['Username'];
                    $this->Password   =   $_REQUEST['Password'];
                If(\SYSTEM\Module\Security\Authentication\Audit::Process($this))
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
                $this->Result   =   \SYSTEM\Module\Template::Load_Template($XML_Template);
                }
                Catch(\Exception $Exception)
                {
                    static::$Diagnostics->Log_Append("Error Authenticating: {$Exception}");
                    Throw $Exception;
                }
                Return $this->Result;
            }
        }    
    }
?>
