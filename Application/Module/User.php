<?php

namespace Application\Module {

    use Application\Module\Database;

    class User extends \Application\Module {
        public function Index() {
            return $this->Login();
        }

        public function Login() {
            if(isset($_SESSION['User'])) {
                return $this->MyAccount();
            }
            $Request = $this->getRequest();
            $User = $this->getModel("User");

            $Error = null;

            if (!empty($Request['Arguments']['Email'])) {
                $User->setEmail($Request['Arguments']['Email']);
            }
            else {
                $Error = "No email given.";
            }
            if (!empty($Request['Arguments']['Password'])) {
                $User->setPassword($Request['Arguments']['Password']);
            }
            else {
                $Error = "No password given.";
            }

            $Database = $this->getModule("Database");
            $Query = $Database->createQuery();
            $Query->setAction("Select");
            $Query->setFields("*");
            $Query->setTable("User");
            $Query->setArguments(array("Email" => $User->getEmail(), "Password" => $User->getPassword()));
            // var_dump($Query);

            $Connection = $Database->Connect();

            $Query = "SELECT * FROM `User` WHERE `Email` = '{$User->getEmail()}' AND `Password` = '{$User->getPassword()}'";
            $Resource = mysqli_query($Connection, $Query);
            $Result = mysqli_fetch_array($Resource, MYSQLI_ASSOC);

            if($Result) {
                $_SESSION['User'] = true;
            }
            else {
                $Message = "Invalid username and/or password.";
            }
            $View = $this->getView("Login.phtml", array("User" => $User));


            return $View;
        }

        protected function Info() {
            $User = $this->getModel("User");
            $View = $this->getView("User.phtml", array("User" => $User));

            return $View;
        }

        public function MyAccount() {
            $View = $this->getView("MyAccount.phtml");

            return $View;
        }

        public Function Logout() {
            session_destroy();
        }
    }
}

?>