<?php
namespace Application\Module\Search\Controller;

use Application;
use Application\Module\Search;
use \Application\Module\Database;

class Index extends \Application\Controller  {
    public function Index() {
        $Request = $this->getRequest();
        $Search = $Request['Arguments']['Search'];
        // $Database = $this->getModule("Database");
        $Database = Database::getInstance();
        var_dump($Database);
        $Query = $Database->createQuery();
        $Query->setAction("SELECT");
        $Query->setFields("*");
        $Query->setTable("*");
        $Query->setArguments(array("*" => $Search));
        $Result = $Database->Execute($Query);


        return Search::getStaticView("Index.phtml");
    }
}
?>