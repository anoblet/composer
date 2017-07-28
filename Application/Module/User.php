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
            else {
                $Error = "No email given.";
            }
            if (!empty($Request['Arguments']['Password'])) {
                $User->setPassword($Request['Arguments']['Password']);
            }
            else {
                $Error = "No password given.";
            }

            $Error = null;

            $Email = $User->getEmail();
            $Password = $User->getPassword();

            if (isset($Email)) {
                if (isset($Password)) ;
                else {
                    $Error = "No password given.";
                }
            } else {
                $Error = "No email given.";
            };

            $Database = $this->getModule("Database");
            $Query = $Database->createQuery();
            $Query->setAction("Select");
            $Query->setFields("*");
            $Query->setTable("User");
            $Query->setArguments(array("Email" => $User->getEmail(), "Password" => $User->getPassword()));
            // var_dump($Query);w

            $Connection = $Database->Connect();

            $Query = "SELECT * FROM `User` WHERE `Email` = '{$User->getEmail()}' AND `Password` = '{$User->getPassword()}'";
            $Resource = mysqli_query($Connection, $Query);
            $Result = mysqli_fetch_array($Resource, MYSQLI_ASSOC);

            if($Result) {
                print "Here";
            }
            else {

            }
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