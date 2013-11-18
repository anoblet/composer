<?PHP
Extends Framework\Module\Controller\Adapters
{
	Class XML Extends \Framework\Module\Controller
	{
		Public Function Parse($XML)
		{
			Try
			{
				If($Request = \SYSTEM\Library\XML::API()->Convert_to_Object(BASE_DIRECTORY . $XML));
				If(IsSet($Request->Object))
				{
					If(IsSet($Request->Method)){$Method =  "{$Request->Method}";}
					$Object =  "{$Request->Object}";
					If($this->Result =   $Object::API()->$Method());
					Else
					{
						If(!IsSet($this->Result))
						{
							Throw New \Exception("Response was empty.
							{$Request->Object}::{$Request->Method}");
                            }
                            ElseIf($this->Result == FALSE)
                            {
                                Throw New \Exception("Response was FALSE: {$Request->Object}::{$Request->Method}");
                            }
                            Else
                            {
                                Throw New \Exception("Unable to call object method. {$Request->Object}::{$Request->Method}");
                            }
                        }
                    }
                }
                Catch(\Exception $Exception)
                {
                    Static::$Diagnostics->Log_Append("Unable to parse and execute XML data.");
                    Static::$Diagnostics->Log_Append($Exception);
                    //Return FALSE; 
                    Throw $Exception;
                }
                    
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
