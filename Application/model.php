<?php
namespace Application;

class Model {
	private $attributes = array ();
	public function __construct() {
		$this->attributes ['class'] = strtolower($this->_getClass());
	}
	public function __toString() {
		$html = new \Application\Library\HTML();
		return $html->toHTML($this)->getHTML();
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
	public function setAttribute($attribute, $value)
	{
		$this->attributes[$attribute] = $value;
	}
}
?>
