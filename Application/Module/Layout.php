<?php

namespace Application\Module {

    class Layout extends \Application\Module
    {
        protected function Index() {
            return $this->getView("Index.phtml", array("Layout" => $this->getModel("Layout")));
        }
        protected function Navigation() {
            return $this->getView("Navigation.phtml");
        }
        protected function Bottom() {
            return $this->getView("Bottom.phtml");
        }
    }
}

?>