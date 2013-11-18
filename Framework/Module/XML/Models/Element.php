<?PHP
	Extends Framework\Module\XML\Models
	{
		Class Element Extends \Framework\Core\Model/* TODO \Data\Format*/
		{
			Protected $Element	=	"XML";
			Protected $Attributes;
			Protected $Data;
			
			Public Function __Construct($Element)
			{
				If(IsSet($Element->Retrieve_Property("Element")))
				{
					
				}
				Return parent::__Construct();
			}
		}
	}
?>