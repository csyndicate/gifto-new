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
namespace ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $sid
 * @property string|null $customerProfileSid
 * @property string|null $accountSid
 * @property string|null $objectSid
 * @property \DateTime|null $dateCreated
 * @property string|null $url
 */
class CustomerProfilesEntityAssignmentsInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the CustomerProfilesEntityAssignmentsInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $customerProfileSid The unique string that we created to identify the CustomerProfile resource.
     * @param string $sid The unique string that we created to identify the Identity resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $customerProfileSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'customerProfileSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'customer_profile_sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'objectSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'object_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['customerProfileSid' => $customerProfileSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return CustomerProfilesEntityAssignmentsContext Context for this CustomerProfilesEntityAssignmentsInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEntityAssignmentsContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEntityAssignmentsContext($this->version, $this->solution['customerProfileSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the CustomerProfilesEntityAssignmentsInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the CustomerProfilesEntityAssignmentsInstance
     *
     * @return CustomerProfilesEntityAssignmentsInstance Fetched CustomerProfilesEntityAssignmentsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\CustomerProfiles\CustomerProfilesEntityAssignmentsInstance
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
        return '[Twilio.Trusthub.V1.CustomerProfilesEntityAssignmentsInstance ' . \implode(' ', $context) . ']';
    }
}
