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
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberList;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\InviteList;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookList;
use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageList;
/**
 * @property MemberList $members
 * @property InviteList $invites
 * @property WebhookList $webhooks
 * @property MessageList $messages
 * @method \Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookContext webhooks(string $sid)
 * @method \Twilio\Rest\IpMessaging\V2\Service\Channel\MemberContext members(string $sid)
 * @method \Twilio\Rest\IpMessaging\V2\Service\Channel\MessageContext messages(string $sid)
 * @method \Twilio\Rest\IpMessaging\V2\Service\Channel\InviteContext invites(string $sid)
 */
class ChannelContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_members;
    protected $_invites;
    protected $_webhooks;
    protected $_messages;
    /**
     * Initialize the ChannelContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid 
     * @param string $sid 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Channels/' . \rawurlencode($sid) . '';
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
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['X-Twilio-Webhook-Enabled' => $options['xTwilioWebhookEnabled']]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }
    /**
     * Fetch the ChannelInstance
     *
     * @return ChannelInstance Fetched ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['sid']);
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
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['FriendlyName' => $options['friendlyName'], 'UniqueName' => $options['uniqueName'], 'Attributes' => $options['attributes'], 'DateCreated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreated']), 'DateUpdated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateUpdated']), 'CreatedBy' => $options['createdBy']]);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['X-Twilio-Webhook-Enabled' => $options['xTwilioWebhookEnabled']]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ChannelInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['sid']);
    }
    /**
     * Access the members
     */
    protected function getMembers() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberList
    {
        if (!$this->_members) {
            $this->_members = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->_members;
    }
    /**
     * Access the invites
     */
    protected function getInvites() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\InviteList
    {
        if (!$this->_invites) {
            $this->_invites = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\InviteList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->_invites;
    }
    /**
     * Access the webhooks
     */
    protected function getWebhooks() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookList
    {
        if (!$this->_webhooks) {
            $this->_webhooks = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\WebhookList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->_webhooks;
    }
    /**
     * Access the messages
     */
    protected function getMessages() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageList
    {
        if (!$this->_messages) {
            $this->_messages = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MessageList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->_messages;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name) : \ShopMagicTwilioVendor\Twilio\ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown subresource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : \ShopMagicTwilioVendor\Twilio\InstanceContext
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Resource does not have a context');
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
        return '[Twilio.IpMessaging.V2.ChannelContext ' . \implode(' ', $context) . ']';
    }
}
