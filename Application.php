<?php
// Autoload
require_once("Autoloader.php");
spl_autoload_register("Autoload");

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Application Start
$Application = Application::getSingleton();
$Application->Run();
?>

<?php
class Application
{
    protected static $resource;
    protected $model;

    protected function __construct() {
    }

    protected function autoload($class) {

    }

    public static function getSingleton() {
        if(isset(static::$resource));
        else {
            static::$resource = new Application;
        }

        return static::$resource;
    }

    public function getModule($module) {
        $module = "Application\\Module\\" . $module;
        return new $module;
    }

    public function getModel($Model = null) {
        $Class = get_called_class();
        $Model = "$Class\\Model\\$Model";
        $Model = new $Model;

        return $Model;
    }

    public function Run() {
        $Module = $this->getModule("HTML");

        $HTML = $Module->createElement("HTML")->addChild(
            $Module->createElement("Head")
        )->addChild(
            $Module->createElement("Body")
        );

        var_dump($HTML);

        print $HTML;
    }

}

?>
