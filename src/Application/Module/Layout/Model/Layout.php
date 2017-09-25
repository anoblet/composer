<?php
namespace Application\Module\Layout\Model;

class Layout extends \Application\Model
{
    protected $Title = "My Site";
    protected $Copyright = "&copy; Andy Noblet 2016";
    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->Copyright;
    }
    public function getTitle()
    {
        return $this->Title;
    }
}

?>