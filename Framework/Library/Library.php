<?PHP
/**
 * Copyright Andy Noblet 2010
 **/
Namespace Framework
{
	Class Library 
	{
		Private $Namespace = TRUE;
		Protected Static $Include_Paths	=	Array
		(
			NULL,
			"SYSTEM/"
		);
		Protected Static $Extensions = Array
		(
			NULL,
			".php",
			".mdl"
		);
		Public $AutoLoad_Object;
		Public $File_Path;

		Function __Construct()
		{
			Return;
		}

		/* Static */ Function Load($Object)
		{
			
			$Namespace = NULL;
			
			If(Is_File(BASE_DIRECTORY . $Object))	
			{
			}
			$Segments= Explode("\\",$Object);
			If(Count($Segments) === 1)
			{
				$Class = End($Segments);
			}
			Else
			{
				$Class = End($Segments);
				Array_Pop($Segments);
				$Namespace = Implode($Segments,"\\");		
			}
			
			// This is where we declare the conversion from Class to Directory
			/*
			$File_Path    =    $this->Convert_Object_File_Path($Object);
			$File_Path_Deprecated    =   $this->Convert_Object_File_Path_Deprecated($Object);
			*/
			Try
			{
				ForEach(Static::$Include_Paths As $Include_Path)
				{
					ForEach(Static::$Extensions as $Extension)
					{	
						$File	=	BASE_DIRECTORY . DIRECTORY_SEPARATOR . $Include_Path . $Namespace . DIRECTORY_SEPARATOR . $Class . $Extension;
						$Namespaced_File = BASE_DIRECTORY . DIRECTORY_SEPARATOR . $Include_Path . $Namespace . DIRECTORY_SEPARATOR . $Class . DIRECTORY_SEPARATOR . $Class . $Extension;
						If(Is_File($File))
						{
							Require_Once($File);
						}
												
						If(Is_File($Namespaced_File))
						{
							Require_Once($Namespaced_File);
						}
					}

				}
				/*
				If(Is_File(BASE_DIRECTORY . $this->File_Path // TODO . $this->Extension ))
				{
					$this->Include_File($this->File_Path);
				}
				ElseIf(Is_File(BASE_DIRECTORY . $this->File_Path_Deprecated))
				{
					$this->Include_File($this->File_Path_Deprecated);
				}

				// Model
				ElseIf(Is_File(BASE_DIRECTORY . $this->Retrieve_Class_Directory($Object).".mdl"))
				{
					
					Require(BASE_DIRECTORY . $this->Retrieve_Class_Directory($Object).".mdl");
					
				}
				ElseIf(Is_File(BASE_DIRECTORY . DIRECTORY_SEPARATOR . "SYSTEM" . $this->Retrieve_Class_Directory($Object).".php"))
				{
					
					Require(BASE_DIRECTORY . DIRECTORY_SEPARATOR . "SYSTEM" . $this->Retrieve_Class_Directory($Object).".php");
					
				}
				Else
				{				
					// Throw New \Exception("Cannot locate file: " . BASE_DIRECTORY . DIRECTORY_SEPARATOR . "SYSTEM" . $this->Retrieve_Class_Directory($Object));
                }*/
                        // Check if the Class or Interface exists.
                            If
                            (
                                Class_Exists($Object)
								||
								Interface_Exists($Object)
                            )
                            {
                            }
                            Else
                            {
                            $Data    =   "Class not existent";

                                ;
                            }
                }
                Catch(\Exception $Exception)
                {
                    Throw $Exception;
                }
                Return;
            }
			Protected Function Retrieve_Class_Directory($Class = NULL)
			{
				If($Class);
				Else
				{
					$Class  =   Get_Called_Class();
				}
				Return "/" . Str_Replace("\\","/",$Class);
			}
            Public Function Include_File($File)
            {
            	$File_Path    =   BASE_DIRECTORY . $File;

                Try
                {
                    // Check if file is there.
                    If($Result  =   Is_File($File_Path));
                    Else
                    {
                        /*
                        $this->Error    =   "Unable to locate file. {$this->File_Path}";
                         Throw SYSTEM::$Diagnostics->API()
                            ->Set_Child($this)
                            ->Generate_Error()
                        ;
                        */
                        Throw New \Exception("Unable to locate: {$File_Path}");
                    }
                     $Result = Include($File_Path);
                }
                Catch(\Exception $Exception)
                {
                    Static::$Diagnostics->Log_Append($Exception);
                    $Result	= FALSE;
                }

                Return $Result;
            }
            /**
            * @Internal
            * Should be encapsulated within a NameSpace
            */
            Public Function Convert_Object_File_Path_Deprecated($Object)
            {
            $File_Path = str_replace("\\",DIRECTORY_SEPARATOR,$Object);
            $File_Path  = "/" . $File_Path . ".php";
            Return $File_Path;
				}
				Public Function Convert_Object_File_Path($Object)
				{
					/** Conver to a Directory Slash **/
					$File_Path = str_replace("\\",DIRECTORY_SEPARATOR,$Object);
					/** Append a duplicated last segment **/
					$Section_Array  =   Explode(DIRECTORY_SEPARATOR,$File_Path);

					For($X=0;$X<Count($Section_Array);)
					{
						$Section    =   $Section_Array[$X];
						If($X===Count($Section_Array)-1):
						{
							$File_Path .= "/{$Section}";
						}
						EndIf;

						$X++;
					}

					/** Add the extension **/
					$File_Path  =   "/{$File_Path}.php";

					Return $File_Path;
				}
				
				Protected Function Retrieve_Class($Method)
				{
					$Class = End(Explode("/",$Method));
					Return $Class;
				}
				
				Function __Destruct()
				{

				}
			}
		}
		?>