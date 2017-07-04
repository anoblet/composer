<?php

namespace Application\Module {

    class User extends \Application\Module
    {
        public function Index() {
            return $this->Login();
        }
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
            if (isset($User) && isset($Password)) ;
            else {
                $View = $this->getView("Login.phtml");
            }

            return $View;
        }
        protected function Info() {
            $User = $this->getModel("User");
            $View = $this->getView("User.phtml", array("User" => $User));

            return $View;
        }
    }
}

?>