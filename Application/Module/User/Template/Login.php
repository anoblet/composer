<?php

namespace Application\Module {

    class User extends \Application\Module
    {
        public function Login($User = null, $Password = null)
        {
            if (isset($User && $Password)) ;
            else {
                $this->Template("Login.php");
            }
        }
    }
}

?>