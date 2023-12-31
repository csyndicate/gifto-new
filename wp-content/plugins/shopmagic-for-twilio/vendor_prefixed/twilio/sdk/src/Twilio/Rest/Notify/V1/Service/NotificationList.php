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
namespace ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class NotificationList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the NotificationList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the [Service](https://www.twilio.com/docs/notify/api/service-resource) to create the resource under.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $serviceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Notifications';
    }
    /**
     * Create the NotificationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return NotificationInstance Created NotificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\NotificationInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Body' => $options['body'], 'Priority' => $options['priority'], 'Ttl' => $options['ttl'], 'Title' => $options['title'], 'Sound' => $options['sound'], 'Action' => $options['action'], 'Data' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['data']), 'Apn' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['apn']), 'Gcm' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['gcm']), 'Sms' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['sms']), 'FacebookMessenger' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['facebookMessenger']), 'Fcm' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['fcm']), 'Segment' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['segment'], function ($e) {
            return $e;
        }), 'Alexa' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['alexa']), 'ToBinding' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['toBinding'], function ($e) {
            return $e;
        }), 'DeliveryCallbackUrl' => $options['deliveryCallbackUrl'], 'Identity' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['identity'], function ($e) {
            return $e;
        }), 'Tag' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['tag'], function ($e) {
            return $e;
        })]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\NotificationInstance($this->version, $payload, $this->solution['serviceSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Notify.V1.NotificationList]';
    }
}
