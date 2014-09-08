<?php
namespace Application\Module {

    class HTML extends \Application\Module
    {
        public $document;
        public $html;

        public function toHTML($data)
        {
            $this->document = new \DOMDocument();
            $root = $this->createElement($data);
            $this->document->appendChild($root);
            $this->document->preserveWhiteSpace = false;
            $this->document->formatOutput = true;
            $html = $this->document->saveXML($root, LIBXML_NOEMPTYTAG);

            return $html;
        }

        public function createElement($data, $parent = null)
        {
            if (is_string($data)) {
                $this->document->createTextNode($data);
            }
            if (is_array($data)) {
                foreach ($data as $child) {
                    $parent->appendChild($this->createElement($child));
                    $element = null;
                }
            }
            if (is_object($data)) {
                $classElement = $data->getElement();
                if (isset($classElement));else {
                    $classElement = strtolower($data->__getClass());;
                }

                $element = $this->document->createElement($classElement);
                $attributes = $data->getAttributes();
                foreach ($attributes as $attributes => $value) {
                    $element->setAttribute($attributes, $value);
                }
                foreach ($data as $child) {
                    if (is_array($child)) {
                        $this->createElement($child, $element);
                    } else {
                        $element->appendChild($this->createElement($child, $element));
                    }
                }

            }

            return $element;
        }
    }
}

?>