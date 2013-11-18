<?
	Extends Framework\Module\Application\Models
	{
		Class Configuration Extends \Framework\Core\Model
		{
			Protected $Events;
			Protected $Observers;

			Public Function __Construct($Configuration_File)
			{
				$Configuration	= \SYSTEM\Library\XML::Convert_to_Object($Configuration_File);
			}
		}
	}
?>