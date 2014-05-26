<?php
namespace Application\Library;

class HTML {
	public function toHTML($data) {
		if (isset($this->HTML));
		else {
			$this->HTML = new \XMLWriter();
			$this->HTML->openMemory();
			$this->HTML->startDocument('1.0');
			$this->HTML->setIndent(true);
		}
		if (is_string($data)) {
			$this->HTML->text($data);
		} elseif (is_array($data)) {
			foreach ($data as $key => $value) {
				// $this->HTML->startElement($key);
				$this->toHTML($value);
				// $this->HTML->endElement();
			}
		} elseif (is_object($data)) {
			if (method_exists($data, "_getClass")) {
				$this->HTML->startElement(strtolower($data->_getClass()));
			}
			else {
				die("Cannot grab the class from the object.");
			}
			foreach ($data->_getAttributes() as $name => $value) {
				$this->HTML->writeAttribute($name, $value);
			}
			foreach ($data as $key => $value) {
				$this->toHTML($value);
			}
			$this->HTML->endElement();
		}
		
		return $this;
	}
	public function getHTML() {
		return $this->HTML->outputMemory(true);
	}
}

?>
