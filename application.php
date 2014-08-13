<?php
class Application {
	public function __construct() {
		$this->model = new Application\Model\Application();
		// print $this->model;
	}
	public function run() {
		$html = $this->getModel("Application\\Model\\HTML");
		$html->head = $this->getModel("Application\\Model\\Head");
		$link = $this->getModel("Application\\Model\\Link");
		$link->setAttribute("href", "Application/Library/bootstrap/css/bootstrap.min.css");
		$html->head->links[] = $link;
		$link = $this->getModel("Application\\Model\\Link");
		$link->setAttribute("href", "style.css");
		$html->head->links[] = $link;
		$script = $this->getModel("Application\\Model\\Script");
		$script->setAttribute("src","Application/Library/bootstrap/js/bootstrap.min.js");
		//$html->head->scripts[] = $script;
		$html->body = $this->getModel("Application\\Model\\Body");
		// $html->body->application = $this->model;
		$template = $this->getModel("Application\\Model\\Template");
		$template->setAttribute("href", "Application/Template/Layout.html");
		$html->body->template = $template;
		
		print $html;
	}

    public function getModel($model) {
        $model = new $model;
        return $model;
    }
}
?>