<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class BusinessList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the BusinessList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Preview\TrustedComms\BusinessList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array();
    }
    /**
     * Constructs a BusinessContext
     *
     * @param string $sid A string that uniquely identifies this Business.
     * @return \Twilio\Rest\Preview\TrustedComms\BusinessContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\BusinessContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Preview.TrustedComms.BusinessList]';
    }
}
