<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class IpAddressContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the IpAddressContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The unique sid that identifies this account
     * @param string $ipAccessControlListSid The IpAccessControlList Sid that
     *                                       identifies the IpAddress resources to
     *                                       fetch
     * @param string $sid A string that identifies the IpAddress resource to fetch
     * @return \Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\IpAddressContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid, $ipAccessControlListSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'ipAccessControlListSid' => $ipAccessControlListSid, 'sid' => $sid);
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/SIP/IpAccessControlLists/' . \rawurlencode($ipAccessControlListSid) . '/IpAddresses/' . \rawurlencode($sid) . '.json';
    }
    /**
     * Fetch a IpAddressInstance
     *
     * @return IpAddressInstance Fetched IpAddressInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\IpAddressInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['ipAccessControlListSid'], $this->solution['sid']);
    }
    /**
     * Update the IpAddressInstance
     *
     * @param array|Options $options Optional Arguments
     * @return IpAddressInstance Updated IpAddressInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('IpAddress' => $options['ipAddress'], 'FriendlyName' => $options['friendlyName'], 'CidrPrefixLength' => $options['cidrPrefixLength']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\IpAddressInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['ipAccessControlListSid'], $this->solution['sid']);
    }
    /**
     * Deletes the IpAddressInstance
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
        return '[Twilio.Api.V2010.IpAddressContext ' . \implode(' ', $context) . ']';
    }
}
