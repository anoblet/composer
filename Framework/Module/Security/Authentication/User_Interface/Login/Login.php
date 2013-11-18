<?
    Extends Framework\Module\Security\Authentication\Objects\Login
    {
        Class Login
        {
            Public Function Generate()
            {
                $Login  =   New self;
                $Result =   $Login->Generate_Login();
                Return $Result;
            }
            Public Function Generate_Login()
            {
                Try
                {   
                    // Append to session
                    $Template = '/SYSTEM/Module/Security/Authentication/Objects/Login/Template/Login.tpl';  
                    $this->CSS  =   \SYSTEM\Library\Stylesheets\Stylesheets::Generate_Stylesheet(BASE_URL."/SYSTEM/Module/Security/Authentication/Objects/Login/Template/Login.css");
                    $this->Javascript   =   \SYSTEM\Module\Javascript::API()->Load_Javacript(BASE_URL .'/SYSTEM/Module/Security/Authentication/Objects/Login/Javascript/Login.js',NULL);

                       // \SYSTEM\Module\Form\__Interface::Generate_Form()
                    $this->OnClick  =   "Login(this.form)";
                    $this->Login_Interface  = \SYSTEM\Library\Output_Buffer\__Functions::Template_Layer($Template,NULL);
                }
                Catch(\Exception $Exception)
                {
                    $Object->Result =   FALSE;
                    $Object->Exception  =   $Exception;
                }
            Return $this->Login_Interface;   
            }
            Public Function Process_Login()
            {                      
                $Object->Username   =  $_REQUEST['Username'];
                $Object->Password   =   $_REQUEST['Password'];
                \SYSTEM\Module\Security\Authentication\Audit\__API::Process_Login($Object);
                Return;
            }
            /**
            * @todo | Add JQuery Implementation Here
            */
            Public Function __AJAX()
            {
                $Object  =   New \SYSTEM\Library\Objects\API;
                
                $AJAX[]  = Array
                (
                    'Function'      =>    "AJAX",
                    'Parameters'    =>    Array
                    (
                        Array
                        (
                            'Function'     =>   "Process_Form",
                            'Parameters'   =>   "this.parentNode"
                        )
                    )
                );
                $AJAX[] = Array
                (
                    'Function'      =>    "Reload_Page"
                );  
                
                $AJAX   =   \SYSTEM\Library\Conversion::Array_To_Object($AJAX);                

                Return $AJAX;   
            }
        }    
    }
?>
