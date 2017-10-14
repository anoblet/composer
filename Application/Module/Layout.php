<?php

namespace Application\Module {

    class Layout
    {
        use \Application\Base;

        public function Index() {
            return $this->getView("Index.phtml", array("Layout" => $this->getModel("Layout")));
        }
        public function Navigation() {
            return $this->getView("Navigation.phtml");
        }
        public function Top() {
            return $this->getView("Top.phtml");
        }
        public function Left() {
            return $this->getView("Left.phtml");
        }
        public function Right() {
            return $this->getView("Right.phtml");
        }
        public function Bottom() {
            return $this->getView("Bottom.phtml");
        }
    }
}

?>