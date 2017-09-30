<?php
namespace Application;

class Controller extends \Application
{
    public function View($View) {


        include(BASE . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View);

    }
}

?>
