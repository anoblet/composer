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
        $html = $this->getModel()->setElement("html");
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
        $layout = $this->getModel()->setElement("user_interface")->setAttribute("url", "Application/Template/Layout.html");
        $html->body->layout = $layout;

		print $html;
	}

    public function getModel($model = null) {
        if(isset($model));
        else {
            $model = "\\Application\\Model";
        }

        $model = new $model;
        return $model;
    }
}
?>