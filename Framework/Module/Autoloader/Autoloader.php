<?php

	Namespace Framework\Module
	{
		// Require_Once 'Zend/Loader/Autoloader.php';
		Require_Once("Framework/Library/Library.php");
		
		Class Autoloader 
		{
			Public Function __Construct($Parameters)
			{

			}
			Public Static Function Retrieve_Autoloader()
			{
				Return \Zend_Loader_Autoloader::getInstance();
			}
			Public Static Function Autoload($Class)
			{
				/*
				$Components = Explode("\\",$Class);
				$Class = Array_Pop($Components);
				$Namespace = Implode("\\", $Components);
				$Class = Str_Replace("\\",DIRECTORY_SEPARATOR,$Class);
				*/
				Try
				{
					If(\Framework\Library::Load($Class))
					{		
						// static::$Diagnostics->Log_Append("Autoloade: {$Object}");
					}
					Else
					{
						// static::$Diagnostics->Log_Append("Unable to Autoload: {$Object}");
					}
				}
				Catch (\Exception $Exception)
				{
					Var_Dump($Object);Var_Dump($Exception);
				}
				Return;
			}
			
			Public Function __Destruct()
			{
				Print $this;
			}
		}
		

	}