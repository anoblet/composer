<?php
    Extends Framework\Module\Quotes
    {
        Class Submit Extends \Framework\Module\Quotes
        {
        	Static $Form    =   "/SYSTEM/Module/Quotes/Submit/Template/Form.tpl";
            Public $Action =   "/Quotes/Submit/Process";
            Static $Process_URL =   "SYSTEM/Module/Quotes/Submit/Process.xml";


            Public Function Generate_Form()
            {
                $this->CSS  =   \SYSTEM\Library\Stylesheets\Stylesheets::Generate_Stylesheet(BASE_URL."/SYSTEM/Module/Quotes/Submit/Template/Form.css");
                $this->CSS  .=   \SYSTEM\Library\Stylesheets\Stylesheets::Generate_Stylesheet("http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css");
                // $this->Javascript   =   \SYSTEM\Module\Javascript::API()->Load_Javacript(BASE_URL .'/SYSTEM/Module/Quotes/Submit/Javascript/Submit.js',NULL);
                $Form  =   \SYSTEM\Module\Template::Load_Template(Static::$Form);
                /* $Form   =   \SYSTEM\Module\User_Interface::API()->Generate_Window($Content); */
                $this->Data	=	$Form;
                Return $this;
            }
            /**
            * Generic Function
            * Takes parameter and matching value
            * Returns Array of Object ID's
            */
            /*
            Public Function Match(Array $Parameters)
            {
                If()
                Else
                {

                }
                Return $Result;
            }
            */
            Public Function Match_Author($Name)
            {
                Return $Result;
            }
            Public Function Process()
            {
                Try
                {
                    // Retrieve Form Data
                    // If($Quote  =   Static::$Controller->Retrieve_Request()->Retrieve_Parameter("Quote"));
                    If($Quote  =   Static::$Request->Retrieve_Request()->Retrieve_Parameter("Quotation"));
                	ElseIf(Is_String($Quote));
                    Else
                    {
                        Throw New \Exception("Invalid Quote: {$Quote}");
                    }
                    //If($Author =   Static::$Controller->Retrieve_Request()->Retrieve_Parameter("Author"));
                    If($Author =   Static::$Request->Retrieve_Request()->Retrieve_Parameter("Author"));
                    ElseIf(Is_String($Author));
                    Else
                    {
                        Throw New \Exception("Invalid Author");
                    }

                    $Datasource = Static::$Datasource
                        ->Generate_Object();

                    // Generate the Quote Object
                    $Quote_ID  =   $Datasource->Generate_Data_Object()->Retrieve_ID();
                    Static::$Diagnostics->Log_Append("Quote ID: {$Quote_ID}");

                    /** Standard **/
                    $Result =   $Datasource
                    ->Generate_Query("Create")
                        ->Set_Database("raheimsg_DATA")
                        ->Set_Table('Quotes')
                        ->Set_Operation('Create')
                        ->Set_Data
                        (
                            Array
                            (
                                "Object_ID" =>  $Quote_ID,
                                "Quote" =>  $Quote,
                                "Author"     =>  $Author
                            )
                        )
                        ->Execute();
                    /** End Standard **/

                    /** EAV **/


                    /** End EAV **/

                }
                Catch(\Exception $Exception)
                {
                    Throw $Exception;
                }
                $this->Data	=	"Thank you for submitting your quote.";
                Return $this;
            }
        }
    }
?>
