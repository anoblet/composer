<?PHP
Extends Framework\Library\Serialization
{
	Class __API
	{
		Public Function Serialize($Object)
		{
			$Serialized_String = Serialize($Object);
			Return $Serialized_String;
		}
		Public Function UnSerialize($String)
		{
			If(IsSet($String));
			If(Is_String($String));
			{
				$Result = UnSerialize($String);
			}

			Return $Result;
		}
	}
}

?>
