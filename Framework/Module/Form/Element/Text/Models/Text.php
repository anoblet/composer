<?php
    Extends Framework\Module\Form\Element\Text\Models
    {
        Class Text Extends \Framework\Module\Form\Element\Text
        {
            Const TEMPLATE  =   "/SYSTEM/Module/Form/Element/Text/Template/Text.tpl";
            
            Public $ID;
            Public $Attributes  =   Array
                                    (
                                        'ID'        =>  NULL,
                                        'Name'      =>  NULL
                                    );
            Public $Label;
            
            Public Function __Construct()
            { 
            }
            Public Function Generate_XHTML()
            {
                $XHTML = $Element   =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
                Return $XHTML;
            }

        }
    }
?>
