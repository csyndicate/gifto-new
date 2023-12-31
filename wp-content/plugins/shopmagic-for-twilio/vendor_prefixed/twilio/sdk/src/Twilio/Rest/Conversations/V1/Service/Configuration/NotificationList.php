<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Conversations
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Configuration;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
class NotificationList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the NotificationList
     *
     * @param Version $version Version that contains the resource
     * @param string $chatServiceSid The SID of the [Conversation Service](https://www.twilio.com/docs/conversations/api/service-resource) the Configuration applies to.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $chatServiceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['chatServiceSid' => $chatServiceSid];
    }
    /**
     * Constructs a NotificationContext
     */
    public function getContext() : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Configuration\NotificationContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Configuration\NotificationContext($this->version, $this->solution['chatServiceSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Conversations.V1.NotificationList]';
    }
}
