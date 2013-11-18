<?PHP
Extends Framework\Template\HTML\Tags
{
	Class __Interface
	{
		Public Function HTML($Stage)
		{
			Switch($Stage)
			{
				Case "Open":
					{
						$Result .= "<HTML {$Parameters}>\n";
					}
				Case "Close";
			}
			$Result .= "<HTML {$Parameters}>\n";
			$Result .= $CallBack();
			$Result .= "<HTML {$Parameters}>\n";

			Return $Result;
		}

	}
}

?>
