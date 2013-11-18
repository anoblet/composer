<?PHP
    Extends Framework\Template\Document\Head\JavaScript
    {
        Class __Interface
        {
            Public Function Generate_JavaScript($Object)
            {
                $Javascript  =  NULL;
                $Javascript .=  "<JavaScript SRC='{$Object->SRC}' />";
                
                Return $JavaScript;
            }
        }
    }
?>