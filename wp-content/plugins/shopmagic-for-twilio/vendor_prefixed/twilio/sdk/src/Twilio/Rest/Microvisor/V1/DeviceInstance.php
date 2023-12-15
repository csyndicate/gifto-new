<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Microvisor
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\Device\DeviceConfigList;
use ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\Device\DeviceSecretList;
/**
 * @property string|null $sid
 * @property string|null $uniqueName
 * @property string|null $accountSid
 * @property array|null $app
 * @property array|null $logging
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $url
 * @property array|null $links
 */
class DeviceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_deviceConfigs;
    protected $_deviceSecrets;
    /**
     * Initialize the DeviceInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid A 34-character string that uniquely identifies this Device.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'app' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'app'), 'logging' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'logging'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return DeviceContext Context for this DeviceInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\DeviceContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\DeviceContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the DeviceInstance
     *
     * @return DeviceInstance Fetched DeviceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\DeviceInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the DeviceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return DeviceInstance Updated DeviceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\DeviceInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the deviceConfigs
     */
    protected function getDeviceConfigs() : \ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\Device\DeviceConfigList
    {
        return $this->proxy()->deviceConfigs;
    }
    /**
     * Access the deviceSecrets
     */
    protected function getDeviceSecrets() : \ShopMagicTwilioVendor\Twilio\Rest\Microvisor\V1\Device\DeviceSecretList
    {
        return $this->proxy()->deviceSecrets;
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
        return '[Twilio.Microvisor.V1.DeviceInstance ' . \implode(' ', $context) . ']';
    }
}