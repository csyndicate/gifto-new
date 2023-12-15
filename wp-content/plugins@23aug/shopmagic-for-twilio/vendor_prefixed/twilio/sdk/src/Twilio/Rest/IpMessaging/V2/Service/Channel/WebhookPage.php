<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Page;
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
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['channelSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.IpMessaging.V2.WebhookPage]';
    }
}
