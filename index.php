<?php

	Require_Once("Application.php");
		
	$Application = New Application();
	$Application->Initialize();
	
	print_r($Application->Module("Diagnostics")->Retrieve_Log());
	
?>