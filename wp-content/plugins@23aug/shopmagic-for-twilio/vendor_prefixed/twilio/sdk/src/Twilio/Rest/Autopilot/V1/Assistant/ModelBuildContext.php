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
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class ModelBuildContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the ModelBuildContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the resource to fetch
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\ModelBuildContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $assistantSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, 'sid' => $sid);
        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/ModelBuilds/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a ModelBuildInstance
     *
     * @return ModelBuildInstance Fetched ModelBuildInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\ModelBuildInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['sid']);
    }
    /**
     * Update the ModelBuildInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ModelBuildInstance Updated ModelBuildInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('UniqueName' => $options['uniqueName']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\ModelBuildInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['sid']);
    }
    /**
     * Deletes the ModelBuildInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Autopilot.V1.ModelBuildContext ' . \implode(' ', $context) . ']';
    }
}
