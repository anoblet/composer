<?PHP
    Extends Framework\Template\Document\Head\StyleSheets
    {
        Class __Interface
        {
            Public Function __Instantiate()
            {
                $Class = __CLASS__;
                
                Return New $Class;
            }
            Public Function Generate_StyleSheet($Object)
            {
                $StyleSheet  =   NULL;
                
                /*  StyleSheet Attributes 
                    *      Rel
                    *      HREF
                    *      Media
                    */
                $StyleSheet .= "<Link REL='{$Object->REL}' HREF='{$Object->HREF}' Media='{$Object->Media}' \>";
                    
                Return $StyleSheet;
            }
            Protected Function Get_Color_Scheme()
            {
                
                Return $Color_Scheme;
            }
        }
    }
?>
