<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $sid
 * @property string $trunkSid
 * @property int $weight
 * @property bool $enabled
 * @property string $sipUrl
 * @property string $friendlyName
 * @property int $priority
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class OriginationUrlInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the OriginationUrlInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $trunkSid The SID of the Trunk that owns the Origination URL
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $trunkSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'trunkSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'trunk_sid'), 'weight' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'weight'), 'enabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'enabled'), 'sipUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sip_url'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'priority' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'priority'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'));
        $this->solution = array('trunkSid' => $trunkSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlContext Context for
     *                                                              this
     *                                                              OriginationUrlInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk\OriginationUrlContext($this->version, $this->solution['trunkSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a OriginationUrlInstance
     *
     * @return OriginationUrlInstance Fetched OriginationUrlInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Deletes the OriginationUrlInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Update the OriginationUrlInstance
     *
     * @param array|Options $options Optional Arguments
     * @return OriginationUrlInstance Updated OriginationUrlInstance
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
        return '[Twilio.Trunking.V1.OriginationUrlInstance ' . \implode(' ', $context) . ']';
    }
}
