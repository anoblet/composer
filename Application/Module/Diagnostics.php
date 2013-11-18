<?PHP
Namespace Application\Module
{
	Class Diagnostics Extends \Application\Module
	{
		/*
		Public $Type;
		Public $Status;
		*/
		
		Public $Log = Array();
		
		Public Function Alert($Message = Null)
		{
			// Print $Message;
			Return;
		}
		
		Public Function Configure_XDebug()
		{
			/*
			 ini_set('xdebug.collect_vars', 'on');
			 ini_set('xdebug.collect_params', '4');
			 ini_set('xdebug.dump_globals', 'on');
			 ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
			 ini_set('xdebug.show_local_vars', 'on');
			 ini_set('xdebug.var_display_max_depth','100');
			 */
		}
		Public Function Is_Diagnostics_User()
		{
			$Result =   TRUE;
			Return $Result;
		}
		Public Function Diagnostics_Output_Enabled()
		{
			Return TRUE;
		}
		/**
		 * Takes $this->Message
		 */
		Public Function Generate_Error()
		{
			// Generate an Exception
			$Exception  =   \SYSTEM\Module\Exception::API()
			->Set_Child($this)
			->Generate_Exception();
			Return $Exception;
		}
		Public Function Log_Append($Entry)
		{
			If(IsSet($this->Log))
			{
				$this->Log[] = $Entry;
			}
			Else
			{
				self::$Log[]    =   $Entry;
			}
			Return $this;
		}
		// Non chainable method
		Public Function Retrieve_Log()
		{
			Return static::$Log;
		}
	}
}
?>