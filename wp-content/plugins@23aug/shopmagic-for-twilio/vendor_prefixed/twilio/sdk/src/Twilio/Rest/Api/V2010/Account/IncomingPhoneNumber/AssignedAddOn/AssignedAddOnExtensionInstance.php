<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $resourceSid
 * @property string $assignedAddOnSid
 * @property string $friendlyName
 * @property string $productName
 * @property string $uniqueName
 * @property string $uri
 * @property bool $enabled
 */
class AssignedAddOnExtensionInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the AssignedAddOnExtensionInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created the resource
     * @param string $resourceSid The SID of the Phone Number to which the Add-on
     *                            is assigned
     * @param string $assignedAddOnSid The SID that uniquely identifies the
     *                                 assigned Add-on installation
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn\AssignedAddOnExtensionInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $accountSid, $resourceSid, $assignedAddOnSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'resourceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'resource_sid'), 'assignedAddOnSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'assigned_add_on_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'productName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'product_name'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'), 'enabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'enabled'));
        $this->solution = array('accountSid' => $accountSid, 'resourceSid' => $resourceSid, 'assignedAddOnSid' => $assignedAddOnSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn\AssignedAddOnExtensionContext Context for this
     *                                                                                                        AssignedAddOnExtensionInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn\AssignedAddOnExtensionContext($this->version, $this->solution['accountSid'], $this->solution['resourceSid'], $this->solution['assignedAddOnSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a AssignedAddOnExtensionInstance
     *
     * @return AssignedAddOnExtensionInstance Fetched AssignedAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
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
    public function __get($name)
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
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Api.V2010.AssignedAddOnExtensionInstance ' . \implode(' ', $context) . ']';
    }
}
