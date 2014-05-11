<?php
// Let's create an autoloader
require_once ("autoloader.php");
spl_autoload_register("autoload");
new Application();
?>