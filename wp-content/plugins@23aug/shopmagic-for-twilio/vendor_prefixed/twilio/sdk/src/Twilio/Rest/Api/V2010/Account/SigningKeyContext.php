<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class SigningKeyContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the SigningKeyContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\SigningKeyContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid);
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/SigningKeys/' . \rawurlencode($sid) . '.json';
    }
    /**
     * Fetch a SigningKeyInstance
     *
     * @return SigningKeyInstance Fetched SigningKeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\SigningKeyInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['sid']);
    }
    /**
     * Update the SigningKeyInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SigningKeyInstance Updated SigningKeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\SigningKeyInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['sid']);
    }
    /**
     * Deletes the SigningKeyInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Api.V2010.SigningKeyContext ' . \implode(' ', $context) . ']';
    }
}
