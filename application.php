<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Let's create an autoloader
require_once("autoloader.php");
spl_autoload_register("autoload");

class Application
{
    public function run()
    {
        $html = $this->getModule("html")->createNode("html");
        $html->head = $this->getModel()->setElement("head");
        $link = $this->getModel()->setElement("link");
        $link->setAttribute("href", "Application/Library/bootstrap/css/bootstrap.min.css");
        $html->head->links[] = $link;
        $link = $this->getModel()->setElement("link");
        $link->setAttribute("href", "style.css");
        $html->head->links[] = $link;
        $script = $this->getModel()->setElement("script");
        $script->setAttribute("src", "//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js");
        $html->head->scripts[] = $script;
        $script = $this->getModel()->setElement("script");
        $script->setAttribute("src", "jQuery.js");
        $html->head->scripts[] = $script;
        $html->body = $this->getModel()->setElement("body");
        $layout = $this->getModel()->setElement("user_interface")->setAttribute("url", "Application/Template/Layout.html");
        $html->body->layout = $layout;

        print $html;
    }

    public function getModel($model = null)
    {
        if (isset($model)) ;
        else {
            $model = "\\Application\\Model";
        }

        $model = new $model;
        return $model;
    }

    public function getModule($module)
    {
        $module = "Application\\Module\\" . $module;
        return new $module;
    }

    public function createDocument()
    {
        $html = new \Application\Module\HTML();
        $html->createDocument();
        $html->setBody($this);

        return $html->toHTML($this);
    }
}

?>