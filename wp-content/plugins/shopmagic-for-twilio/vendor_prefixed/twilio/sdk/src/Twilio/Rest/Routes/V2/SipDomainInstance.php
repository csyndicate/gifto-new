<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Routes
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Routes\V2;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $sipDomain
 * @property string|null $url
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $friendlyName
 * @property string|null $voiceRegion
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 */
class SipDomainInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the SipDomainInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sipDomain 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sipDomain = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sipDomain' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sip_domain'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'voiceRegion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_region'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated'))];
        $this->solution = ['sipDomain' => $sipDomain ?: $this->properties['sipDomain']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return SipDomainContext Context for this SipDomainInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainContext($this->version, $this->solution['sipDomain']);
        }
        return $this->context;
    }
    /**
     * Fetch the SipDomainInstance
     *
     * @return SipDomainInstance Fetched SipDomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the SipDomainInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SipDomainInstance Updated SipDomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainInstance
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
    public function __get(string $name)
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
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Routes.V2.SipDomainInstance ' . \implode(' ', $context) . ']';
    }
}