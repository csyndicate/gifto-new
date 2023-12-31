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
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextList;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $flowSid
 * @property string|null $engagementSid
 * @property string|null $name
 * @property array|null $context
 * @property string|null $transitionedFrom
 * @property string|null $transitionedTo
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $url
 * @property array|null $links
 */
class StepInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_stepContext;
    /**
     * Initialize the StepInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow with the Step to fetch.
     * @param string $engagementSid The SID of the Engagement with the Step to fetch.
     * @param string $sid The SID of the Step resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $flowSid, string $engagementSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'flowSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'flow_sid'), 'engagementSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'engagement_sid'), 'name' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'name'), 'context' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'context'), 'transitionedFrom' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'transitioned_from'), 'transitionedTo' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'transitioned_to'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['flowSid' => $flowSid, 'engagementSid' => $engagementSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return StepContext Context for this StepInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\StepContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\StepContext($this->version, $this->solution['flowSid'], $this->solution['engagementSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the StepInstance
     *
     * @return StepInstance Fetched StepInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\StepInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Access the stepContext
     */
    protected function getStepContext() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Engagement\Step\StepContextList
    {
        return $this->proxy()->stepContext;
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
        return '[Twilio.Studio.V1.StepInstance ' . \implode(' ', $context) . ']';
    }
}
