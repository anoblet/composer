<?php
namespace Application;

class Model {
	private $attributes = array ();
	private $classes = array();
	
	public function __construct() {
		$this->addClass(strtolower($this->__getClass()));
		$class = implode(" ", $this->classes);
		$this->attributes ['class'] = $class;
	}
	public function __toString() {
		$html = new \Application\Module\HTML();
		return $html->toHTML($this);
	}
	public function __getClass() {
		$fullClass = get_class($this);
		$classParts = explode("\\", $fullClass);
		$class = array_pop($classParts);
		
		return $class;
	}
	public function __getNamespace() {
		$fullClass = get_class($this);
		$classParts = explode("\\", $fullClass);
		array_pop($classParts);
		$namespace = implode("\\", $classParts);
		
		return $namespace;
	}
	public function __getAttributes() {
		return $this->attributes;
	}
	public function setAttribute($attribute, $value) {
		$this->attributes [$attribute] = $value;
	}
	public function addClass($class) {
		$this->classes[] = $class;
	}
}
?>
