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
    public function getTemplate($Data = null, $Template = null) {
        if(isset($Template));
        else {
            $Template = $this->__getClass();
        }

        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        $Count = count($Parts);
        if($Parts[$Count-2] == "Model") {
            array_splice($Parts, -2, 2);
            $Class = implode("\\", $Parts);
        }
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);
        $File = $Class . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $Template;

        ob_start();
        extract($Data);
        include($File);
        $HTML = ob_get_contents();
        ob_get_clean();

        return $HTML;
    }
}
?>