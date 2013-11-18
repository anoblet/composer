<?PHP
Extends Framework\Module\User_Interface
{

	Class Window Extends \Framework\Module\User_Interface
	{
		Private $Model  =   "Window.mdl";
		Private $XSL        = "Template/Window.xsl";
		Private $Javascript = "Javascript/Window.js";
		Private $CSS        =   "Template/Window.css";
		Protected $Title;
		Protected $Data;

		Protected Function Generate_Window_ID()
		{
			$ID = UniqID();
			Return $ID;
		}
		Public Function Create_Window()
		{
			Return Window\Models\Window::Generate_Object();
		}
		Public Function Generate_Window()
		{
			Return Window\Models\Window::Generate_Object();
		}
		Function Set_Title($Title)
		{
			$this->Title    =   $Title;
			Return $this;
		}
		Function Set_Content($Content)
		{
			$this->Content  =   $Content;
			Return $this;
		}
		Function Javascript()
		{
			If(IsSet($this->Target));
			$CSS_Path   =   $this->ID;
			Try
			{
				Static::$Diagnostics->Log_Append("Loading SubRoutine: {$Object}. Target: {$Target}");
				If
				(
				$Result     =   \SYSTEM\Module\Javascript\JQuery\JQuery::API()
				->Set_URL($Object)
				->Add_Target($CSS_Path)
				->Generate_Request()
				);
				Else
				{

					Throw New \Exception("Unable to load object.");
                    }
                    
                }
                Catch(\Exception $Exception)
                {                     
                    Static::$Diagnostics->Log_Append($Exception);
                    // $Result = FALSE;
                    // This is where our error is thrown.
                    $Result =   "Error";
                }
                Return $Result;
            }  
            Public Function Render()
            {
            $this->ID = $this->Generate_Window_ID();
            $Window = \SYSTEM\Module\Template::Parse_XSLT($this,$this->XSL);
                
                Return $Window;
            }

        }
    }
?>
