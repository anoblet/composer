<?php
namespace Application\Modules\Response\Models;

class Response extends \Application\Model
{
    public $_format;

    public function __construct()
    {
        if(isset($_REQUEST['format'])) {
            $this->_format = $_REQUEST['format'];
        }
        else {
            $this->_format = "HTML";
        }
    }

    public function getFormat($format)
    {
        return $this->getModule($format)->getResponse();
    }
}

?>