<?php

namespace Application\Module\Layout\Controller;

// use Application\Module\Layout;

class Index {
    use \Application\Controller;
  
    public function Index() {
        return $this->View("Layout/Index.phtml");
    }

    public function Navigation() {
        return $this->View("Layout/Navigation.phtml");
    }

    public function Top() {
        return $this->View("Layout/Top.phtml");
    }

    public function Left() {
        return $this->View("Layout/Left.phtml");
    }

    public function Right() {
        return Layout::getStaticView("Right.phtml");
    }

    public function Bottom() {
        return Layout::getStaticView("Bottom.phtml");
    }
}

?>
