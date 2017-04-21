<?php
namespace Application\Module\HTML\Model;

class Element extends \Application\Model
{
    public function setName($name) {

        $this->label = $element;

        return $this;
    }

    public function setLabel($Label) {
        $this->Label = $Label;

        return $this;
    }

    public function getLabel() {
        $Label = $this->Label;

        return $Label;
    }
}

?>