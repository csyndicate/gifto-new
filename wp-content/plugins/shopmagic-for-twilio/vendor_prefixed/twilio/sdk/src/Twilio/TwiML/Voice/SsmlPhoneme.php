<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class SsmlPhoneme extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * SsmlPhoneme constructor.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = [])
    {
        parent::__construct('phoneme', $words, $attributes);
    }
    /**
     * Add Alphabet attribute.
     *
     * @param string $alphabet Specify the phonetic alphabet
     */
    public function setAlphabet($alphabet) : self
    {
        return $this->setAttribute('alphabet', $alphabet);
    }
    /**
     * Add Ph attribute.
     *
     * @param string $ph Specifiy the phonetic symbols for pronunciation
     */
    public function setPh($ph) : self
    {
        return $this->setAttribute('ph', $ph);
    }
}
