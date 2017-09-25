<?php
namespace Application\Module\Database\Model;

class Connection extends \Application\Model
{
    protected $User;
    protected $Password;
    protected $Database;

    /**
     * @return mixed
     */
    public function getUser() {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User) {
        $this->User = $User;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->Password;
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
    public function getDatabase() {
        return $this->Database;
    }

    /**
     * @param mixed $Database
     */
    public function setDatabase($Database) {
        $this->Database = $Database;
    }
}

?>