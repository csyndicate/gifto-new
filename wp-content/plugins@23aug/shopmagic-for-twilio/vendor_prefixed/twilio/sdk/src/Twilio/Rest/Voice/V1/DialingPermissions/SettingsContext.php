<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Voice\V1\DialingPermissions;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class SettingsContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the SettingsContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @return \Twilio\Rest\Voice\V1\DialingPermissions\SettingsContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array();
        $this->uri = '/Settings';
    }
    /**
     * Fetch a SettingsInstance
     *
     * @return SettingsInstance Fetched SettingsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Voice\V1\DialingPermissions\SettingsInstance($this->version, $payload);
    }
    /**
     * Update the SettingsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SettingsInstance Updated SettingsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('DialingPermissionsInheritance' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['dialingPermissionsInheritance'])));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Voice\V1\DialingPermissions\SettingsInstance($this->version, $payload);
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
        return '[Twilio.Voice.V1.SettingsContext ' . \implode(' ', $context) . ']';
    }
}
