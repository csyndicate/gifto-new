<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Chat\V2;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\BindingList;
use ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\ChannelList;
use ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\RoleList;
use ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\UserList;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Chat\V2\Service\ChannelList $channels
 * @property \Twilio\Rest\Chat\V2\Service\RoleList $roles
 * @property \Twilio\Rest\Chat\V2\Service\UserList $users
 * @property \Twilio\Rest\Chat\V2\Service\BindingList $bindings
 * @method \Twilio\Rest\Chat\V2\Service\ChannelContext channels(string $sid)
 * @method \Twilio\Rest\Chat\V2\Service\RoleContext roles(string $sid)
 * @method \Twilio\Rest\Chat\V2\Service\UserContext users(string $sid)
 * @method \Twilio\Rest\Chat\V2\Service\BindingContext bindings(string $sid)
 */
class ServiceContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_channels = null;
    protected $_roles = null;
    protected $_users = null;
    protected $_bindings = null;
    /**
     * Initialize the ServiceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID of the Service resource to fetch
     * @return \Twilio\Rest\Chat\V2\ServiceContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/Services/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Deletes the ServiceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName'], 'DefaultServiceRoleSid' => $options['defaultServiceRoleSid'], 'DefaultChannelRoleSid' => $options['defaultChannelRoleSid'], 'DefaultChannelCreatorRoleSid' => $options['defaultChannelCreatorRoleSid'], 'ReadStatusEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['readStatusEnabled']), 'ReachabilityEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['reachabilityEnabled']), 'TypingIndicatorTimeout' => $options['typingIndicatorTimeout'], 'ConsumptionReportInterval' => $options['consumptionReportInterval'], 'Notifications.NewMessage.Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['notificationsNewMessageEnabled']), 'Notifications.NewMessage.Template' => $options['notificationsNewMessageTemplate'], 'Notifications.NewMessage.Sound' => $options['notificationsNewMessageSound'], 'Notifications.NewMessage.BadgeCountEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['notificationsNewMessageBadgeCountEnabled']), 'Notifications.AddedToChannel.Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['notificationsAddedToChannelEnabled']), 'Notifications.AddedToChannel.Template' => $options['notificationsAddedToChannelTemplate'], 'Notifications.AddedToChannel.Sound' => $options['notificationsAddedToChannelSound'], 'Notifications.RemovedFromChannel.Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['notificationsRemovedFromChannelEnabled']), 'Notifications.RemovedFromChannel.Template' => $options['notificationsRemovedFromChannelTemplate'], 'Notifications.RemovedFromChannel.Sound' => $options['notificationsRemovedFromChannelSound'], 'Notifications.InvitedToChannel.Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['notificationsInvitedToChannelEnabled']), 'Notifications.InvitedToChannel.Template' => $options['notificationsInvitedToChannelTemplate'], 'Notifications.InvitedToChannel.Sound' => $options['notificationsInvitedToChannelSound'], 'PreWebhookUrl' => $options['preWebhookUrl'], 'PostWebhookUrl' => $options['postWebhookUrl'], 'WebhookMethod' => $options['webhookMethod'], 'WebhookFilters' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['webhookFilters'], function ($e) {
            return $e;
        }), 'Limits.ChannelMembers' => $options['limitsChannelMembers'], 'Limits.UserChannels' => $options['limitsUserChannels'], 'Media.CompatibilityMessage' => $options['mediaCompatibilityMessage'], 'PreWebhookRetryCount' => $options['preWebhookRetryCount'], 'PostWebhookRetryCount' => $options['postWebhookRetryCount'], 'Notifications.LogEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['notificationsLogEnabled'])));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the channels
     *
     * @return \Twilio\Rest\Chat\V2\Service\ChannelList
     */
    protected function getChannels()
    {
        if (!$this->_channels) {
            $this->_channels = new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\ChannelList($this->version, $this->solution['sid']);
        }
        return $this->_channels;
    }
    /**
     * Access the roles
     *
     * @return \Twilio\Rest\Chat\V2\Service\RoleList
     */
    protected function getRoles()
    {
        if (!$this->_roles) {
            $this->_roles = new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\RoleList($this->version, $this->solution['sid']);
        }
        return $this->_roles;
    }
    /**
     * Access the users
     *
     * @return \Twilio\Rest\Chat\V2\Service\UserList
     */
    protected function getUsers()
    {
        if (!$this->_users) {
            $this->_users = new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\UserList($this->version, $this->solution['sid']);
        }
        return $this->_users;
    }
    /**
     * Access the bindings
     *
     * @return \Twilio\Rest\Chat\V2\Service\BindingList
     */
    protected function getBindings()
    {
        if (!$this->_bindings) {
            $this->_bindings = new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V2\Service\BindingList($this->version, $this->solution['sid']);
        }
        return $this->_bindings;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name)
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
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments)
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
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Chat.V2.ServiceContext ' . \implode(' ', $context) . ']';
    }
}
