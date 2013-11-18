<?PHP
Extends Framework\Module\Quotes
{
	Class Random_Quote Extends \Framework\Module\Quotes
	{
		Const TEMPLATE  =   "Template/Random_Quote.tpl";
		Protected $Source   =   SYSTEM_DEFAULT_DATASOURCE;
		Public Function Generate()
		{
			/**
			 * @todo | should Source be deprecated?
		  *  Try/Catch
		  */
			self::$Diagnostics->Log_Append("Generaing a random quote.");
			$Result =   NULL;
			$Diagnostics    =   NULL;
			// Connect to the Datasource
			$Datasource =   \SYSTEM\Module\Datasource::API()->Generate_Connection($this->Source);
			// Database Configuration
			Try
			{
				$Data   =   $Datasource->Generate_Query("Retrieve")
				->Set_Database("raheimsg_SYSTEM")
				->Set_Table('Quotes')
				->Set_Fields(Array("*"))
				->Set_Limit(1)
				->Set_Distinct(NULL)
				->Set_Order_By("Rand()")
				->Execute();

				// $this->Resource =   $SubRoutine->Resource;
				$Quote =    $Datasource->Retrieve_Record($Data->Resource,$Row);
				$Result =   \SYSTEM\Module\Template::Load_Template_Relative(self::TEMPLATE,Array("Quote" => $Quote));

			}
			Catch(\Exception $Exception)
			{
				Print "Uncaught Exception";
				Var_Dump($Exception);
				Throw $Exception;
			}


			// Throw To lOayout
			$this->Data	= $Result;
			Return $this;
		}
	}
}
?>