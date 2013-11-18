<?PHP

	// Register the AutoLoading class
	Require_Once("Core/Core.php");
	Require_Once(SYSTEM_DIRECTORY . '/Library/Library.php' );
	spl_autoload_register('SYSTEM::AutoLoad');
	
	/**
	 * @Internal
	 * Place into it's own namespace
	 */


	// TODO This class should just be a gateway to the interpreter with very few parameters
	Class SYSTEM
	{
		/** Variables **/
		Protected Static $SYSTEM;
		Private $Class = __CLASS__;
		Protected Static $Resource;
		Const Configuration = "Configuration2.xml";
		/** Entities **/
		Protected $Entity   =   Array
		(
        	"ID"    =>   NULL
		);
		// Static Assets
		Protected Static $Datasource;
		/*
		Protected Static $Library;
		Protected Static $Diagnostics;
		Protected Static $Controller;
		Protected Static $Configuration;
		Protected Static $Environment;
		Protected Static $Session;
		Protected Static $Security;
		Protected Static $User_Interface;
		Protected Static $Resource; // Holds all of the instances of classes
		*/
		Public Static Function AutoLoad($Class)
		{
			Try
			{
				$Library    =   \SYSTEM\Library::API();
				If(\SYSTEM\Library::Load($Class))
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
		Protected Function __Construct($Application)
		{
			// SYSTEM\Core::Configuration();
		}
		Public Static Function SYSTEM()
		{
			Return SYSTEM::API();	
		}
		Public Static Function API($Parameters    =   NULL)
		{
			$Class  =   Get_Called_Class();
			If(IsSet(Static::$Resource[$Class]));
			Else
			{
				Static::$Resource[$Class]    =   New $Class($Parameters);
			}
			Return Static::$Resource[$Class];
		}
		
		Protected Function __Call($Function,$Parameters)
		{
			Print "Calling";
			$Class = Get_Called_Class() . "\\{$Function}";
			If(Class_Exists($Class))
			{
				$Data = $Class::API();
			}
			Return $Data;
		}
		Protected Function __CallStatic($Class,$Parameters)
		{
			Print "Calling";
			
			$Function = $Parameters[0];
			Var_Dump($Class);Var_dump($Parameters);
			$Class = "\\" . Get_Called_Class() . "\\{$Class}\\{$Function}";
			Var_Dump($Class);Var_dump($Parameters);
			If(Class_Exists($Class))
			{
				
				$Data = $Class::API();
			}
				Return $Data;
		}
		
		Public Function Generate_SYSTEM_Datasource()
		{
			Static::$Diagnostics->Log_Append("Connecting to the SYSTEM Datasource.");
			Try
			{
				If(Static::$Datasource = \SYSTEM\Module\Datasource::API()->Generate_Connection(SYSTEM_DEFAULT_DATASOURCE));
				Else{Throw New\Exception($Result);}
				}
				Catch(\Exception $Exception)
				{
					Static::$Diagnostics->Log_Append("Unable to connect the SYSTEM Datasource.");
					Throw($Exception);
				}
				Static::$Diagnostics->Log_Append("Connection Successfull.");
			}
			Function Initialize()
			{
				Try
				{
					$Application = New Application($Application);
					Static::$SYSTEM =   New self;
				// create object
					
					$Core = Static::$SYSTEM->Core();
					// This should load only when needed... Otherwise a response is given back
					$Core::$User_Interface =  Static::Module("User_Interface");
					// User Interface Call
					
					$Result   =   Static::$SYSTEM->Core()->Initialize();;
					Var_Dump(Static::$Diagnostics->Retrieve_Log());Print "222";
					Var_Dump($Result);
					$Core::$Diagnostics->Log_Append("We are finished initializing the SYSTEM");

					// If diagonostics, output the log
					If(Static::$Diagnostics->Is_Diagnostics_User())
					{
						// Var_Dump(Static::$Diagnostics->Retrieve_Log());
					}
					If(Static::$Diagnostics->Diagnostics_Output_Enabled())
					{

					}


					// Convert to the appropriate output type
				}
				Catch(\Exception $Exception)
				{
					/** Catch the last exception **/
					self::$Diagnostics->Log_Append("We were unable to complete the initialization.");
					self::$Diagnostics->Log_Append(Array("Exception:" => $Exception));
				}
				Return $this;
			}
			Public Function Load_Library()
			{
				Require_Once(SYSTEM_DIRECTORY . '/Library/Library.php' );
			}
			Protected Function Load_Libraries()
			{
				Static::Load_Library();
			}
			Public Function Execute()
			{

			}
			
			Function __Destruct()
			{
				Print $this->Generate_XML();
				/*
				If(\SYSTEM\Module\Controller::API()->Retrieve_Request()->Retrieve_Parameter("Debug"))
				{
					Print_R(Static::$Diagnostics->Retrieve_Log());
				}
				*/
			}
			

		}
	?>
