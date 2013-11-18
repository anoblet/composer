<?
Extends Framework\Module
{
	Class Exception Extends \Exception
	{
		Public $Error_Level;
		Public $Exception;
		Public $File;
		Public $Type;
		Public $Message;

		Public Function API()
		{
			Return New self;
		}
		Public Function __Static()
		{
			Return New static;
		}
		/**
		 * Takes Exception for now.
		 */
		Public Function Generate_Exception()
		{
			$Exception = New \Exception();
			$Exception->Child   =   $this->Child;
			Return $Exception;
		}
		Public Function Set_Child($Child)
		{
			$this->Child    =   $Child;
			Return $this;
		}
	}
}
?>