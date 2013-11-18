<?PHP
Namespace Framework\Module\XML\Library
{
	Class XML Extends \Framework
	{
		// Relative
		Public Function Convert_to_Object($XML_File)
		{Var_dump(debug_backtrace());
			$File = $this::Directory . "\\" . $XML_File;
			$File_Path  =   BASE_DIRECTORY . "{Static::$Class}\\{$XML_File}";
			Try
			{
				If(Is_File($File))
				{
					$XML = SimpleXML_Load_File($File);
				}
				ElseIf(Is_File($XML_File))
				{
					$XML =    SimpleXML_Load_File($XML_File);
				}

				ElseIf(Is_File($File_Path))
				{
					$XML =    SimpleXML_Load_File($File_Path);
				}
				Else
				{
					Throw New \Exception("Cannot find file: {$XML_File}");
                    }

                }
                Catch (\Exception $Exception)
                {
                    Throw $Exception;
                }

                Return $XML;
            }
        }
        Class __API
        {
            Public Function Open_File()
            {

            }
            Public Function Retrieve_Element_Value_XPath($XML_Object,$Path)
            {
            $Array  =   $XML_Object->XPath($Path);
            $Array_Count = Count($Array);

                For($I=0;$I<$Array_Count;$I++)
                {

                $String =   $Array[$I];
                }

                Return $String;
            }

        }
        Class __Functions
        {

        }
    }
?>