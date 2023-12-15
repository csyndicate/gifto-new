<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Conversation;

use ShopMagicTwilioVendor\Twilio\Page;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class WebhookPage extends \ShopMagicTwilioVendor\Twilio\Page
{
    public function __construct($version, $response, $solution)
    {
        parent::__construct($version, $response);
        // Path Solution
        $this->solution = $solution;
    }
    public function buildInstance(array $payload)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Conversation\WebhookInstance($this->version, $payload, $this->solution['conversationSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Conversations.V1.WebhookPage]';
    }
}
