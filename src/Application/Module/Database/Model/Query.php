<?php
namespace Application\Module\Database\Model;

class Query extends \Application\Model
{
    protected $Action;
    protected $Fields;
    protected $Table;
    protected $Arguments;

    /**
     * @return mixed
     */
    public function getAction() {
        return $this->Action;
    }

    /**
     * @param mixed $Action
     */
    public function setAction($Action) {
        $this->Action = $Action;
    }

    /**
     * @return mixed
     */
    public function getFields() {
        return $this->Fields;
    }

    /**
     * @param mixed $Fields
     */
    public function setFields($Fields) {
        $this->Fields = $Fields;
    }

    /**
     * @return mixed
     */
    public function getTable() {
        return $this->Table;
    }

    /**
     * @param mixed $Table
     */
    public function setTable($Table) {
        $this->Table = $Table;
    }

    /**
     * @return mixed
     */
    public function getArguments() {
        return $this->Arguments;
    }

    /**
     * @param mixed $Arguments
     */
    public function setArguments($Arguments) {
        $this->Arguments = $Arguments;
    }
}

?>