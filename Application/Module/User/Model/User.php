<?php
namespace Application\Module\User\Model;

class User extends \Application\Model
{
    public $firstName = "Andy";
    public $lastName = "Noblet";
    protected $Email;
    protected $Password;

    /**
     * @param mixed $Email
     */
    public function setEmail($Email) {
        $this->Email = $Email;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password) {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->Email;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->Password;
    }
}

?>