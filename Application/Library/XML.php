<?php
namespace Application\Modules;

class XML {
	public function toXML($data) {
		if (isset($this->XML));
		else {
			$this->XML = new \XMLWriter();
			$this->XML->openMemory();
			$this->XML->startDocument('1.0');
			$this->XML->setIndent(true);
		}
		if (is_string($data)) {
			$this->XML->text($data);
		} elseif (is_array($data)) {
			foreach ($data as $key => $value) {
				$this->XML->startElement($key);
				$this->toXML($value);
				$this->XML->endElement();
			}
		} elseif (is_object($data)) {
			$this->XML->startElement($data->__getClass());
			foreach($data->_getAttributes() as $name => $value)
			{
				$this->XML->writeAttribute($name, $value);
			}
			foreach ($data as $key => $value) {
				$this->toXML($value);
			}
			$this->XML->endElement();
		}
		
		return $this;
	}
	public function getXML() {
		return $this->XML->outputMemory(true);
	}
}

?>
