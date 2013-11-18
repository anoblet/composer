<?PHP
/**
 * Copyright 2011 Andy Noblet
 */
	Extends Framework\Module\User\Models
	{
		Class User Extends \Framework\Core\Model
		{
			Protected $ID;
			// TODO Retrieve these dynamically via a structure table EAV
			Protected $Attributes;
			Protected $Attributes_Table	=	"User_Attribute";
			// TODO Private
			Protected Function __Construct()
			{

			}
		}
	}
?>