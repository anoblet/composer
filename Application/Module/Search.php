<?php
namespace Application\Module;

class Search extends \Application\Module  {
    protected function Index() {
        return $this->getView("Index.phtml");
    }
}
?>