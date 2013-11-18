<?PHP
/**
 * Copyright Andy Noblet 2010
 **/
?>
<?PHP
Extends Framework
{
	Class Library Extends SYSTEM
	{
		Public $AutoLoad_Object;
		Public $File_Path;

		Function __Construct()
		{
			Return;
		}

		Public Function __AutoLoad($Object)
		{
			$this->AutoLoad_Object  =   $Object;
			// This is where we declare the conversion from Class to Directory
			$this->File_Path    =    $this->Convert_Object_File_Path($Object);
			$this->File_Path_Deprecated    =   $this->Convert_Object_File_Path_Deprecated($Object);

			Try
			{
				If(Is_File(BASE_DIRECTORY . $this->File_Path))
				{
					$this->Include_File($this->File_Path);
				}
				ElseIf(Is_File(BASE_DIRECTORY . $this->File_Path_Deprecated))
				{
					$this->Include_File($this->File_Path_Deprecated);
				}
				Else
				{
					Throw New \Exception("Cannot locate file: {$this->File_Path}.");
                    }
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
                            $this->Error    =   "Class not existent";

                                ;
                            }
                }
                Catch(\Exception $Exception)
                {  
                    Throw $Exception;
                }
                Return;  
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
                     Include($File_Path);   
                }
                Catch(\Exception $Exception)
                {             
                    Static::$Diagnostics->Log_Append($Exception);
                    Return FALSE;
                }
                
                Return TRUE;
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
			}
		}
		?>