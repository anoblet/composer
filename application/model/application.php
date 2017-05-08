<?php
namespace Application\Model;

class Application extends \Application\Model {
    protected $title;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}
?>