<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Redirect extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Redirect constructor.
     *
     * @param string $url Redirect URL
     * @param array $attributes Optional attributes
     */
    public function __construct($url, $attributes = array())
    {
        parent::__construct('Redirect', $url, $attributes);
    }
    /**
     * Add Method attribute.
     *
     * @param string $method Redirect URL method
     * @return static $this.
     */
    public function setMethod($method)
    {
        return $this->setAttribute('method', $method);
    }
}
