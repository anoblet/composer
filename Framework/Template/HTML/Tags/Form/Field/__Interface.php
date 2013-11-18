<?PHP
    Extends Framework\Template\HTML\Tags\Form\Field
    {
        Class __Interface
        {
            Public Function Generate_Form($Attributes,$Fields)
            {
                // Generate Form Header
                $Form   = Null;
                $Form  .= \SYSTEM\Template\HTML\Tags\Form\__Interface::Open(\SYSTEM\Library\String_Manipulation\__Interface::Convert_Array_Attributes($Attributes));
                // Generate Fields
                For($I=-1;$I<Count($Fields);$I++)
                {
                    $Form  .= \SYSTEM\Template/* Module */\Form\__Interface::Generate_Field($Fields[$I]);
                }
                // Generate Form Footer
                $Form  .=   \SYSTEM\Template\HTML\Tags\Form\__Interface::Close(); 
            }
            Protected Function Generate_Field($Attributes)
            {
                $Field = \SYSTEM\Template\HTML\Tags\Form\Field\__Interface::$Attibutes['Type']($Attibutes);
                
                Return $Field;                         
            }
            
        }
    }
?>
