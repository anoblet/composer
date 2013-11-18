<?PHP
Extends Framework\Module\Javascript\AJAX
{
	Class API
	{
		Public Function __Construct()
		{
			$this->Initialize();
		}
		Public Function Initialize()
		{
			$this->Session  =   $_SESSION;
			$this->Request  =   $_REQUEST;
			Return;
		}
		Public Function Generate_AJAX($Object)
		{
			/**
			 * @todo Return $AJAX in Sub Environment
			 **/

			Var_Dump($Object);

			$AJAX   =   \SYSTEM\Library\Objects\XHTML_Flatten_Object($Object);

			Return;
		}
	}
}
?>
