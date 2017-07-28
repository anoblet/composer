<?php
namespace Application\Module {

    class CMS extends \Application\Module
    {
        public Function Home() {
            return $this->getView("Home.phtml");
        }
    }
}

?>