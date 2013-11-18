<?PHP
Extends Framework\Module
{
	Class Javascript  Extends \Framework\Module
	{
		Public Function __Construct()
		{
			$this->Initialize();
		}
		Public Function Initialize()
		{
			Return;
		}
		Public Function Generate_Javascript()
		{
			$Javascript =  $this->Load_Javacript(BASE_URL."SYSTEM/Library/JavaScript/Process_Form.js");
			$Javascript .=  $this->Load_Javacript(BASE_URL."SYSTEM/Module/Javascript/AJAX/jquery.js");
			$Javascript .=  $this->Load_Javacript("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.js");
			$Javascript .=  $this->Load_Javacript(BASE_URL."SYSTEM/Module/Javascript/Library.js");
			$Javascript .=   $this->Load_Javacript(BASE_URL."SYSTEM/Library/JavaScript/AJAX/AJAX.js");

			Return $Javascript;
		}
		Static Public Function Load_Javacript($File_Path)
		{
			$Javascript    =   "<Script Type=\"text/javascript\" SRC=\"{$File_Path}\"></Script>";
			Return $Javascript;
		}
		Public Function Retrieve_Form_Data()
		{
			$Template   =   BASE_DIRECTORY . "/SYSTEM/Library/.tpl";
			$XHTML =   \SYSTEM\Template\__Interface::Include_Layout($Template);
			Return($XHTML);
		}
	}
}

?>