<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class MessageContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the MessageContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the resource from
     * @param string $channelSid The SID of the Channel the message to fetch
     *                           belongs to
     * @param string $sid The SID of the Message resource to fetch
     * @return \Twilio\Rest\IpMessaging\V2\Service\Channel\MessageContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $channelSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid);
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Channels/' . \rawurlencode($channelSid) . '/Messages/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['channelSid'], $this->solution['sid']);
    }
    /**
     * Deletes the MessageInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }
    /**
     * Update the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Body' => $options['body'], 'Attributes' => $options['attributes'], 'DateCreated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreated']), 'DateUpdated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateUpdated']), 'LastUpdatedBy' => $options['lastUpdatedBy'], 'From' => $options['from']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['channelSid'], $this->solution['sid']);
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
        return '[Twilio.IpMessaging.V2.MessageContext ' . \implode(' ', $context) . ']';
    }
}
