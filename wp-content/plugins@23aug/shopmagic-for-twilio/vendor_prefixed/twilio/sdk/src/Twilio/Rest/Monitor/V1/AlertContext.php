<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Monitor\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class AlertContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the AlertContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Monitor\V1\AlertContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/Alerts/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a AlertInstance
     *
     * @return AlertInstance Fetched AlertInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Monitor\V1\AlertInstance($this->version, $payload, $this->solution['sid']);
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
        return '[Twilio.Monitor.V1.AlertContext ' . \implode(' ', $context) . ']';
    }
}
