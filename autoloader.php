<?php
function autoload($class)
{
    $class = strtolower($class);
    $file = $class . ".php";
    if (file_exists($file)) {
        include($file);
    }
}

?>