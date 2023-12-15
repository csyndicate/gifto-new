<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace\InstalledAddOn;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $installedAddOnSid
 * @property string $friendlyName
 * @property string $productName
 * @property string $uniqueName
 * @property bool $enabled
 * @property string $url
 */
class InstalledAddOnExtensionInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the InstalledAddOnExtensionInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $installedAddOnSid The SID of the InstalledAddOn resource to
     *                                  which this extension applies
     * @param string $sid The SID of the InstalledAddOn Extension resource to fetch
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $installedAddOnSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'installedAddOnSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'installed_add_on_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'productName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'product_name'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'enabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'enabled'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'));
        $this->solution = array('installedAddOnSid' => $installedAddOnSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionContext Context for this
     *                                                                                        InstalledAddOnExtensionInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionContext($this->version, $this->solution['installedAddOnSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a InstalledAddOnExtensionInstance
     *
     * @return InstalledAddOnExtensionInstance Fetched
     *                                         InstalledAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the InstalledAddOnExtensionInstance
     *
     * @param bool $enabled Whether the Extension should be invoked
     * @return InstalledAddOnExtensionInstance Updated
     *                                         InstalledAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($enabled)
    {
        return $this->proxy()->update($enabled);
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
        return '[Twilio.Preview.Marketplace.InstalledAddOnExtensionInstance ' . \implode(' ', $context) . ']';
    }
}
