<?PHP
Extends Framework\Library\String_Manipulation
{
	Class __Interface
	{
		Protected $String;

		Public Function  HTML_Array_String($Array, $Dilemeter)
		{
			$String = NULL;
			ForEach($Array as $Key => $Value)
			{
				$String .= "{$Key}='{$Value}'" . $Dilemeter;
			}
			Return $String;
		}
	}
}
?>
