<?php
namespace Application;

class Model {
	private $attributes = array ();
	public function __construct() {
		$fullClass = get_class($this);
		$classParts = explode("\\", $fullClass);
		$class = array_pop($classParts);
		$this->attributes ['class'] = $class;
	}
	public function _getClass() {
		$fullClass = get_class($this);
		$classParts = explode("\\", $fullClass);
		$class = array_pop($classParts);
	
		return $class;
	}
	public function _getAttributes() {
		return $this->attributes;
	}
}
?>