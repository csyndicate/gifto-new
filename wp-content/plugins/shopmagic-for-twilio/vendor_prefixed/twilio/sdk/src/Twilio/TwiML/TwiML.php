<?php

namespace ShopMagicTwilioVendor\Twilio\TwiML;

use DOMDocument;
use DOMElement;
/**
 * @property $name string XML element name
 * @property $attributes array XML attributes
 * @property $value string XML body
 * @property $children TwiML[] nested TwiML elements
 */
abstract class TwiML
{
    protected $name;
    protected $attributes;
    protected $children;
    /**
     * TwiML constructor.
     *
     * @param string $name XML element name
     * @param string $value XML value
     * @param array $attributes XML attributes
     */
    public function __construct(string $name, string $value = null, array $attributes = [])
    {
        $this->name = $name;
        $this->attributes = $attributes;
        $this->children = [];
        if ($value !== null) {
            $this->children[] = $value;
        }
    }
    /**
     * Add a TwiML element.
     *
     * @param TwiML|string $twiml TwiML element to add
     * @return TwiML $this
     */
    public function append($twiml) : \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
    {
        $this->children[] = $twiml;
        return $this;
    }
    /**
     * Add a TwiML element.
     *
     * @param TwiML $twiml TwiML element to add
     * @return TwiML added TwiML element
     */
    public function nest(\ShopMagicTwilioVendor\Twilio\TwiML\TwiML $twiml) : \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
    {
        $this->children[] = $twiml;
        return $twiml;
    }
    /**
     * Set TwiML attribute.
     *
     * @param string $key name of attribute
     * @param string $value value of attribute
     * @return static $this
     */
    public function setAttribute(string $key, string $value) : \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
    {
        $this->attributes[$key] = $value;
        return $this;
    }
    /**
     * @param string $name XML element name
     * @param string $value XML value
     * @param array $attributes XML attributes
     * @return TwiML
     */
    public function addChild(string $name, string $value = null, array $attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\GenericNode($name, $value, $attributes));
    }
    /**
     * Convert TwiML to XML string.
     *
     * @return string TwiML XML representation
     */
    public function asXML() : string
    {
        return (string) $this;
    }
    /**
     * Convert TwiML to XML string.
     *
     * @return string TwiML XML representation
     */
    public function __toString() : string
    {
        return $this->xml()->saveXML();
    }
    /**
     * Build TwiML element.
     *
     * @param TwiML $twiml TwiML element to convert to XML
     * @param DOMDocument $document XML document for the element
     * @return DOMElement $element
     */
    private function buildElement(\ShopMagicTwilioVendor\Twilio\TwiML\TwiML $twiml, \DOMDocument $document) : \DOMElement
    {
        $element = $document->createElement($twiml->name);
        foreach ($twiml->attributes as $name => $value) {
            if (\is_bool($value)) {
                $value = $value === \true ? 'true' : 'false';
            }
            $element->setAttribute($name, $value);
        }
        foreach ($twiml->children as $child) {
            if (\is_string($child)) {
                $element->appendChild($document->createTextNode($child));
            } else {
                $element->appendChild($this->buildElement($child, $document));
            }
        }
        return $element;
    }
    /**
     * Build XML element.
     *
     * @return DOMDocument Build TwiML element
     */
    private function xml() : \DOMDocument
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        $document->appendChild($this->buildElement($this, $document));
        return $document;
    }
}
