<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Autopilot
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $accountSid
 * @property string|null $assistantSid
 * @property string|null $url
 * @property array|null $data
 */
class DefaultsInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the DefaultsInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $assistantSid The SID of the [Assistant](https://www.twilio.com/docs/autopilot/api/assistant) that is the parent of the resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $assistantSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'assistantSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'assistant_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'data' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'data')];
        $this->solution = ['assistantSid' => $assistantSid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return DefaultsContext Context for this DefaultsInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\DefaultsContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\DefaultsContext($this->version, $this->solution['assistantSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the DefaultsInstance
     *
     * @return DefaultsInstance Fetched DefaultsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\DefaultsInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the DefaultsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return DefaultsInstance Updated DefaultsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\DefaultsInstance
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
        return '[Twilio.Autopilot.V1.DefaultsInstance ' . \implode(' ', $context) . ']';
    }
}