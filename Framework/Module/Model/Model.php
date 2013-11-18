<?PHP
Extends Framework\Module
{

	Class Model Extends \Framework\Module
	{
		Protected Function Set_Parameter($Parameter,$Value)
		{
			$this->{$Parameter} = $Value;
			Return $this;
		}
		Protected Function Get_Parameter($Parameter)
		{
			Return $this->Parameter;
		}
	}
}
?>