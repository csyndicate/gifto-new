<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Trusthub
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $inquiryId
 * @property string|null $inquirySessionToken
 * @property string|null $customerId
 * @property string|null $url
 */
class ComplianceInquiriesInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the ComplianceInquiriesInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $customerId The unique CustomerId matching the Customer Profile/Compliance Inquiry that should be resumed or resubmitted. This value will have been returned by the initial Compliance Inquiry creation call.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $customerId = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['inquiryId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'inquiry_id'), 'inquirySessionToken' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'inquiry_session_token'), 'customerId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'customer_id'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['customerId' => $customerId ?: $this->properties['customerId']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ComplianceInquiriesContext Context for this ComplianceInquiriesInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceInquiriesContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceInquiriesContext($this->version, $this->solution['customerId']);
        }
        return $this->context;
    }
    /**
     * Update the ComplianceInquiriesInstance
     *
     * @param string $primaryProfileSid The unique SID identifier of the Primary Customer Profile that should be used as a parent. Only necessary when creating a secondary Customer Profile.
     * @return ComplianceInquiriesInstance Updated ComplianceInquiriesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $primaryProfileSid) : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceInquiriesInstance
    {
        return $this->proxy()->update($primaryProfileSid);
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
        return '[Twilio.Trusthub.V1.ComplianceInquiriesInstance ' . \implode(' ', $context) . ']';
    }
}
