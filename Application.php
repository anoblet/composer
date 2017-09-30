<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);;

// Application Start
// $Application = Application::getSingleton();
// $Application->Start();
?>
<?php

class Application {
    protected static $resource;

    protected function __construct() {
    }

    public static function getSingleton() {
        if (isset(static::$resource)) ;
        else {
            static::$resource = new Application;
        }

        return static::$resource;
    }

    public function getClass() {
        return get_called_class();
    }

    public function getModel($Model = null) {
        $Class = get_called_class();
        $Model = "$Class\\Model\\$Model";
        $Model = new $Model;

        return $Model;
    }

    public static function Start() {
        $Application = new Application;
        $Application->getModule("Session")->createSession();
        $Output = $Application->getModule("Controller")->Execute();

        print $Output;
    }

    protected function autoload($class) {
        $class = strtolower($class);
        $file = $class . ".php";
        if (file_exists($file)) {
            include($file);
        }
    }

    public function getRequest() {
        $Path = Application::getModule("Controller")->getPath();
        $Parts = explode("/", $Path);

        $Request['Arguments'] = $_REQUEST;

        return $Request;
    }

    public static function getStaticModule($Module) {
        $Module = "Application\\Module\\" . $Module;
        return new $Module;
    }

    public function getModule($Module) {
        $Module = "Application\\Module\\" . $Module;
        return new $Module;
    }

    protected function getView($View, $Data = null) {
        if (isset($View)) ;
        else {
            $View = $this->__getClass();
        }

        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        $Count = count($Parts);
        if ($Parts[$Count - 2] == "Model") {
            array_splice($Parts, -2, 2);
            $Class = implode("\\", $Parts);
        }
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);

        $File = $Class . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $View;
        $File1 = __DIR__ . DIRECTORY_SEPARATOR . $Class . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View;

        ob_start();
        if (isset($Data)) {
            extract($Data);
        }
        debug_print_backtrace();
        if (file_exists($File1)) {
            include $File1;
        } else {
            include($File);
        }
        $HTML = ob_get_contents();
        ob_get_clean();

        return $HTML;
    }

    public static function getStaticView($View, $Data = null) {
        if (isset($View)) ;
        else {
            // $View = $this->__getClass();
        }

        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        $Count = count($Parts);
        if ($Parts[$Count - 2] == "Model") {
            array_splice($Parts, -2, 2);
            $Class = implode("\\", $Parts);
        }
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);

        $File = $Class . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $View;
        $File1 = __DIR__ . DIRECTORY_SEPARATOR . $Class . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View;

        ob_start();
        if (isset($Data)) {
            extract($Data);
        }
        if (file_exists($File1)) {
            include $File1;
        } else {
            include($File);
        }
        $HTML = ob_get_contents();
        ob_get_clean();

        return $HTML;
    }


    public static function getURL($Path = null) {
        $URL = PATH . $Path;

        return $URL;
    }

    protected function getLayout() {

    }
}

?>
