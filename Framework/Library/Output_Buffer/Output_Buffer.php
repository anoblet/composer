<?PHP
Extends Framework\Library
{
	Class Output_Buffer Extends \Framework\Library
	{
		Public Function Start()
		{
			OB_Start();
			Return;
		}

		Public Function Stop()
		{
			$Result =   OB_End_clean();
			Return $Result;
		}
		Public Function Get_Content()
		{
			$Result =   OB_Get_Contents();
			Return $Result;
		}
		Public Function Stop_Capture()
		{
			$Result =   OB_End_Flush();
			Return $Result;
		}
		 
		Public Function Load_File($File,$Object = NULL)
		{
			/**
			 * @Internal
			 * Messy Workaround two seperate functions
			 */
			Try
			{
				If(IsSet($Object) & $Object !== "")
				{
					self::Generate_Local_Variables($Object);
				}

				/**
				 * @todo What if we just want a regular template?
				  
				 If(IsSet($Object));
				 Else
				 {
				 Throw New \Exception('There is no data available to create an object with a template.');
				 }

				 **/
				 
				Ob_Start();
				If(\SYSTEM\Library::Include_File($File));
				Else
				{
					Throw New\Exception("Error including template.");
                        }
                        $Result   =   ob_get_contents();
                        OB_End_Clean();  
                }
                Catch(\Exception $Exception)
                {             
                    self::$Diagnostics->Log_Append("Unable to generate template.");
                    $Result =   FALSE;
                }             
                Return $Result;
            }
            Public Function Generate_Local_Variables($Array)
            {
                /**
                * @Internal
                * Too complicated Just a single object?
                */
                ForEach($Array as $Key => $Value)
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
        }
    }
?>