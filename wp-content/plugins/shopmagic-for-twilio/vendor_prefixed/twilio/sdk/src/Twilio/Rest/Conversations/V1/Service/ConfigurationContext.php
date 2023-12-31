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
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
class ConfigurationContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the ConfigurationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $chatServiceSid The SID of the Service configuration resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $chatServiceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['chatServiceSid' => $chatServiceSid];
        $this->uri = '/Services/' . \rawurlencode($chatServiceSid) . '/Configuration';
    }
    /**
     * Fetch the ConfigurationInstance
     *
     * @return ConfigurationInstance Fetched ConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\ConfigurationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\ConfigurationInstance($this->version, $payload, $this->solution['chatServiceSid']);
    }
    /**
     * Update the ConfigurationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConfigurationInstance Updated ConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\ConfigurationInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['DefaultConversationCreatorRoleSid' => $options['defaultConversationCreatorRoleSid'], 'DefaultConversationRoleSid' => $options['defaultConversationRoleSid'], 'DefaultChatServiceRoleSid' => $options['defaultChatServiceRoleSid'], 'ReachabilityEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['reachabilityEnabled'])]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\ConfigurationInstance($this->version, $payload, $this->solution['chatServiceSid']);
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
        return '[Twilio.Conversations.V1.ConfigurationContext ' . \implode(' ', $context) . ']';
    }
}
