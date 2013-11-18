<?PHP
    Extends Framework\Module\Security\Authentication\Objects\Login_Logout
    {
        Class Login_Logout
        {
            Static Public Function Generate()
            {
                If(\SYSTEM\Module\Security\Authentication\Authentication::Authentication_Status())
                 {        
                    $Result =   \SYSTEM\Module\Security\Authentication\Objects\Logout\Logout::Generate();}
                Else
                {                 
                    $Result =   \SYSTEM\Module\Security\Authentication\Objects\Login\Login::Generate();
                }
                Return $Result;                
            }
        }
    }
?>