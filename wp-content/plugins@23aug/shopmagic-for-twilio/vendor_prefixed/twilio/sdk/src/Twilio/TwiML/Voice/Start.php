<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Start extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Start constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct('Start', null, $attributes);
    }
    /**
     * Add Stream child.
     *
     * @param array $attributes Optional attributes
     * @return Stream Child element.
     */
    public function stream($attributes = array())
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\Stream($attributes));
    }
    /**
     * Add Siprec child.
     *
     * @param array $attributes Optional attributes
     * @return Siprec Child element.
     */
    public function siprec($attributes = array())
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\Siprec($attributes));
    }
    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     * @return static $this.
     */
    public function setAction($action)
    {
        return $this->setAttribute('action', $action);
    }
    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method)
    {
        return $this->setAttribute('method', $method);
    }
}
