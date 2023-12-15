<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $friendlyName
 * @property string $description
 * @property array $configuration
 * @property string $uniqueName
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class InstalledAddOnInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_extensions = null;
    /**
     * Initialize the InstalledAddOnInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the InstalledAddOn resource to fetch
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOnInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'description' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'description'), 'configuration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'configuration'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'));
        $this->solution = array('sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOnContext Context for
     *                                                                this
     *                                                                InstalledAddOnInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace\InstalledAddOnContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Deletes the InstalledAddOnInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch a InstalledAddOnInstance
     *
     * @return InstalledAddOnInstance Fetched InstalledAddOnInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the InstalledAddOnInstance
     *
     * @param array|Options $options Optional Arguments
     * @return InstalledAddOnInstance Updated InstalledAddOnInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the extensions
     *
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionList
     */
    protected function getExtensions()
    {
        return $this->proxy()->extensions;
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
        return '[Twilio.Preview.Marketplace.InstalledAddOnInstance ' . \implode(' ', $context) . ']';
    }
}
