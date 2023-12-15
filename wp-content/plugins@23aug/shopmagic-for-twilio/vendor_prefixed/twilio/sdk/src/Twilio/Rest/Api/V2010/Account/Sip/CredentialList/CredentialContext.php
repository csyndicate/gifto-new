<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\CredentialList;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class CredentialContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the CredentialContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The unique id of the Account that is responsible
     *                           for this resource.
     * @param string $credentialListSid The unique id that identifies the
     *                                  credential list that contains the desired
     *                                  credential
     * @param string $sid The unique id that identifies the resource to fetch.
     * @return \Twilio\Rest\Api\V2010\Account\Sip\CredentialList\CredentialContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid, $credentialListSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'credentialListSid' => $credentialListSid, 'sid' => $sid);
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/SIP/CredentialLists/' . \rawurlencode($credentialListSid) . '/Credentials/' . \rawurlencode($sid) . '.json';
    }
    /**
     * Fetch a CredentialInstance
     *
     * @return CredentialInstance Fetched CredentialInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\CredentialList\CredentialInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['credentialListSid'], $this->solution['sid']);
    }
    /**
     * Update the CredentialInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CredentialInstance Updated CredentialInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Password' => $options['password']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\CredentialList\CredentialInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['credentialListSid'], $this->solution['sid']);
    }
    /**
     * Deletes the CredentialInstance
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
        return '[Twilio.Api.V2010.CredentialContext ' . \implode(' ', $context) . ']';
    }
}
