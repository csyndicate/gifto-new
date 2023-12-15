<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Reject extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Reject constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct('Reject', null, $attributes);
    }
    /**
     * Add Parameter child.
     *
     * @param array $attributes Optional attributes
     * @return Parameter Child element.
     */
    public function parameter($attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\Parameter
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\Parameter($attributes));
    }
    /**
     * Add Reason attribute.
     *
     * @param string $reason Rejection reason
     */
    public function setReason($reason) : self
    {
        return $this->setAttribute('reason', $reason);
    }
}
