<?php
namespace Application;

trait Controller
{  
    public function View($View) {
        include(BASE . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View);
    }
}

?>
