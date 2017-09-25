<?php
namespace Application\Module;

class Settings extends \Application\Module {
    public function Index() {
        return $this->getView("Settings.phtml");
    }
}
?>