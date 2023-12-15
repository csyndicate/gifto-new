<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $sid
 * @property string $accountSid
 * @property string $channelSid
 * @property string $serviceSid
 * @property string $identity
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $roleSid
 * @property int $lastConsumedMessageIndex
 * @property \DateTime $lastConsumptionTimestamp
 * @property string $url
 * @property string $attributes
 */
class MemberInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the MemberInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $channelSid The SID of the Channel for the member
     * @param string $sid The SID of the Member resource to fetch
     * @return \Twilio\Rest\IpMessaging\V2\Service\Channel\MemberInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $serviceSid, $channelSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'channelSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'channel_sid'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'identity' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'identity'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'roleSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'role_sid'), 'lastConsumedMessageIndex' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'last_consumed_message_index'), 'lastConsumptionTimestamp' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'last_consumption_timestamp')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'attributes' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'attributes'));
        $this->solution = array('serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\IpMessaging\V2\Service\Channel\MemberContext Context
     *                                                                   for this
     *                                                                   MemberInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberContext($this->version, $this->solution['serviceSid'], $this->solution['channelSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a MemberInstance
     *
     * @return MemberInstance Fetched MemberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Deletes the MemberInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Update the MemberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MemberInstance Updated MemberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.IpMessaging.V2.MemberInstance ' . \implode(' ', $context) . ']';
    }
}
