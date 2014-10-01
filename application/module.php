<?php
namespace Application;

class Module extends \Application
{
    public function __construct()
    {
    }

    public function getModel($model = null)
    {
        $class = get_class($this);
        $class = $class . "\\Models\\" . $model;

        if (class_exists($class)) {
            return new $class;
        }
        else {
            return parent::getModel($model);
        }
    }
}

?>