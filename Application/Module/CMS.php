<?php
namespace Application\Module {

    class CMS extends \Application\Module
    {
        public function Index() {

        }
        public Function Home() {
            return $this->getView("Home.phtml");
        }
    }
}

?>