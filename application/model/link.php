<?php
namespace Application\Model;

class Link extends \Application\Model {
	private $attributes = array (
			"href",
			"rel" => "stylesheet",
			"type" => "text/css" 
	);
	public function __construct()
	{
		parent::__construct();
		$this->setAttribute("rel", "stylesheet");
		$this->setAttribute("type", "text/css");
	}
}
?>