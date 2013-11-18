<?
    /**
    * Needs Joins
    */
    Extends Framework\Module\Datasource\Database\MySQ\EAVL
    {
        /** Is in a SYSTEM Context **/
        Class Create Extends \Framework\Module\Datasource\Database\MySQL\EAV
        {
            Public $Allowed_Attributes;
            Public $Reference_Object;

            Public Function Set_Reference_Object($Object    =   NULL)
            {
                If(IsSet($Object));
                Else
                {
                    $this->Reference_Object =   $_REQUEST['Reference_Object'];
                }
                Return $this;
            }
            
            Public Function Generate_Form()
            {
                
            }
            Public Function Process();
            {
                
            }