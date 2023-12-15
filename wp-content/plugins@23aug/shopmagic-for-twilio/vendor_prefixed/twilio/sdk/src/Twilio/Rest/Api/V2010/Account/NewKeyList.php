<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class NewKeyList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the NewKeyList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return \Twilio\Rest\Api\V2010\Account\NewKeyList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('accountSid' => $accountSid);
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Keys.json';
    }
    /**
     * Create a new NewKeyInstance
     *
     * @param array|Options $options Optional Arguments
     * @return NewKeyInstance Newly created NewKeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName']));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\NewKeyInstance($this->version, $payload, $this->solution['accountSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Api.V2010.NewKeyList]';
    }
}
