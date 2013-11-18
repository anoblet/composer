<?PHP
Extends Framework\Library
{
	Class Conversion Extends \Framework\Library
	{
		Public Function Convert($Source,$Target,$String)
		{
			// Retrieve Delimiters for specific formats.
			Switch($Source)
			{
				Case "Array":
					{

					}
			}

			$Source_Delimiter = \SYSTEM\Library\Conversion\__Formats::$Source;
			$Target_Delimiter = \SYSTEM\Library\Conversion\__Formats::$Target;

			$Result = str_replace($Source_Delimiter,$Target_Delimiter,$String);

			Return $Result;
		}

		Public Function Object_To_Array($Object)
		{
			$Array  =   get_object_vars($Object);
			Return $Array;
		}
		Public Function Object_To_Array_Recursive($Object)
		{

			$Array  =   get_object_vars($Object);
			ForEach($Array as $Key => $Value)
			{
				If(Is_Object($Value))
				{
					$Array[$Key]    =   self::Object_To_Array_Recursive($Value);
				}
			}
			Return $Array;
		}
		/**
		 * @Todo Not completed
		 * Deprecated? With JQuery
		 **/
		Public Function Object_To_Javascript($Object)
		{
			ForEach($this as $Key => $Value)
			{
				If(Is_Object($Value))
				{
					self::Object_To_Javascript($Value);
				}
				Else
				{
					$Javascript .=  $Value;
				}
			}
		}
		Public Function Generate_Javascript($Object)
		{
			/**
			 * @Internal This should be an array
			 **/
			$Object =   \SYSTEM\Library\Conversion\__Functions::Object_To_Array_Recursive($Object);
			For($X=0;$X<Count($Object);$X++)
			{
				$SubRoutine =   $Object[$X];
				$SubRoutine =   \SYSTEM\Library\Conversion\__Functions::Array_To_Object($SubRoutine);
				/**
				 * @Internal Should Be Only Objects
				 */
				If(IsSet($SubRoutine->Function))
				{
					/**
					 * @internal
					 * Innerds Outards technizue?
					 */
					$Javascript     .=   "{$SubRoutine->Function}";
					$Javascript     .=  "(";
					If(Is_Object($SubRoutine->Parameters))
					{
						$this->Is_Nested = TRUE;
						$Javascript .=  self::Generate_Javascript($SubRoutine->Parameters);

					}
					Else
					{
						$Javascript .=  "{$SubRoutine->Parameters}";
					}
					$Javascript   .=  ")";


					/**
					 * @Internal
					 * Fix external need for placement of a semi colon
					 * Maybe SubRoutine Itterator Function :)))
					 */
				}
				If($this->Is_Nested)
				{
					$this->Is_Nested = FALSE;
				}
				Else
				{
					$Javascript .= ";";
				}
			}


			Return $Javascript;

		}
		Public Function Class_Directory($Class)
		{
			$Directory  =   Str_Replace("\\","/",$Class);
			Return $Directory;
		}
		/**
		 * @Internal
		 * Static Function that is available in the library.
		 **/
		Static Public Function Array_To_Object(Array $Array)
		{
			Try
			{
				ForEach ($Array as $Key  => $Value)
				{
					If(Is_Array($Value))
					{
						$Object->$Key   =   self::Array_To_Object($Value);
					}
					Else
					{
						$Object->{$Key} = $Value;
					}
				}
				$Result =   $Object;
			}
			Catch (\Exception $Exception)
			{
				$Result  =   $Exception;
			}
			Return $Result;
		}
	}

	Class __Formats
	{
		 
		Static Public Function __Array($Array)
		{
			$Delimiter = ",";

			Return $Delimiter;
		}

	}
}
?>