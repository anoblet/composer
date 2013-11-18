<?PHP
Extends Framework\Module
{
	Class Template Extends \Framework\Module
	{

		/**
		 *   Can be objecteized using a static function
		 */
		Function Generate_Local_Variables_Extended(Array $Variables)
		{
			/**
			 * @todo | Recursive without extened
			 */
			ForEach($Variables as $Key => $Value)
			{
				$Data_Array =   \SYSTEM\Library\Conversion::Object_To_Array($Value);
				ForEach($Data_Array as $Data_Key => $Data_Value)
				{
					$this->$Key->$Data_Key  =   $Data_Value;
				}
			}
			// \SYSTEM\Library\Conversion\__API::__Extract($Array);
			Return $Result;
		}
		/*
		 Public Function Generate_Object($Template,$Data)
		 {
		 $this->Generate_Local_Variables_Extended($Data);

		 $Result     =   \SYSTEM\Library\Output_Buffer\__Functions::Template_Layer($Template,$Data);

		 Return $Result;
		 }
		 */
		Public Function Set_CSS($CSS)
		{
			$this->CSS  =   $CSS;
			Return $this;
		}
		Public Function Set_Content($Content)
		{
			$this->Content  =   $Content;
			Return $this;
		}
		Public Function Load_Template($Template,$Parameters = NULL)
		{
			Try
			{
				Static::$Diagnostics->Log_Append("Loading Template: {$Template}");
				If($Layout =   \SYSTEM\Library\Output_Buffer::Load_File($Template,$Parameters));
				Else
				{
					Throw New \Exception("Unable to include template.  Template: ".BASE_DIRECTORY."{$Template}");
                    }
                }
                Catch(\Exception $Exception)
                {
                    self::$Diagnostics->Log_Append("Unable to load template.");
                    self::$Diagnostics->Log_Append($Exception);
                    Throw $Exception;
                    Return FALSE;

                }
                Return $Layout;
            }
            Public Function Load_Template_Relative($Template,$Parameters = NULL)
            {
                Static::$Diagnostics->Log_Append("Loading Template: {$Template}");
                $Context   =   \SYSTEM\Library\Conversion::Class_Directory(Get_Called_Class());
               	
                $File   =   "/" . $Context . "/" . $Template;

                Try
                {
                    If($Layout =   \SYSTEM\Library\Output_Buffer::Load_File($File,$Parameters));
                    Else
                    {
                        Throw New \Exception("Unable to include template.  Template: {$File});");
                    }
                }
                Catch(\Exception $Exception)
                {
                    self::$Diagnostics->Log_Append("Unable to load template.");
                    self::$Diagnostics->Log_Append($Exception);
                    Throw $Exception;
                    Return FALSE;

                }
                Return $Layout;
            }
            Public Function Generate_HTML_Document($Type)
            {
            $Document = NULL;
                Switch($Type)
                {
                    Case "Document":
                    {
                    $Object->Data   .=  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n";
                    $Object->Data   .=  "<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>\n";
                    // Title Is Being Declared Here.
                    $Title = Title;
                    $Stylesheets    =   Array();
                    // First Style Sheet
                                        $StyleSheet	=	New \stdClass(); // FIXME
                    /* FIXME
                    $StyleSheet->REL    =   "Stylesheet";
                    $StyleSheet->HREF = "https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js";
                    $Stylesheets[]  =   $StyleSheet;
                    */
                    $StyleSheet	=	New \stdClass(); // FIXME
                    $StyleSheet->REL    =   "Stylesheet";
                    $StyleSheet->HREF = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css";
                    $Stylesheets[]  =   $StyleSheet;
                    $StyleSheet	=	New \stdClass(); // FIXME
                    $StyleSheet->REL    =   "Stylesheet";
                    $StyleSheet->HREF = CSS_DIRECTORY . "Default.css";
                    $Stylesheets[]  =   $StyleSheet;

                    $this->Stylesheets   =   $this->Load_Stylesheets($Stylesheets);    //

                    $this->Javascript   =   $this->Load_Javascript();
                    //
                    $Object->Data   .=  "<head>\n";
                    $Object->Data   .=  "{$this->Stylesheets}{$this->Javascript}\n";
                    $Object->Data   .=  "<meta http-equiv='content-type' content='text/html; charset=UTF-8'>";
                    $Object->Data   .=  "</Head>";
                    $Object->Data   .=  "<body id=\"Body\">";
                    $Object->Data   .=  $this->Content;
                    $Object->Data   .=  "</body>";
                    $Object->Data   .=  "</html>";
                    $Object->Result =   TRUE;
				}
			}
			$Document   =   $Object->Data;

			Return $Document;
			//Return $Document;
		}
		Public Function Load_Javascript()
		{
			/**
			 * @todo return - file_get_contents maybe?
			 */
			$this->Javascript   =   \SYSTEM\Module\Javascript::API()->Generate_Javascript();
			Return $this->Javascript;
		}
		/**
		 * @todo Multiple STyle sheets
		 */
		Public Function Load_Stylesheets(Array $Stylesheets)
		{
			For($I=0;$I<Count($Stylesheets);$I++)
			{
				$HREF = $Stylesheets[$I]->HREF;

				$Result .=   "<link rel=\"stylesheet\" href=\"{$HREF}\"/>";
			}

			Return $Result;
		}
		Public Function Create_Body()
		{
			$HTML  =   "<Body>\n";

			Return $HTML;
		}
		Public Function End_Document()
		{
			$HTML[] =   "</Body>\n";
			$HTML[] =   "</HTML>\n";

			Return $Object;
		}
		Public Function Generate_Box($Object)
		{
			$Box_XSLT   =   "Templates/Box.xslt";
			$Box    =   $this->Parse_XSLT($Object,$Box_XSLT);
			Return $Box;
		}
		Public Function Parse_XSL($XML,$XSL)
		{
			
			If(Is_String($XSL))
			{
				If(SubStr($XSL,1) == "/");
				Else
				{
					$XSL = BASE_DIRECTORY . $this->Retrieve_Class_Directory() . $XSL;
				}
			}
			Return \SYSTEM\Library\XSLT::Parse($XML,$XSL);
		}
		Public Function Parse_XSLT($XML,$XSL)
		{
			If(Is_String($XSL))
			{
				If(SubStr($XSL,1) == "/");
				Else
				{
					$XSL = BASE_DIRECTORY . $this->Retrieve_Class_Directory() . $XSL;
				}
			}
			Return \SYSTEM\Library\XSLT::Parse($XML,$XSL);
		}
	}
}

?>
