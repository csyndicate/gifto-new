<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Pricing\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $name
 * @property string $url
 * @property array $links
 */
class VoiceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the VoiceInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @return \Twilio\Rest\Pricing\V1\VoiceInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('name' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'name'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'));
        $this->solution = array();
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
        return '[Twilio.Pricing.V1.VoiceInstance]';
    }
}
