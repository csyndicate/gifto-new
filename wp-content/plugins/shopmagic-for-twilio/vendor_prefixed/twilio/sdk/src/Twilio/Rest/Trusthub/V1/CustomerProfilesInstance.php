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
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesChannelEndpointAssignmentList;
use ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEntityAssignmentsList;
use ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEvaluationsList;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $policySid
 * @property string|null $friendlyName
 * @property string $status
 * @property \DateTime|null $validUntil
 * @property string|null $email
 * @property string|null $statusCallback
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $url
 * @property array|null $links
 */
class CustomerProfilesInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_customerProfilesChannelEndpointAssignment;
    protected $_customerProfilesEntityAssignments;
    protected $_customerProfilesEvaluations;
    /**
     * Initialize the CustomerProfilesInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique string that we created to identify the Customer-Profile resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'policySid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'policy_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'validUntil' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'valid_until')), 'email' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'email'), 'statusCallback' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return CustomerProfilesContext Context for this CustomerProfilesInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfilesContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfilesContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the CustomerProfilesInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the CustomerProfilesInstance
     *
     * @return CustomerProfilesInstance Fetched CustomerProfilesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfilesInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the CustomerProfilesInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CustomerProfilesInstance Updated CustomerProfilesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfilesInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the customerProfilesChannelEndpointAssignment
     */
    protected function getCustomerProfilesChannelEndpointAssignment() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesChannelEndpointAssignmentList
    {
        return $this->proxy()->customerProfilesChannelEndpointAssignment;
    }
    /**
     * Access the customerProfilesEntityAssignments
     */
    protected function getCustomerProfilesEntityAssignments() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEntityAssignmentsList
    {
        return $this->proxy()->customerProfilesEntityAssignments;
    }
    /**
     * Access the customerProfilesEvaluations
     */
    protected function getCustomerProfilesEvaluations() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEvaluationsList
    {
        return $this->proxy()->customerProfilesEvaluations;
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
        return '[Twilio.Trusthub.V1.CustomerProfilesInstance ' . \implode(' ', $context) . ']';
    }
}