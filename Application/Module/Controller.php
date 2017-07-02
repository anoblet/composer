<?php

namespace Application\Module {

    class Controller extends \Application\Module
    {
        protected function getPath()
        {
            $Path = $_SERVER['REQUEST_URI'];
            $Parts = explode("//", $Path);

            return $Path;
        }
    }
}

?>