<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class SsmlSayAs extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * SsmlSayAs constructor.
     *
     * @param string $words Words to be interpreted
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = [])
    {
        parent::__construct('say-as', $words, $attributes);
    }
    /**
     * Add Interpret-As attribute.
     *
     * @param string $interpretAs Specify the type of words are spoken
     */
    public function setInterpretAs($interpretAs) : self
    {
        return $this->setAttribute('interpret-as', $interpretAs);
    }
    /**
     * Add Format attribute.
     *
     * @param string $format Specify the format of the date when interpret-as is
     *                       set to date
     */
    public function setFormat($format) : self
    {
        return $this->setAttribute('format', $format);
    }
}
