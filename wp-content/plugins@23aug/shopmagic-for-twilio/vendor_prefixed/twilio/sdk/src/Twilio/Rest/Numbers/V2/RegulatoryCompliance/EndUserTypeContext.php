<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class EndUserTypeContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the EndUserTypeContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the End-User Type
     *                    resource
     * @return \Twilio\Rest\Numbers\V2\RegulatoryCompliance\EndUserTypeContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/RegulatoryCompliance/EndUserTypes/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a EndUserTypeInstance
     *
     * @return EndUserTypeInstance Fetched EndUserTypeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\EndUserTypeInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Numbers.V2.EndUserTypeContext ' . \implode(' ', $context) . ']';
    }
}
