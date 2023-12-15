<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace\InstalledAddOn;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class InstalledAddOnExtensionContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the InstalledAddOnExtensionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $installedAddOnSid The SID of the InstalledAddOn resource with
     *                                  the extension to fetch
     * @param string $sid The SID of the InstalledAddOn Extension resource to fetch
     * @return \Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $installedAddOnSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('installedAddOnSid' => $installedAddOnSid, 'sid' => $sid);
        $this->uri = '/InstalledAddOns/' . \rawurlencode($installedAddOnSid) . '/Extensions/' . \rawurlencode($sid) . '';
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
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionInstance($this->version, $payload, $this->solution['installedAddOnSid'], $this->solution['sid']);
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
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($enabled)));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Marketplace\InstalledAddOn\InstalledAddOnExtensionInstance($this->version, $payload, $this->solution['installedAddOnSid'], $this->solution['sid']);
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
        return '[Twilio.Preview.Marketplace.InstalledAddOnExtensionContext ' . \implode(' ', $context) . ']';
    }
}
