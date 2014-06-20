<?php
namespace Application;

class Model {
	private $attributes = array ();
	private $classes = array();
	public function __construct() {
		$class = implode(" ", $classes);
		$this->attributes ['class'] = strtolower($this->__getClass());
	}
	public function __toString() {
		$html = new \Application\Library\HTML();
		return $html->toHTML($this)->getHTML();
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
	public function _getAttributes() {
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
