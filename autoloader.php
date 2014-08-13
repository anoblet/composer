<?php
function autoload($class) {
    $class = strtolower($class);
    include ($class . ".php");
}
?>