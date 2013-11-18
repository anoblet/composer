<?PHP
Extends Framework\Template
{
	Class Template
	{
		Public Function Generate_HTML_Document($Type)
		{                  Print "Here";
		$Document = NULL;
		Switch($Type)
		{
			Case "Document":
				{
					$Object->Data   =  "<HTML>";
					// Title Is Being Declared Here.
					$Title = Title;
					$Stylesheets    =   Array();
					// First Style Sheet
					$StyleSheet->REL    =   "Stylesheet";
					$StyleSheet->HREF = CSS_DIRECTORY . "Default.css";
					$Stylesheets[]  =   $StyleSheet;

					$this->Stylesheets   =   $this->Load_Stylesheets($Stylesheets);    //

					$this->Javascript   =   $this->Load_Javascript();
					//
					$Object->Data   .=  "<Head>{$this->Stylesheets}{$this->Javascript}";
					$Object->Data   .=  \SYSTEM\Template\HTML\Tags\Body\__Interface::Open(NULL);
					$Object->Data   .=  $this->Content;
					$Object->Data   .=  \SYSTEM\Template\HTML\Tags\Body\__Interface::Close(NULL);
					$Object->Data   .=  "</HTML>";
					$Object->Result =   TRUE;
				}
		}
		$Document   =   $Object->Data;

		Return $Document;
		//Return $Document;
		}
		Public Function Load_Javascript()
		{                 Print "Here";
		/**
		 * @todo return - file_get_contents maybe?
		 */
		// $this->Javascript   =   \SYSTEM\Module\Javascript::API()->Generate_Javascript();
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

				$Result =   "<link rel=\"stylesheet\" href=\"{$HREF}\"/>";
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
		Public Function Generate_Box()
		{

		}

	}

	Class Types
	{
		Public Function Generate_XML()
		{
			Return;
		}
	}

}
?>
