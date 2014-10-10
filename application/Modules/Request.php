<?php
namespace Application\Modules;

class Request extends \Application\Modules\Module
{
    protected $ajax;

    public function __construct()
    {
        $this->_model = $this->getModel();
        if (isset($_REQUEST['ajax'])) {
            $this->_model->_ajax = true;
        }
    }

    public function parse()
    {

    }
}

?>