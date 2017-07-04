<?php
namespace Application\Module;

class Settings extends \Application\Module {
    protected function Index() {
        return $this->getView("Settings.phtml");
    }
}
?>