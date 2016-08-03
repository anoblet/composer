<?php
require_once("autoloader.php");
spl_autoload_register("autoload");
?>

<?php
$Application = Application::getInstance();
$Application->start();
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function Application () {
    $Application = new Application();

    return $Application;
}

class Application
{
    protected static $_resource;

    protected function __construct() {
        $request = $this->getModule("Request")->getModel("Request")->parse($_REQUEST);
    }

    public function start() {
        // $request = $this->getModule("Request")->getModel("Request");

        $this->getModule("HTML")->getModel("HTML");

        $response = $this->getModule("Response")->getModel("Response")->addChild(
            $this->getModel()->setElement("html")->addChild(
                $this->getModel()->setElement("head")
            )
        );

        print $response;
    }

    public static function getInstance() {
        if (isset(static::$_resource)) ;
        else {
            static::$_resource = new Application;
        }
        return static::$_resource;
    }

    public function getModel($model = null) {
        if (isset($model)) ;
        else {
            $model = "\\Application\\Model";
        }

        $model = new $model;
        return $model;
    }

    public function getModule($module) {
        $module = "Application\\Modules\\" . $module;
        return new $module;
    }
}

?>
