<?php
// Autoload
require_once("Autoloader.php");
spl_autoload_register("Autoload");

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Application Start
$Application = Application::getSingleton();
$Application->Start();
?>

<?php
class Application
{
    protected static $resource;
    protected $model;

    protected function __construct() {
    }

    public static function getSingleton() {
        if(isset(static::$resource));
        else {
            static::$resource = new Application;
        }

        return static::$resource;
    }

    public function getModule($Module) {
        $Module = "Application\\Module\\" . $Module;
        return new $Module;
    }

    public function getModel($Model = null) {
        $Class = get_called_class();
        $Model = "$Class\\Model\\$Model";
        $Model = new $Model;

        return $Model;
    }

    protected function Autoload($class) {
        $class = strtolower($class);
        $file = $class . ".php";
        if (file_exists($file)) {
            include($file);
        }
    }

    public function Start() {
        $Module = $this->getModule("HTML");

        $HTML = $Module->createElement("HTML")->addChild(
            $Module->createElement("Head")->addChild(
                $Module->createElement("Title")
            )
        )->addChild(
            $Module->createElement("Body")
        );

        $Application = $this->getModel("Application")->Template();
        
        print $HTML;
    }
}
?>
