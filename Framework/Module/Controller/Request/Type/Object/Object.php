<?PHP
    Extends Framework\Module\Controller\Request\Type
    {
        Class Object
        {
            Public Static Function API()
            {
                Return New self;
            }
            Public Function Process()
            {                                    
                $this->Result   =   \SYSTEM\Module\Template::API()
                                        ->Load_Template($this->Retrieve_Object());
                \SYSTEM\User_Interface::$Response    =   $this->Result; 
                Return $this->Result;
            }
            Public Function Set_Format()
            {
                $this->Format   =   $this->Retrieve_Format();
                Return $this;
            }
            Public Function Retrieve_Format()
            {
                Return \SYSTEM\Module\Controller\Request::$Format;
            }
            Public Function Retrieve_Object()
            {
                $Object =     \SYSTEM\Module\Controller\Request::$Object;
                Return \SYSTEM\Library\URL\__Methods::Decode_Object($Object);     
            }   
        }
    }
?>