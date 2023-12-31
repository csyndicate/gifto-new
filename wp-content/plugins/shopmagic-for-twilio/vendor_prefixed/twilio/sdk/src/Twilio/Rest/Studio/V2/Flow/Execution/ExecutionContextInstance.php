<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $accountSid
 * @property array|null $context
 * @property string|null $flowSid
 * @property string|null $executionSid
 * @property string|null $url
 */
class ExecutionContextInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the ExecutionContextInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow with the Execution context to fetch.
     * @param string $executionSid The SID of the Execution context to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $flowSid, string $executionSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'context' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'context'), 'flowSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'flow_sid'), 'executionSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'execution_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['flowSid' => $flowSid, 'executionSid' => $executionSid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ExecutionContextContext Context for this ExecutionContextInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextContext($this->version, $this->solution['flowSid'], $this->solution['executionSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the ExecutionContextInstance
     *
     * @return ExecutionContextInstance Fetched ExecutionContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextInstance
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
        return '[Twilio.Studio.V2.ExecutionContextInstance ' . \implode(' ', $context) . ']';
    }
}
