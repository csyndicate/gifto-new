<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Conversation;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class WebhookContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the WebhookContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $conversationSid The unique id of the Conversation for this
     *                                webhook.
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Conversations\V1\Conversation\WebhookContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $conversationSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('conversationSid' => $conversationSid, 'sid' => $sid);
        $this->uri = '/Conversations/' . \rawurlencode($conversationSid) . '/Webhooks/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a WebhookInstance
     *
     * @return WebhookInstance Fetched WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Conversation\WebhookInstance($this->version, $payload, $this->solution['conversationSid'], $this->solution['sid']);
    }
    /**
     * Update the WebhookInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Updated WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Configuration.Url' => $options['configurationUrl'], 'Configuration.Method' => $options['configurationMethod'], 'Configuration.Filters' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['configurationFilters'], function ($e) {
            return $e;
        }), 'Configuration.Triggers' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['configurationTriggers'], function ($e) {
            return $e;
        }), 'Configuration.FlowSid' => $options['configurationFlowSid']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Conversation\WebhookInstance($this->version, $payload, $this->solution['conversationSid'], $this->solution['sid']);
    }
    /**
     * Deletes the WebhookInstance
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
        return '[Twilio.Conversations.V1.WebhookContext ' . \implode(' ', $context) . ']';
    }
}
