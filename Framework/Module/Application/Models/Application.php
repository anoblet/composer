<?
	Namespace Framework\Module\Application\Models
	{
		Class Application Extends \Framework\Core\Data
		{
			Const Element = "Application";
			Protected $Element = "Application";
			Const Configuration = FALSE;
			
			Public $Configuration;
			
			Function __Construct()
			{
				$this->Load_Configuration();
				parent::__Construct();
			}
			Function Load_Configuration()
			{
				$this->Configuration = \SYSTEM\Module\Configuration::Load_Configuration($this::Configuration);
			}
		}
	}
?>