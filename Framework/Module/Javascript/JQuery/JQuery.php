<?PHP
/***
 * JQuery Interface Library
 ***/
Extends Framework\Module\Javascript\JQuery
{
	Class JQuery Extends \Framework\Module\Javascript
	{
		Protected Static $AJAX_TEMPLATE   =  "/SYSTEM/Module/Javascript/JQuery/Javascript/Template.js.tpl";

		Public $URL;
		Public /* Array */ $Target;
		Public $Referral_Element_ID;
		Public Function Set_URL($URL)
		{
			$this->URL  =   $URL;
			Return $this;
		}
		Public Function Add_Target($Target)
		{
			$this->Target   =   $Target;
			Return $this;
		}
		Public Function Retrieve_Container_Element_ID()
		{
			Print
                    "<div id='Javascript_Container'>
                        <Script>
                            alert(document.getElementById('Javascript_Container').parentNode.id);
                        </script>
                    </div>";
			Return $ID;
		}
		Function Generate_Target_String()
		{
			Return $Target_String;
		}
		/** SHould create a model **/
		Public Function Generate_Request($Object = NULL)
		{
			Try
			{
				If(IsSet($Object))
				{
					$this->Object   =   $Object;
				}
				Else
				{
					If(IsSet($this->URL))
					{
						$this->Object =   $this->URL;
					}
					Else
					{
						Throw New \Exception("Object not specified.");
                        }
                    }
                    If($Result =   \SYSTEM\Module\Template::Load_Template(Static::$AJAX_TEMPLATE));
                    Else
                    {
                        Throw New \Exception("Unable to load template.");
                    }
                }
                Catch(\Exception $Exception)
                {
                    Static::$Diagnostics->Log_Append($Exception);
                    // $Result =   FALSE;
                    Throw $Exception;
                }
                Return $Result;
            }
            Public Function Generate_Request_OnClick()
            {
                Return $Onlick;
            }

        Public Function Redirect($URL)
        {
        	Return	"<script></script>";
        }
	}
	}
?>