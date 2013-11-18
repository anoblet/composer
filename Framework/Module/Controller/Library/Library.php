<?php
Extends Framework\Module\Controller
{
	Class Library Extends \Framework\Module\Controller
	{
		Protected Function Execute_Routine($Routine)
		{
			$Result =   \SYSTEM\Module\Controller\XML::API()->Execute($Routine);
			Return $Result;
		}

		Function Load_Object($Interface,$Target)
		{
			Static::$Diagnostics->Log_Append("Loading SubRoutine: {$Interface}. Target: {$Target}");
			$Result     =   \SYSTEM\Module\Javascript\JQuery\JQuery::API()
			->Set_Target($Target)
			->Load_Sub_Interface($Interface);
			Return $Result;
		}
	}
}
?>
