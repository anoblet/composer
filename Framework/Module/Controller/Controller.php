<?php
Extends Framework\Module
{
	Class Controller Extends \Framework\Module
	{
		Protected Static $Default_User_Interface    =   "SYSTEM/Module/User_Interface/Generate_User_Interface";
		// Static Public $Request;
		// Static Public $Method;
		// Javascript Specific Target Entity ID
		Static Public $Target;
		//Static Public $User_Interface;
		Protected Static $Object;
		Private Static $Object_Override;
		Public Function Initialize()
		{
			// Retrieve request data.
			Try
			{
				Var_Dump(Static::Request()->Retrieve_Request());Die();
				If($this->Request_Path  =   \SYSTEM\Module\Controller\Request::API()->Retrieve_Parameter("Request_Path"));
				Else
				{
					$this->Request_Path =   Static::$Default_User_Interface;
				}
				If(IsSet(Static::$Object_Override))
				{           ;
				$this->Object_Overridden =   $this->Object;
				$this->Object   =   Static::$Object_Override;
				}
				If($this->Type  =   \SYSTEM\Module\Controller\Request::API()->Retrieve_Type());
				Else
				{
					$this->Type =   "User_Interface";
				}
				Switch($this->Type)
				{
					Default:
						{
							$Request_Path   =   \SYSTEM\Module\Controller\Request::API()->Retrieve_Parameter("Request_Path");
							If(IsSet($Request_Path) && $Request_Path !== "")
							{
								$Content =   $this->Parse($Request_Path);
							}
						}
					Case "User_Interface":
						{
							$Content    =   $this->Parse($this->Request_Path);
							$Result     =   Static::$Template
							->Set_Content($Content)
							->Generate_HTML_Document("Document");
							Break;
						}
					Case "Sub_User_Interface":
						{
							$Result =   $this->Parse($this->Request_Path);
							Break;
						}

				}
				// Format the results
				Print $Result;
			}
			Catch (\Exception $Exception)
			{
				/** Throw it back to the diagnostics system **/
				Var_Dump($Exception);
				Die();
				Static::$Diagnostics->Log_Append("Discerning the request type and acting appropriately");
				Static::$Diagnostics->Log_Append($Exception);
			}
			Return $this;
		}
		Public Function Set_Object($Object)
		{

		}
		Public Function Set_Target($Target)
		{
			$this->Target   =   $Target;
			Return $this;
		}
		// TODO Is this the right way?
		Public Function Retrieve_Request()
		{
			Return Static::$Request;
		}
		// TODO
		/*
		Public Function Retrieve_Request()
		{
			Return Controller\Request::API();
		}
		*/
		Public Function Override_Request($Object)
		{
			$this->$Object_Override =   $Object;
			Return $this;
		}
		Public Function Add_Routine($Routine)
		{
			Static::$Routines[] =   $Routine;
			Return $this;
		}

		/*
		Public Function Parse($Request_Path)
		{
			Try
			{
				// Root our incoming requests to the \SYSTEM

				$Request_Components =   Explode("/",$Request_Path);
				$Current_Count  =   1;
				For($X=0;$X<Count($Request_Components);$X++)
				{
					If($Current_Count==Count($Request_Components))
					{
						$Function  =   "{$Request_Components[$X]}";
					}
					Else
					{
						$Class[]    =   "{$Request_Components[$X]}";
					}
					$Current_Count++;
				}
				$Class  =   Implode("\\",$Class);
				// $Class  =   "\\SYSTEM" . $Class;
				// Function Check
				// We also need to deliberate between parameters and indexes
				/*
				 If(Function_Exists($Class::$Function()))
				 {
				 //$Result =   $Class::API()->{$Function}();
				 }
				 Else
				 {
				 // Defaulting to a view or an index
				 $Result =   $Class::API()->Index();
				 }

				If($Result =   $Class::API()->{$Function}());
				Else
				{
					Throw New \Exception("Unable to execute function");
                    }
                }
                Catch (\Exception $Exception)
                {
                     Throw New \Exception("Unable to complete request.","0000",$Exception);
                }
                Return $Result;
            }
            */
            Public Function Execute($Request)
            {
            $Result =   \SYSTEM\Module\Controller\XML::API()->Execute($Routine);
                Return $Result;
            }
            Public Function Load_Object($Object,$Target)
            {
                If(IsSet($this->Target));
                Try
                {
                    Static::$Diagnostics->Log_Append("Loading Object: {$Object}. Target: {$Target}");
                    If
                    (
                    $Result     =   \SYSTEM\Module\Javascript\JQuery\JQuery::API()
                                        ->Set_URL($Object)
                                        ->Add_Target($Target)
                                        ->Generate_Request()
                    );
                    Else
                    {

                        Throw New \Exception("Unable to load object.");
                    }

                }
                Catch(\Exception $Exception)
                {
                    Static::$Diagnostics->Log_Append($Exception);
                    // $Result = FALSE;
                    // This is where our error is thrown.
                    $Result =   "Error";
                }
                Return $Result;
            }
            Public Function Load_Threaded_Object($Object,$Target)
            {
                If(IsSet($this->Target));
                Try
                {
                    Static::$Diagnostics->Log_Append("Loading SubRoutine: {$Object}. Target: {$Target}");
                    If
                    (
                    $Result     =   \SYSTEM\Module\Javascript\JQuery\JQuery::API()
                                        ->Set_URL($Object)
                                        ->Add_Target($Target)
                                        ->Generate_Request()
                    );
                    Else
                    {

                        Throw New \Exception("Unable to load object.");
                    }

                }
                Catch(\Exception $Exception)
                {
                    Static::$Diagnostics->Log_Append($Exception);
                    // $Result = FALSE;
                    // This is where our error is thrown.
                    $Result =   "Error";
                }
                Return $Result;
            }
            Function Parse_XSLT()
            {

            }
        }
    }
?>
