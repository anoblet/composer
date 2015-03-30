<?php
require_once("autoloader.php");
spl_autoload_register("autoload");
?>

<?php
$application = Application::getInstance();
$application->start();
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Application
{
    protected static $_resource;
    public $html;

    protected function __construct()
    {
        $request = $this->getModule("Request")->getModel("Request")->parse($_REQUEST);
    }

    public function run()
    {
        $request = $this->getModule("Request")->getModel("Request");
        // $this->getModule("Controller");
        // $data = $this->parse($request);
        $response = $this->getModule("Response")->getModel("Response");
        // $html = $this->getModule("HTML");
        // $response = $html->createDocument()->addNode($html->createElement("html"));
        // $html = $this->getModule("html")->createNode("html");
        $response->head = $this->getModel()->setElement("head");
        $link = $this->getModel()->setElement("link");
        $link->setAttribute("href", "Application/Library/bootstrap/css/bootstrap.min.css");
        $response->head->links[] = $link;
        $link = $this->getModel()->setElement("link");
        $link->setAttribute("href", "style.css");
        $response->head->links[] = $link;
        $script = $this->getModel()->setElement("script");
        $script->setAttribute("src", "//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js");
        $response->head->scripts[] = $script;
        $script = $this->getModel()->setElement("script");
        $script->setAttribute("src", "jQuery.js");
        $response->head->scripts[] = $script;
        $response->body = $this->getModel()->setElement("body");
        $layout = $this->getModel()->setElement("user_interface")->setAttribute("url", "Application/Template/Layout.html");
        $response->body->layout = $layout;

        print $response;
    }

    public function start()
    {
        $this->run();
    }

    public static function getInstance()
    {
        if (isset(static::$_resource)) ;
        else {
            static::$_resource = new Application;
        }
        return static::$_resource;
    }

    public function html()
    {
        return $this->html;
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
        $module = "Application\\Modules\\" . $module;
        return new $module;
    }

    public function createDocument()
    {
        $this->html = new \Application\Module\HTML();
        $this->html->createDocument();
        $this->html->setBody($this);

        return $this->html->toHTML($this);
    }
}

?>
