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
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class EndUserContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the EndUserContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Numbers\V2\RegulatoryCompliance\EndUserContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/RegulatoryCompliance/EndUsers/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a EndUserInstance
     *
     * @return EndUserInstance Fetched EndUserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\EndUserInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the EndUserInstance
     *
     * @param array|Options $options Optional Arguments
     * @return EndUserInstance Updated EndUserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName'], 'Attributes' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['attributes'])));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\EndUserInstance($this->version, $payload, $this->solution['sid']);
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
        return '[Twilio.Numbers.V2.EndUserContext ' . \implode(' ', $context) . ']';
    }
}
