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
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
class AnnotationContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the AnnotationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $callSid The unique SID identifier of the Call.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $callSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['callSid' => $callSid];
        $this->uri = '/Voice/' . \rawurlencode($callSid) . '/Annotation';
    }
    /**
     * Fetch the AnnotationInstance
     *
     * @return AnnotationInstance Fetched AnnotationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationInstance($this->version, $payload, $this->solution['callSid']);
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
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['AnsweredBy' => $options['answeredBy'], 'ConnectivityIssue' => $options['connectivityIssue'], 'QualityIssues' => $options['qualityIssues'], 'Spam' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['spam']), 'CallScore' => $options['callScore'], 'Comment' => $options['comment'], 'Incident' => $options['incident']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Call\AnnotationInstance($this->version, $payload, $this->solution['callSid']);
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
        return '[Twilio.Insights.V1.AnnotationContext ' . \implode(' ', $context) . ']';
    }
}