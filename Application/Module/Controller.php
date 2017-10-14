<?php

namespace Application\Module;

class Controller {
    public $Path;

    use \Application\Base;

    public function Execute() {
        $Path = $this->getPath();
        $Parts = explode("/", $Path);

        if (empty($Parts[0])) {
            array_shift($Parts);
        }

        $Count = count($Parts);

        if (empty($Parts[$Count - 1])) {
            array_pop($Parts);
        };

        // Modulle/Action

        /*
        if (isset($Parts[0])) {
            $Request['Module'] = $Parts[0];
        } else {
            $Request['Module'] = "Layout";
        }
        if (isset($Parts[1])) {
            $Request['Action'] = $Parts[1];
        } else {
            $Request['Action'] = "Index";
        }

        $Output = $this->getModule($Request['Module'])->getController($Request['Controller'])->{$Request['Action']}();
        */

        // Module/Controller/Action

        if (isset($Parts[0])) {
            $Request['Module'] = $Parts[0];
        } else {
            $Request['Module'] = "Layout";
        }
        if (isset($Parts[1])) {
            $Request['Controller'] = $Parts[1];
        } else {
            $Request['Controller'] = "Index";
        }
        if (isset($Parts[2])) {
            $Request['Action'] = $Parts[2];
        } else {
            $Request['Action'] = "Index";
        }

        $Output = $this->Module($Request['Module'])->Controller($Request['Module'] . "\\" . $Request['Controller'])->{$Request['Action']}();

        return $Output;
    }

    protected function getPath() {
        if (isset($this->Path)) ;
        else {
            $Name = str_replace($_SERVER['DOCUMENT_ROOT'], null, $_SERVER['SCRIPT_FILENAME']);
            $Parts = explode("/", $Name);
            array_pop($Parts);
            $Base = implode("/", $Parts);
            $Path = str_replace($Base, null, $_SERVER['REQUEST_URI']);
            $this->Path = $Path;
        }

        return $this->Path;
    }

    public function setPath($Path) {
        $this->Path = $Path;

        return $this;
    }
}


?>