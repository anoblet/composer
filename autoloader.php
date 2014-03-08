<?php
    namespace Application
    {
        spl_autoload_register("Application\autoload");
        
        function autoload($class)
        {
            $file = implode("/",explode("\\",$class)) . ".php";
            include($file);
        }
    }
?>