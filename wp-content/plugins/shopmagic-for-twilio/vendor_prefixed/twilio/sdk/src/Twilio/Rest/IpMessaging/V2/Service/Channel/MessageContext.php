<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Ip_messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
class MessageContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the MessageContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid 
     * @param string $channelSid 
     * @param string $sid 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $channelSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Channels/' . \rawurlencode($channelSid) . '/Messages/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []) : bool
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['X-Twilio-Webhook-Enabled' => $options['xTwilioWebhookEnabled']]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }
    /**
     * Fetch the MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['channelSid'], $this->solution['sid']);
    }
    /**
     * Update the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Body' => $options['body'], 'Attributes' => $options['attributes'], 'DateCreated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreated']), 'DateUpdated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateUpdated']), 'LastUpdatedBy' => $options['lastUpdatedBy'], 'From' => $options['from']]);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['X-Twilio-Webhook-Enabled' => $options['xTwilioWebhookEnabled']]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['channelSid'], $this->solution['sid']);
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
        return '[Twilio.IpMessaging.V2.MessageContext ' . \implode(' ', $context) . ']';
    }
}
