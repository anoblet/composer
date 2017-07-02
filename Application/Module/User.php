<?php

namespace Application\Module {

    class User extends \Application\Module
    {
        public function getInfo()
        {
            $User = $this->getModel("User")->Template("User.phtml");
            $Data = array("User" => $User);

            $HTML = $this->getTemplate($Data, "User.phtml");
            // $User->Template();
            // $HTML = $this->getModel("User")->Template(null, $Data);

            return $User;
        }

        public function Login() {
            print "Here";
        }
    }
}

?>