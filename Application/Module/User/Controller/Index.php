<?php

namespace Application\Module\User\Controller;

use Application;
use Application\Module\User;
use \Application\Module\Database;

class Index extends \Application\Controller {
    public function Index() {
        return $this->Login();
    }

    public function Login() {
        if ($this->getModule("Session")->isUserLoggedIn()) {
            return $this->MyAccount();
        }
        $Message = null;
        $Error = null;

        $Request = $this->getRequest();
        $User = User::getStaticModel("User");

        if (empty($Request['Arguments']['Email'])) {
            $Error = "No email given.";
        } else {
            $User->setEmail($Request['Arguments']['Email']);
            if (empty($Request['Arguments']['Password'])) {
                $Error = "No password given.";
            } else {
                $User->setPassword($Request['Arguments']['Password']);
            }
        }

        if($Error) {
            $Message = $Error;
            $View = User::getStaticView("Login.phtml", array("User" => $User, "Message" => $Message));
        }

        else {
            $Database = $this->getModule("Database");
            $Query = $Database->createQuery();
            $Query->setAction("Select");
            $Query->setFields("*");
            $Query->setTable("User");
            $Query->setArguments(array("Email" => $User->getEmail(), "Password" => $User->getPassword()));

            $Connection = $Database->Connect();

            $Query = "SELECT * FROM `User` WHERE `Email` = '{$User->getEmail()}' AND `Password` = '{$User->getPassword()}'";
            $Resource = mysqli_query($Connection, $Query);
            $Result = mysqli_fetch_array($Resource, MYSQLI_ASSOC);
            if ($Result) {
                $_SESSION['User'] = true;
                $View = User::getStaticView("MyAccount.phtml", array("User" => $User, "Message" => $Message));

            } else {
                $Message = "Invalid username and/or password.";
                $View = User::getStaticView("Login.phtml", array("User" => $User, "Message" => $Message));
            }
        }

        return $View;
    }

    public function MyAccount() {
        if (!$this->getModule("Session")->isUserLoggedIn()) {
            $Controller = $this->getModule("Controller");
            $Controller->setPath("/User/Index/Login");
            return $Controller->Execute();
        } else {
            $View = User::getStaticView("MyAccount.phtml");
        }
        return $View;
    }

    public Function Logout() {
        unset($_SESSION['User']);
        session_destroy();
        $View = $this->getModule("Controller")->setPath("CMS/Index/Home")->Execute();
        // $View = $this->getModule("Contoller")->Execute();

        return $View;
    }

    public function Register() {
        $User = User::getStaticModel("User");
        $Request = $this->getRequest();

        $Message = null;

        if (!empty($Request['Arguments']['Email'])) {
            $User->setEmail($Request['Arguments']['Email']);
        } else {
            $Error = "No email given.";
        }
        if (!empty($Request['Arguments']['Password'])) {
            $User->setPassword($Request['Arguments']['Password']);
        } else {
            $Error = "No password given.";
        }

        if (isset($Error)) {
            return User::getStaticView("Register.phtml", array("Message" => $Error));
        }
        // $Database = $this->getModule("Database");
        $Database = Database::getInstance();
        $Query = $Database->createQuery();
        $Query->setAction("INSERT");
        $Query->setFields("*");
        $Query->setTable("User");
        $Arguments[] = array("Column" => "Email", "Value" => $User->getEmail());
        $Arguments[] = array("Column" => "Password", "Value" => $User->getPassword());
        $Query->setArguments($Arguments);
        $Result = $Database->Execute($Query);

        if ($Result) {
            $Message = "User created.";
        } else {
            $Message = "Could not create user;";
        }

        $View = User::getStaticView("Register.phtml", array("Result" => $Result, "Message" => $Message));

        return $View;
    }

    protected function Info() {
        $User = $this->getModel("User");
        $View = $this->getView("User.phtml", array("User" => $User));

        return $View;
    }
}

?>