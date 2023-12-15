<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $regulationSid
 * @property string|null $bundleSid
 * @property string $status
 * @property array[]|null $results
 * @property \DateTime|null $dateCreated
 * @property string|null $url
 */
class EvaluationInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the EvaluationInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $bundleSid The unique string that identifies the Bundle resource.
     * @param string $sid The unique string that identifies the Evaluation resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $bundleSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'regulationSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'regulation_sid'), 'bundleSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'bundle_sid'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'results' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'results'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['bundleSid' => $bundleSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return EvaluationContext Context for this EvaluationInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationContext($this->version, $this->solution['bundleSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the EvaluationInstance
     *
     * @return EvaluationInstance Fetched EvaluationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationInstance
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
        return '[Twilio.Numbers.V2.EvaluationInstance ' . \implode(' ', $context) . ']';
    }
}