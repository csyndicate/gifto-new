<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Preview
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $deviceSid
 * @property string|null $simSid
 * @property string|null $command
 * @property string|null $commandMode
 * @property string|null $status
 * @property string|null $direction
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $url
 */
class CommandInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the CommandInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'deviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'device_sid'), 'simSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sim_sid'), 'command' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'command'), 'commandMode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'command_mode'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'direction' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'direction'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return CommandContext Context for this CommandInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless\CommandContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless\CommandContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the CommandInstance
     *
     * @return CommandInstance Fetched CommandInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless\CommandInstance
    {
        return $this->proxy()->fetch();
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
        return '[Twilio.Preview.Wireless.CommandInstance ' . \implode(' ', $context) . ']';
    }
}
