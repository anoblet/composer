<?php

Extends Framework

{

	Class Entities Extends \Framework\Module

	{

		Function __Call($Function,$Parameters)

		{

			Var_Dump($this);

			Switch($Function)

			{

				// Throw over to data source

				Case "Create":

					{

						\SYSTEM\Module\Datasource::$Function($Parameters);

					}

				Case "Edit":

					{



					}

				Case "View":

					{

						Entities\View::View();

					}

				Case "Delete";

				{



				}

			}

			Print "Here";

		}



		Public Function __Construct()
		{
			$this->Attributes	=	$this->Retrieve_Attributes();
		}



		Protected Function Retrieve_Attributes()

		{

			$Attributes =   Static::$Datasource

				->Generate_Query("Retrieve_Structure")

				->Set_Database('raheimsg_DATA')

				->Set_Table($this->Datasource['Table'])

				->Execute()

				->Data;

			Return $Attributes;

		}



		Public Static Function Retrieve_Template()

		{

			Return Static::Template;

		}

		/**

		 * Parameters

		 *   Entity

		 *       Template

		 *       XSLT

		 *       Object

		 */

		Public Function Retrieve_Structure()

		{

			$Structure =   Static::$Datasource

			->Generate_Query("Retrieve_Structure")

			->Set_Database('andy_DATA')

			->Set_Table('People')

			->Execute()

			->Data;

			Return $Structure;

		}

		Public Function View()

		{

			If($Filters['ID']  =   Static::$Request->Retrieve_Request()->Retrieve_Parameter("ID"));

			Else

			{

				Throw New \Exception("ID not defined.");

            }

			$this->Data =   Static::$Datasource
				->Generate_Query("Retrieve")
				->Set_Database('raheimsg_DATA')
				->Set_Table($this->Configuration['Table'])
				->Set_Filters(Array("ID"	=>	$Filters['ID']))
				/*Set_Parameter("Format","XML")*/
				->Set_Format("XML")
				->Execute()
				->Data;

                // $HTML   =   \SYSTEM\Module\Template::Load_Template_Relative(Static::Template);

                Return $this;

            }

            /**

             * @todo needs to be able to take tables (Variations of the location of standard and eav tabls

             *

             *

             */



        Public Function Retrieve_Entity($ID)

        {



        }

        Public Function Retrieve_Children($ID)

        {

        	$Data =   Static::$Datasource

				->Generate_Query("Retrieve")

				->Set_Database('raheimsg_DATA')

				->Set_Table('People')

				->Set_Filters(Array("Parent"	=>	$Filters['ID']))

				->Execute()

				->Data;

        }

        Public Function Generate_HTML()
        {
			Return \SYSTEM\Module\Template::Parse_XSLT($this->Data,$this->XSL);
        }



	    }

	}

?>
