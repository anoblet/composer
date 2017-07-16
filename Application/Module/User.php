<?php

namespace Application\Module {

    class User extends \Application\Module {
        public function Index() {
            return $this->Login();
        }

        public function Login() {
            $Request = $this->getRequest();
            $User = $this->getModel("User");
            if (!empty($Request['Arguments']['Email'])) {
                $User->setEmail($Request['Arguments']['Email']);
            }
            if (!empty($Request['Arguments']['Password'])) {
                $User->setPassword($Request['Arguments']['Password']);
            }

            $Error = null;

            $Email = $User->getEmail();
            $Password = $User->getPassword();

            if (isset($Email)) ;
            else {
                $Error = "No email given.";
            };
            if (isset($Password)) ;
            else {
                $Error = "No password given.";
            }

            $User->Error = $Error;

            $View = $this->getView("Login.phtml", array("User" => $User));

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