<?php
namespace Application\Module {

    class HTML extends \Application\Module\Module
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

        public function toHTML($data)
        {
            if (isset($this->document)) {
                $this->createElement($data);
            } else {
                $this->createDocument();
                $root = $this->createElement($data);
                $this->document->appendChild($root);
            }


            if (isset($parent)) {
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
                    if (isset($classElement)) ; else {
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
            }


            $this->document->preserveWhiteSpace = false;
            $this->document->formatOutput = true;
            $html = $this->document->saveXML($this->document, LIBXML_NOEMPTYTAG);

            return $html;
        }

        public function createElement($element) {
            $model = $this->getModel("Element")->setLabel($element);

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
                    $element = $document->createElement($data->getLabel());
                    foreach($data->getChildren() as $child) {
                        $this->serialize($child, $element, $document);
                    }
                    $parent->appendChild($element);
                }
                elseif (is_object($data)) {
                    $element = $document->createElement($data->getLabel());
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