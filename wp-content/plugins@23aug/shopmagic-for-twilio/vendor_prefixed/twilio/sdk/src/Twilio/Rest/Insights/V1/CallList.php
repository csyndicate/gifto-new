<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Insights\V1;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class CallList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the CallList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Insights\V1\CallList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array();
    }
    /**
     * Constructs a CallContext
     *
     * @param string $sid The sid
     * @return \Twilio\Rest\Insights\V1\CallContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Insights.V1.CallList]';
    }
}
