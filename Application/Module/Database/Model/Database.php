<?php
namespace Application\Module\Database\Model;

class Database extends \Application\Model
{
    protected $User;
    protected $Password;
    protected $Name;



    /**
     * @return mixed
     */
    public function setUser($User) {
        $this->User = $User;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser() {
        return $this->User;
    }

    /**
     * @return mixed
     */
    public function setPassword($Password) {
        $this->Password = $Password;
        return $this->Password;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->Password;
    }

    /**
     * @return mixed
     */
    public function setName($Name) {
        $this->Name = $Name;
        return $this->Name;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->Name;
    }

    public function Connect() {
        $$this->Connection = mysqli_connect("localhost",$Database->getUser(), $Database->getPassword(), $Database->getName());
    }
}

?>