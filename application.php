<?php
class Application {
	public function __construct() {
		$this->model = new Application\Model\Application();
		print $this->model;
	}
	public function run() {
		$html = new Application\Model\HTML;
		$html->head = new Application\Model\Head;
		$link = new Application\Model\Link;
		$link->setAttribute("href", "Application/Library/bootstrap/css/bootstrap.min.css");
		$html->head->links[] = $link;
		$link = new Application\Model\Link;
		$link->setAttribute("href", "style.css");
		$html->head->links[] = $link;
		$script = new Application\Model\Script;
		$script->setAttribute("src","Application/Library/bootstrap/js/bootstrap.min.js");
		$html->head->scripts[] = $script;
		$html->body = new Application\Model\Body;
		$html->body->application = $this->model;
		
		print $html;
	}
}
?>