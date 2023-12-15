<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $shortCode
 * @property string $isoCountry
 * @property string $capabilities
 * @property string $url
 * @property bool $isReserved
 */
class ShortCodeInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the ShortCodeInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the resource's parent Service
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Proxy\V1\Service\ShortCodeInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $serviceSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'shortCode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'short_code'), 'isoCountry' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'iso_country'), 'capabilities' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'capabilities'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'isReserved' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'is_reserved'));
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Proxy\V1\Service\ShortCodeContext Context for this
     *                                                        ShortCodeInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\ShortCodeContext($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Deletes the ShortCodeInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch a ShortCodeInstance
     *
     * @return ShortCodeInstance Fetched ShortCodeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the ShortCodeInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ShortCodeInstance Updated ShortCodeInstance
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
        return '[Twilio.Proxy.V1.ShortCodeInstance ' . \implode(' ', $context) . ']';
    }
}
