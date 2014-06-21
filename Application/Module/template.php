<?php
namespace Application\Module;

class Template extends \Application\Module {
	public function includeFile($file)
	{
		ob_start();
		include($file);
		$contents = ob_get_clean();
		
		return $contents;
	}
}
?>