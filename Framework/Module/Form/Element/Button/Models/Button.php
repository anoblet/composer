<?php
    Extends Framework\Module\Form\Element\Button\Models
    {
        Class Button Extends \Framework\Module\Form\Element\Button
        {
            Const TEMPLATE  =   "/SYSTEM/Module/Form/Element/Button/Template/Button.tpl";
            Public $ID;
            Public $Label;
            Public $Attributes  =    Array
                                        (
                                            'ID'    =>  NULL,
                                            'Name'  =>  NULL
                                        );
            
            
            Public Function Generate_XHTML()
            {
                $XHTML = $Element   =   \SYSTEM\Module\Template::Load_Template(self::TEMPLATE);
                Return $XHTML;
            }

        }
    }
?>
