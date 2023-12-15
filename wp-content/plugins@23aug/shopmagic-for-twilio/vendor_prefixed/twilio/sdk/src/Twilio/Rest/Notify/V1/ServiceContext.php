<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Notify\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\BindingList;
use ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\NotificationList;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property \Twilio\Rest\Notify\V1\Service\BindingList $bindings
 * @property \Twilio\Rest\Notify\V1\Service\NotificationList $notifications
 * @method \Twilio\Rest\Notify\V1\Service\BindingContext bindings(string $sid)
 */
class ServiceContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_bindings = null;
    protected $_notifications = null;
    /**
     * Initialize the ServiceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Notify\V1\ServiceContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/Services/' . \rawurlencode($sid) . '';
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
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceInstance($this->version, $payload, $this->solution['sid']);
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
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName'], 'ApnCredentialSid' => $options['apnCredentialSid'], 'GcmCredentialSid' => $options['gcmCredentialSid'], 'MessagingServiceSid' => $options['messagingServiceSid'], 'FacebookMessengerPageId' => $options['facebookMessengerPageId'], 'DefaultApnNotificationProtocolVersion' => $options['defaultApnNotificationProtocolVersion'], 'DefaultGcmNotificationProtocolVersion' => $options['defaultGcmNotificationProtocolVersion'], 'FcmCredentialSid' => $options['fcmCredentialSid'], 'DefaultFcmNotificationProtocolVersion' => $options['defaultFcmNotificationProtocolVersion'], 'LogEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['logEnabled']), 'AlexaSkillId' => $options['alexaSkillId'], 'DefaultAlexaNotificationProtocolVersion' => $options['defaultAlexaNotificationProtocolVersion'], 'DeliveryCallbackUrl' => $options['deliveryCallbackUrl'], 'DeliveryCallbackEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['deliveryCallbackEnabled'])));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the bindings
     *
     * @return \Twilio\Rest\Notify\V1\Service\BindingList
     */
    protected function getBindings()
    {
        if (!$this->_bindings) {
            $this->_bindings = new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\BindingList($this->version, $this->solution['sid']);
        }
        return $this->_bindings;
    }
    /**
     * Access the notifications
     *
     * @return \Twilio\Rest\Notify\V1\Service\NotificationList
     */
    protected function getNotifications()
    {
        if (!$this->_notifications) {
            $this->_notifications = new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\NotificationList($this->version, $this->solution['sid']);
        }
        return $this->_notifications;
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
        return '[Twilio.Notify.V1.ServiceContext ' . \implode(' ', $context) . ']';
    }
}
