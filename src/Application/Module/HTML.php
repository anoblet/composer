<?php
namespace Application\Module {

    class HTML extends \Application\Module
    {
        public $document;
        public $html;

        public function createDocument()
        {
            $this->document = new \DOMDocument();

            // $document = $this->getModel("html");

            return $this;
        }

        public function addNode($node)
        {
            return $this->createElement($node);
        }

        public function createElement($element) {
            $model = $this->getModel("Element")->setTag($element);

            return $model;
        }

        public function createNode($element)
        {
            return $this->getModel("Element")->setElement($element);
        }

        public function serialize($data, $parent = null, $document = null) {
            $HTML = null;

            if(isset($document)) {
                if(is_string($data)) {
                    $element = $document->createTextNode($data);
                    $parent->appendChild($element);
                }
                elseif ((is_array($data))) {
                    $element = $document->createElement($data->getTag());
                    foreach($data->getChildren() as $child) {
                        $this->serialize($child, $element, $document);
                    }
                    $parent->appendChild($element);
                }
                elseif (is_object($data)) {
                    $element = $document->createElement($data->getTag());
                    foreach($data->getChildren() as $child) {
                        $this->serialize($child, $element, $document);
                    }
                    $parent->appendChild($element);
                }
            }
            else {
                $document = new \DOMDocument();
                $document->preserveWhiteSpace = false;
                $document->formatOutput = true;
                $this->serialize($data, $document, $document);
                $HTML = $document->saveXML($document, LIBXML_NOEMPTYTAG);
            }

            return $HTML;
        }
    }
}

?>