<?PHP
Extends Framework\Library\SubSYSTEM
{
	Class __Methods
	{
		Public Function Initialize($Object)
		{
			$SubRoutines = $Object->SubRoutines;
			$Object->SubRoutine_Count = Count($SubRoutines);
			For($X=0;$X <= $SubRoutine_Count; $X++)
			{
				$Return_Object->SubRoutines = \SYSTEM\Library\SubSYSTEM\__Methods::SubRoutine[$X]);
			}
		}

		Public Function SubRoutine($Object)
		{
			Try
			{
				$Method     = $Object->Method;
				$Function   = $Object->Function;
				$Parameters = $Object->Parameters;

				$SubRoutine = $Method::$Function($Parameters);
				If($SubRoutine->Result)
				{
					$Object = $SubRoutine;
				}
				Else
				{
					Throw $SubRoutine;
				}
			}
			Catch (\Exception $Object)
			{
				Throw $Object;
			}
			Return $Object;
		}
	}
}
?>