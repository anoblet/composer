<?PHP
	Extends Framework\Module\XML\Models
	{
		Class XML Extends \Framework\Core\Model/* TODO \Data\Format*/
		{
			
			Protected $Element	=	"XML";
			Protected $Attributes;
			Protected $Data;
			
			Public Function __Construct($XML)
			{				
				
				If(Is_Object($Element))
				{
					$Element = $XML->Retrieve_Property("Element");
					Print "333";Var_Dump($Element);Print "333";
				}
				
				If(Is_Array($XML))
				{	
				}
				Else
				{
					$this->Data = $XML;
				}
				parent::__Construct($XML);
			}
		}
	}
?>