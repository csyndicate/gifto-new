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
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\Step;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $accountSid
 * @property array|null $context
 * @property string|null $engagementSid
 * @property string|null $flowSid
 * @property string|null $stepSid
 * @property string|null $url
 */
class StepContextInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the StepContextInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow with the Step to fetch.
     * @param string $engagementSid The SID of the Engagement with the Step to fetch.
     * @param string $stepSid The SID of the Step to fetch
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $flowSid, string $engagementSid, string $stepSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'context' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'context'), 'engagementSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'engagement_sid'), 'flowSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'flow_sid'), 'stepSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'step_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['flowSid' => $flowSid, 'engagementSid' => $engagementSid, 'stepSid' => $stepSid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return StepContextContext Context for this StepContextInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextContext($this->version, $this->solution['flowSid'], $this->solution['engagementSid'], $this->solution['stepSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the StepContextInstance
     *
     * @return StepContextInstance Fetched StepContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextInstance
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
        return '[Twilio.Studio.V1.StepContextInstance ' . \implode(' ', $context) . ']';
    }
}