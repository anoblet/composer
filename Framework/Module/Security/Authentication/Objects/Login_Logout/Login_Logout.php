<?PHP
    Extends Framework\Module\Security\Authentication\Objects
    {
        Class Login_Logout Extends \Framework\Module\Security\Authentication
        {
            CONST XML      =   "/SYSTEM/Module/Security/Authentication/Objects/Login_Logout/Login_Logout.xml";
            CONST TEMPLATE =   "/SYSTEM/Module/Security/Authentication/Objects/Login_Logout/Login_Logout.tpl";
            Public $Action;
            Public Function Generate()
            {
                Try
                {
                    If($this->Authentication_Status())
                    {
                        $this->Action =   \SYSTEM\Module\Security\Authentication\Objects\Logout::API()->Generate();
                    }
                    Else
                    {
                        $this->Action =   \SYSTEM\Module\Security\Authentication\Login::API()->Generate_Form_Small();
                    }
                    $Result =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
                }
                Catch(\Exception $Exception)
                {
                    $Exception;
                }
				$this->Data	= $Result;
				Return $this;
            }
        }
    }
?>