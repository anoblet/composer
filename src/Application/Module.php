<?php
namespace Application;

class Module extends \Application {
    public static function getStaticModel($Model) {
        $Class = get_called_class() . "\\" . "Model" . "\\" . $Model;
        if (class_exists($Class)) {
            return new $Class;
        } else {
            return parent::getModel($model);
        }
    }
    public function getModel($model = null) {
        $class = get_class($this);
        $class = $class . "\\Models\\" . $model;
        if (class_exists($class)) {
            return new $class;
        } else {
            return parent::getModel($model);
        }
    }

    public function getTemplate($Data = null, $Template = null) {
        if (isset($Template)) ;
        else {
            $Template = $this->__getClass();
        }

        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        $Count = count($Parts);
        if ($Parts[$Count - 2] == "Model") {
            array_splice($Parts, -2, 2);
            $Class = implode("\\", $Parts);
        }
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);
        $File = $Class . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $Template;

        ob_start();
        extract($Data);
        include($File);
        $HTML = ob_get_contents();
        ob_get_clean();

        return $HTML;
    }

    public static function getInstance() {
        return new static;
    }

    public function getController($Controller) {
        $Called_Class = get_called_class();
        $Class = $Called_Class . "\\" . "Controller" . "\\" . $Controller;
        return new $Class;
    }
}
?>