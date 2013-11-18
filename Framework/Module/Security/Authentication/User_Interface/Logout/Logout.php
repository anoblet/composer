<?
    Extends Framework\Module\Security\Authentication\Objects\Logout
    {
        Class Logout
        {
            Static Public Function Generate()
            {     
                $Logout =   New self;       
                $Result =   $Logout->Generate_Logout();
                
                Return $Result;
            }
            Public Function Generate_Logout()
            {
                                    $this->CSS  =   \SYSTEM\Library\Stylesheets\Stylesheets::Generate_Stylesheet(BASE_URL."/SYSTEM/Module/Security/Authentication/Objects/Logout/Template/CSS/Logout.css");
                $this->Javascript = \SYSTEM\Module\Javascript::API()->Load_Javacript(BASE_URL. "SYSTEM/Module/Security/Authentication/Objects/Logout/Javascript/Logout.js");  
                $this->OnClick   =   "Logout()";
                $Template   =   "/SYSTEM/Module/Security/Authentication/Objects/Logout/Template/Logout.tpl";
                $Result =   \SYSTEM\Library\Output_Buffer\__Functions::Template_Layer($Template,NULL);
                Return $Result;
            }
        /**
        * @Internal
        * Generating OnClick Events etc.  Main encapsulation.
        */
            Public Function Generate_Javascript()
            {
                $Javascript =   "Logout();";
                Return $Javascript;
            }
            Static Public Function Process_Logout()
            {
                \SYSTEM\Module\Security\Authentication\Authentication::Logout();
                Return;
            }
        }    
    }
?>