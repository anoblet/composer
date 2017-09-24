<?php

namespace Application\Module\Layout\Controller;

use Application\Module\Layout;

class Index extends \Application\Controller {
    public function Index() {
        return Layout::getStaticView("Index.phtml", array("Layout" => Layout::getStaticModel("Layout")));
    }

    public function Navigation() {
        return Layout::getStaticView("Navigation.phtml");
    }

    public function Top() {
        return Layout::getStaticView("Top.phtml");
    }

    public function Left() {
        return Layout::getStaticView("Left.phtml");
    }

    public function Right() {
        return Layout::getStaticView("Right.phtml");
    }

    public function Bottom() {
        return Layout::getStaticView("Bottom.phtml");
    }
}

?>