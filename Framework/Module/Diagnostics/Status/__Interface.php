<?PHP
Extends Framework\Diagnostics\Status
{
	Class __Interface
	{
		// Linked Update_Status and Output_Status
		Protected $Diagnostics_Level;

		Public Function __construct()
		{
			Return \SYSTEM\Diagnostics\Status\__Interface::Generate_Message("Initializing " . __CLASS__  . ".");
          }

          Protected Function Generate_Message($Message)
          {                                                                                                     
            Try
            {
                If(\SYSTEM\Module\Security\Authentication\__Interface::Audit_Authentication_Level(/*Pull From Database*/ 0))
                {
                
                $String = "
                <Pre>Status Update:\n
                {$Message} \n";
                $Result = $String;
		}
		Else
		{
			Throw New \Exception("You are not allowed to access this command");
                }
            }
            Catch(Exception $Exception)
            {
            $Result = $Exception;
            }  
          }
          
      }
  }
  
?>
