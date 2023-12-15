<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class ExportAssistantContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the ExportAssistantContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $assistantSid The SID of the Assistant to export.
     * @return \Twilio\Rest\Autopilot\V1\Assistant\ExportAssistantContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $assistantSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid);
        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/Export';
    }
    /**
     * Fetch a ExportAssistantInstance
     *
     * @return ExportAssistantInstance Fetched ExportAssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\ExportAssistantInstance($this->version, $payload, $this->solution['assistantSid']);
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
        return '[Twilio.Autopilot.V1.ExportAssistantContext ' . \implode(' ', $context) . ']';
    }
}
