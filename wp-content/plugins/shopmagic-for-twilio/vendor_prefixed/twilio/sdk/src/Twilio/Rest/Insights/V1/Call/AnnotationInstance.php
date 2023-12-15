<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Insights
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $callSid
 * @property string|null $accountSid
 * @property string $answeredBy
 * @property string $connectivityIssue
 * @property string[]|null $qualityIssues
 * @property bool|null $spam
 * @property int|null $callScore
 * @property string|null $comment
 * @property string|null $incident
 * @property string|null $url
 */
class AnnotationInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the AnnotationInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $callSid The unique SID identifier of the Call.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $callSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['callSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'call_sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'answeredBy' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'answered_by'), 'connectivityIssue' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connectivity_issue'), 'qualityIssues' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'quality_issues'), 'spam' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'spam'), 'callScore' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'call_score'), 'comment' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'comment'), 'incident' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'incident'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['callSid' => $callSid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return AnnotationContext Context for this AnnotationInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationContext($this->version, $this->solution['callSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the AnnotationInstance
     *
     * @return AnnotationInstance Fetched AnnotationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the AnnotationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return AnnotationInstance Updated AnnotationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationInstance
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
        return '[Twilio.Insights.V1.AnnotationInstance ' . \implode(' ', $context) . ']';
    }
}
