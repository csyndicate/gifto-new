<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class SsmlEmphasis extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * SsmlEmphasis constructor.
     *
     * @param string $words Words to emphasize
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array())
    {
        parent::__construct('emphasis', $words, $attributes);
    }
    /**
     * Add Level attribute.
     *
     * @param string $level Specify the degree of emphasis
     * @return static $this.
     */
    public function setLevel($level)
    {
        return $this->setAttribute('level', $level);
    }
}
