<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Proxy
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Base\PhoneNumberCapabilities;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $serviceSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $phoneNumber
 * @property string|null $friendlyName
 * @property string|null $isoCountry
 * @property PhoneNumberCapabilities|null $capabilities
 * @property string|null $url
 * @property bool|null $isReserved
 * @property int|null $inUse
 */
class PhoneNumberInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the PhoneNumberInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID parent [Service](https://www.twilio.com/docs/proxy/api/service) resource of the new PhoneNumber resource.
     * @param string $sid The Twilio-provided string that uniquely identifies the PhoneNumber resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $serviceSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'phoneNumber' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'phone_number'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'isoCountry' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'iso_country'), 'capabilities' => \ShopMagicTwilioVendor\Twilio\Deserialize::phoneNumberCapabilities(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'capabilities')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'isReserved' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'is_reserved'), 'inUse' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'in_use')];
        $this->solution = ['serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return PhoneNumberContext Context for this PhoneNumberInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberContext($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the PhoneNumberInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the PhoneNumberInstance
     *
     * @return PhoneNumberInstance Fetched PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the PhoneNumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return PhoneNumberInstance Updated PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberInstance
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
        return '[Twilio.Proxy.V1.PhoneNumberInstance ' . \implode(' ', $context) . ']';
    }
}