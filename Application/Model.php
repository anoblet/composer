<?php
namespace Application;

class Model extends \Application
{
    private $_element;
    private $_attributes = array();
    private $classes = array();
    private $children = array();

    public function __construct()
    {
        $this->setElement($this->__getClass());
        $this->addClass($this->__getClass());
        $class = implode(" ", $this->classes);
        $this->attributes ['class'] = $class;
    }

    public function __toString()
    {
        $HTML = $this->getModule("HTML");
        return $HTML->serialize($this);
    }

    public function __getClass()
    {
        $fullClass = get_class($this);
        $classParts = explode("\\", $fullClass);
        $class = array_pop($classParts);

        return $class;
    }

    public function __getNamespace()
    {
        $fullClass = get_class($this);
        $classParts = explode("\\", $fullClass);
        array_pop($classParts);
        $namespace = implode("\\", $classParts);

        return $namespace;
    }

    public function setAttribute($attribute, $value)
    {
        $this->_attributes[$attribute] = $value;

        return $this;
    }

    public function getAttribute($attribute) {
        return $this->_attributes[$attribute];
    }

    public function getAttributes()
    {
        return $this->_attributes;
    }

    public function addClass($class)
    {
        $this->classes[] = $class;
    }

    public function setElement($element)
    {
        $this->_element = $element;

        return $this;
    }

    public function getElement()
    {
        $element = $this->_element;

        return $element;
    }

    public function element($element = null) {
        if(isset($element)) {
            $this->_element = $element;
        }
        return $this->_element;
    }

    /*
    public function addChild($property, $child) {
        $this->$property = $child;
    }
    */

    public function addChild($child) {
        array_push($this->children, $child);
        return $this;
    }

    public function getChildren() {
        return $this->children;
    }
}

?>
