<?php
namespace Application\Module;

use \Application\Module\Database;

class Search extends \Application\Module  {
    public function Index() {
        $Request = $this->getRequest();
        $Search = $Request['Arguments']['Search'];
        $Database = $this->getModule("Database");
        $Database = Database::getInstance();
        var_dump($Database);
        $Query = $Database->createQuery();
        $Query->setAction("SELECT");
        $Query->setFields("*");
        $Query->setTable("*");
        $Query->setArguments(array("*" => $Search));
        $Result = $Database->Execute($Query);


        return $this->getView("Index.phtml");
    }
}
?>