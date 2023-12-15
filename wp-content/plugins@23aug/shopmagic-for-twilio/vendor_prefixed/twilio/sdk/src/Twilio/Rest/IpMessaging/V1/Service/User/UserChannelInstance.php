<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\User;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $channelSid
 * @property string $memberSid
 * @property string $status
 * @property int $lastConsumedMessageIndex
 * @property int $unreadMessagesCount
 * @property array $links
 */
class UserChannelInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the UserChannelInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $userSid The unique string that identifies the resource
     * @return \Twilio\Rest\IpMessaging\V1\Service\User\UserChannelInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $serviceSid, $userSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'channelSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'channel_sid'), 'memberSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'member_sid'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'lastConsumedMessageIndex' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'last_consumed_message_index'), 'unreadMessagesCount' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unread_messages_count'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'));
        $this->solution = array('serviceSid' => $serviceSid, 'userSid' => $userSid);
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown property: ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.IpMessaging.V1.UserChannelInstance]';
    }
}
