<?php
namespace Application;

class Model extends \Application
{
    private $Element;
    private $Attributes = array();
    private $classes = array();
    private $children = array();
    private $Template;

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

    public function getNamespace()
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

    protected function getTemplate() {
        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        $Count = count($Parts);
        if($Parts[$Count-2] == "Model") {
            array_splice($Parts, -2, 2);
            $Class = implode("\\", $Parts);
        }
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);
        $Template = $Class . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $this->__getClass() . ".phtml";

        return $Template;
    }

    public function toHTML() {
        $HTML = $this->getModule("HTML")->serialize($this);

        return $this;
    }
}

?>
