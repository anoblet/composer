<?php

namespace Application\Module {

    class User extends \Application\Module
    {
        public function Index() {
            return $this->Login();
        }
        public function Login() {
            var_dump($this->getRequest());
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