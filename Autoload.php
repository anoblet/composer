<?php
function Autoload($class)
{
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $file = $class . ".php";
    if (file_exists($file)) {
        include($file);
    }
}

?>