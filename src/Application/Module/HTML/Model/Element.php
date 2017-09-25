<?php

Namespace Application\Module\HTML\Model;

class Element extends \Application\Model
{
    protected $Tag;
    protected $Attributes;

    public function setTag($Tag)
    {
        $this->Tag = $Tag;

        return $this;
    }

    public function getTag()
    {
        return $this->Tag;
    }

    public function setAttributes($Attributes)
    {
        $this->Attributes = $Attributes;
    }

    public function getAttributes()
    {
        return $this->Attributes;
    }

    public function addAttribute($Attribute)
    {
        $this->Attributes[] = $Attribute;
    }
}

?>