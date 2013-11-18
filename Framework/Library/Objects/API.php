<?PHP

Extends Framework\Library\Objects
{
	Class API
	{
		Public Function Create_Object()
		{
			Var_Dump($this);
			Return New Object_Generation;
		}
	}
	Class Object_Generation
	{
	}
}

?>
