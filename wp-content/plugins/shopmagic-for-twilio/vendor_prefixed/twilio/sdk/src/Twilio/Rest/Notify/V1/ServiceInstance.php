<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Notify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Notify\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\NotificationList;
use ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\BindingList;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $friendlyName
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $apnCredentialSid
 * @property string|null $gcmCredentialSid
 * @property string|null $fcmCredentialSid
 * @property string|null $messagingServiceSid
 * @property string|null $facebookMessengerPageId
 * @property string|null $defaultApnNotificationProtocolVersion
 * @property string|null $defaultGcmNotificationProtocolVersion
 * @property string|null $defaultFcmNotificationProtocolVersion
 * @property bool|null $logEnabled
 * @property string|null $url
 * @property array|null $links
 * @property string|null $alexaSkillId
 * @property string|null $defaultAlexaNotificationProtocolVersion
 * @property string|null $deliveryCallbackUrl
 * @property bool|null $deliveryCallbackEnabled
 */
class ServiceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_notifications;
    protected $_bindings;
    /**
     * Initialize the ServiceInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The Twilio-provided string that uniquely identifies the Service resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'apnCredentialSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'apn_credential_sid'), 'gcmCredentialSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'gcm_credential_sid'), 'fcmCredentialSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'fcm_credential_sid'), 'messagingServiceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'messaging_service_sid'), 'facebookMessengerPageId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'facebook_messenger_page_id'), 'defaultApnNotificationProtocolVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'default_apn_notification_protocol_version'), 'defaultGcmNotificationProtocolVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'default_gcm_notification_protocol_version'), 'defaultFcmNotificationProtocolVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'default_fcm_notification_protocol_version'), 'logEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'log_enabled'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'), 'alexaSkillId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'alexa_skill_id'), 'defaultAlexaNotificationProtocolVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'default_alexa_notification_protocol_version'), 'deliveryCallbackUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'delivery_callback_url'), 'deliveryCallbackEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'delivery_callback_enabled')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ServiceContext Context for this ServiceInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the ServiceInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the notifications
     */
    protected function getNotifications() : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\NotificationList
    {
        return $this->proxy()->notifications;
    }
    /**
     * Access the bindings
     */
    protected function getBindings() : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\BindingList
    {
        return $this->proxy()->bindings;
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
        return '[Twilio.Notify.V1.ServiceInstance ' . \implode(' ', $context) . ']';
    }
}
