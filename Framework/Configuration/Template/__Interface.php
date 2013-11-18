<?PHP
Extends Framework\Configuration\Template
{
	Class __Interface
	{
		Public $Label_Terminator = ":";
		CONST Label_Terminator = ":";

		Public Function __Instantiate()
		{
			$Class = __CLASS__;
			// Parent::__Instantiate(__CLASS__);
			Return New $Class;
		}

		Public Function Get_Configuration($Variable)
		{
			Return $this->$Variable;
		}
	}
}
?>