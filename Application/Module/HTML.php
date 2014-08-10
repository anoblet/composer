<?php
namespace Application\Module {

	class HTML extends \Application\Module {
		public $document;
		public function toHTML($data = null, $document = null) {
			if (isset($document));
			else {
				$document = new \DOMDocument();
				$document->formatOutput = true;
				
				$child = $this->toHTML($data, $document);
				$document->appendChild($child);
				
				$html = $document->saveHTML();
				
				return $html;
			}
			
			if (is_string($data)) {
				// $element = $document->createTextNode
			} elseif (is_array($data)) {
				foreach ($data as $property => $value) {
					$elements[] = $this->toHTML($value, $document);
				}
			} elseif (is_object($data)) {
				$element = $document->createElement($data->__getClass());
				foreach ($data as $property => $value) {
					$child = $this->toHTML($value, $document);
					$element->appendChild($child);
				}
			}
			
			return $element;
		}
	}
}

?>