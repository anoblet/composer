<?php

namespace Application\Module {

    class Layout extends \Application\Module
    {
        protected function Index() {
            return $this->getView("Layout.phtml", array("Layout" => $this->getModel("Layout")));
        }
        protected function Bottom() {
            return $this->getView("Bottom.phtml");
        }
    }
}

?>