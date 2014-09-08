<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
// Let's create an autoloader
require_once ("autoloader.php");
spl_autoload_register("autoload");

class Application {
	public function __construct() {
		// $this->model = new Application\Model\Application();
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
        $script->setAttribute("src","//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js");
        $html->head->scripts[] = $script;
        $script = $this->getModel("Application\\Model\\Script");
        $script->setAttribute("src","jQuery.js");
        $html->head->scripts[] = $script;
		$html->body = $this->getModel("Application\\Model\\Body");
		// $html->body->application = $this->model;
        $model = $this->getModel("Application\\Model");
        $model->setElement("user_interface");
        $model->setAttribute("url", "Application/Template/Layout.html");
        $html->body->layout = $model;
		// $template = $this->getModel("Application\\Model\\Template");
		// $template->setAttribute("url", "Application/Template/Layout.html");
		// $html->body->template = $template;

		print $html;
	}

    public function getModel($model) {
        $model = new $model;
        return $model;
    }
}
?>