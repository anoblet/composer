<?PHP
Extends Framework\Module\Javascript\AJAX
{
	Class __Functions
	{
		Public Function Retrieve_URL_Data($Parameters)
		{
			$Parameter_Count = Count($Parameters);
			For($I=0;$I < $Parameter_Count; $I++)
			{
				$URL_Data->{$Parameters{$I}} = $_REQUEST[$Parameters[$I]];

			}
			Return $URL_Data;
		}
		Public Function Format_Parameters($Parameters)
		{
			$Parameter_Count = Count($Parameters);
			$Delimiter_Count = Count($Parameters)-1;
			$String = NULL;
			$Count = 0;
			ForEach($Parameters as $Key => $Value)
			{
				$String .= "\"{$Value}\"";
				If($Count <= $Delimter_Count)
				{
					$String .= ", ";
				}
				$Count++;
			}
			//Var_Dump($String);
			Return $String;
		}
	}
}
?>
