<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Conversations
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
class WebhookContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the WebhookContext
     *
     * @param Version $version Version that contains the resource
     * @param string $chatServiceSid The SID of the [Conversation Service](https://www.twilio.com/docs/conversations/api/service-resource) the Participant resource is associated with.
     * @param string $conversationSid The unique ID of the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for this webhook.
     * @param string $sid A 34 character string that uniquely identifies this resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $chatServiceSid, $conversationSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['chatServiceSid' => $chatServiceSid, 'conversationSid' => $conversationSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($chatServiceSid) . '/Conversations/' . \rawurlencode($conversationSid) . '/Webhooks/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the WebhookInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the WebhookInstance
     *
     * @return WebhookInstance Fetched WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\WebhookInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\WebhookInstance($this->version, $payload, $this->solution['chatServiceSid'], $this->solution['conversationSid'], $this->solution['sid']);
    }
    /**
     * Update the WebhookInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Updated WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\WebhookInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Configuration.Url' => $options['configurationUrl'], 'Configuration.Method' => $options['configurationMethod'], 'Configuration.Filters' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['configurationFilters'], function ($e) {
            return $e;
        }), 'Configuration.Triggers' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['configurationTriggers'], function ($e) {
            return $e;
        }), 'Configuration.FlowSid' => $options['configurationFlowSid']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\WebhookInstance($this->version, $payload, $this->solution['chatServiceSid'], $this->solution['conversationSid'], $this->solution['sid']);
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
        return '[Twilio.Conversations.V1.WebhookContext ' . \implode(' ', $context) . ']';
    }
}