<?PHP

    Extends Framework\Module\Datasource\Database\MySQL\Query
    {
        Class Query Extends \Framework\Module\Datasource\Database\Query
        {
              Protected $Data;
              Function Set_Data()
              {
                  Return $this;
              }
        }
    }
    
?>