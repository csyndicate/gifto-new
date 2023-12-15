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
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberList;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\InviteList;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookList;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageList;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $serviceSid
 * @property string|null $friendlyName
 * @property string|null $uniqueName
 * @property string|null $attributes
 * @property string $type
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $createdBy
 * @property int|null $membersCount
 * @property int|null $messagesCount
 * @property string|null $url
 * @property array|null $links
 */
class ChannelInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_members;
    protected $_invites;
    protected $_webhooks;
    protected $_messages;
    /**
     * Initialize the ChannelInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid 
     * @param string $sid 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $serviceSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'attributes' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'attributes'), 'type' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'type'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'createdBy' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'created_by'), 'membersCount' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'members_count'), 'messagesCount' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'messages_count'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ChannelContext Context for this ChannelInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelContext($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the ChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []) : bool
    {
        return $this->proxy()->delete($options);
    }
    /**
     * Fetch the ChannelInstance
     *
     * @return ChannelInstance Fetched ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the ChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChannelInstance Updated ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the members
     */
    protected function getMembers() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberList
    {
        return $this->proxy()->members;
    }
    /**
     * Access the invites
     */
    protected function getInvites() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\InviteList
    {
        return $this->proxy()->invites;
    }
    /**
     * Access the webhooks
     */
    protected function getWebhooks() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookList
    {
        return $this->proxy()->webhooks;
    }
    /**
     * Access the messages
     */
    protected function getMessages() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageList
    {
        return $this->proxy()->messages;
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
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
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.IpMessaging.V2.ChannelInstance ' . \implode(' ', $context) . ']';
    }
}
