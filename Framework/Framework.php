<?php
	
	/* Autoloader */
	Require_Once("\Module\Autoloader\Autoloader.php");
	spl_autoload_register('\Framework\Module\Autoloader::AutoLoad');
	
	Class Framework
	{
		Static $Framework;
		Static $Diagnostics;
		Static $Resource;

		/*
		
		Private Function __Construct()
		{
				$this::$Framework = $this;
				
		}		
		
		*/
			
		Public Function __Call($Function,$Parameters)
		{
			Try
			{
				$Class = Get_Called_Class();
				
				/*
                
                $Classes = Array
				(
					"\\{$Function}",
					"\\" . Get_Called_Class() . "\\{$Class}\\{$Function}"
				);
				For($X=0; $X < Count($Classes); $X++)
				{
					If(Class_Exists($Classes[$X]))
					{
						$Data = New $Classes[$X];
						Break;
					}
				}
				*/
				
				If(FALSE);
				Else
				{
					// Throw New \Exception("Function {$Function} does not exist for class {$Class}.");
					$this->Application()->Diagnostics()->Log_Append("Function {$Function} does not exist for class {$Class}.");
				}
				
			}
			Catch(\Exception $Exception)
			{
				Throw $Exception;
			}
				
			Return $Data;
		}
		Public Static Function __CallStatic($Class,$Parameters)
		{
			Try
			{
				$Function = $Parameters[0];
				$Class = "\\" . Get_Called_Class() . "\\{$Class}\\{$Function}";
				If(Class_Exists($Class))
				{
					$Data = $Class::API();
				}		
			}
			Catch(\Exception $Exception)
			{
				Throw $Exception;
			}
			Return $Data;
		}
		
		/*
		Public Static Function Initialize($Parameters = NULL)
		{
			$Class  =   Get_Called_Class();
			If(IsSet($this))
			{
				$Class = New $Class($Parameters);
			}
			Else
			{
				$Class = New $Class($Parameters);	
			}
			Return $Class;
		}
		*/
		
		Protected Function Generate($Parameters = NULL)
		{
			$Class  =   Get_Called_Class();
			Return New $Class($Parameters);
		}
		
		/*
		
		Protected Function Framework()
		{
			$Class = New self;
			Return $Class;
		}
		
		*/
		Protected Function Load_Module($Module)
		{
			
		}
		
		/*
		Public Function __Destruct()
		{
			Print $this;
		}
		*/
	}
?>