<?php

class ApplicationAbstract
{
    public function run()
    {
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
}

?>