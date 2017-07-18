<?php
function Autoload($class)
{
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $class . ".php";
    if (file_exists($file)) {
        include($file);
    }
}

?>