<?php
namespace Application;

use Application\Model\Application;

class Model extends \Application
{
    private $Element;
    private $Attributes = array();
    private $classes = array();
    private $children = array();
    protected $Template;

    public function __construct()
    {
        $this->setElement($this->__getClass());
        $this->addClass($this->__getClass());
        $class = implode(" ", $this->classes);
        $this->Attributes ['class'] = $class;
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
        $this->Attributes[$attribute] = $value;

        return $this;
    }

    public function getAttribute($attribute) {
        return $this->Attributes[$attribute];
    }

    public function getAttributes()
    {
        return $this->Attributes;
    }

    public function addClass($class)
    {
        $this->classes[] = $class;
    }

    public function setElement($Element)
    {
        $this->Element = $Element;

        return $this;
    }

    public function getElement()
    {
        $Element = $this->Element;

        return $Element;
    }

    public function Element($Element = null) {
        if(isset($Element)) {
            $this->Element = $Element;
        }
        return $this->Element;
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

    protected function Template() {
        ob_start();
        include($this->getTemplate());
        $HTML = ob_get_contents();
        ob_get_clean();

        return $HTML;
    }

    protected function getTemplate() {
        $Template = "Application" . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $this->__getClass() . ".phtml";

        return $Template;
    }

    public function toHTML() {
        $HTML = $this->getModule("HTML")->serialize($this);

        return $this;
    }

    public function getClass() {
        $class = $this->__getClass();

        return $class;
    }
}

?>
