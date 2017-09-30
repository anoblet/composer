<?php
namespace Application\Module\User\Model;

class User extends \Application\Model
{
    protected $firstName = "Andy";
    protected $lastName = "Noblet";
    protected $Email;
    protected $Password;

    /**
     * @param mixed $Email
     */
    public function setEmail($Email) {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password) {
        $this->Password = $Password;
        return $this;
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