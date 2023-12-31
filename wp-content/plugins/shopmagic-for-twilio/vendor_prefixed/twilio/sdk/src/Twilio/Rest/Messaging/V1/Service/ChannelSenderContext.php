<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class ChannelSenderContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the ChannelSenderContext
     *
     * @param Version $version Version that contains the resource
     * @param string $messagingServiceSid The SID of the [Service](https://www.twilio.com/docs/chat/rest/service-resource) to fetch the resource from.
     * @param string $sid The SID of the ChannelSender resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $messagingServiceSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['messagingServiceSid' => $messagingServiceSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($messagingServiceSid) . '/ChannelSenders/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the ChannelSenderInstance
     *
     * @return ChannelSenderInstance Fetched ChannelSenderInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\Service\ChannelSenderInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\Service\ChannelSenderInstance($this->version, $payload, $this->solution['messagingServiceSid'], $this->solution['sid']);
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
        return '[Twilio.Messaging.V1.ChannelSenderContext ' . \implode(' ', $context) . ']';
    }
}
