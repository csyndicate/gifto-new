<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Call;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class UserDefinedMessageList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the UserDefinedMessageList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created User Defined Message.
     * @param string $callSid The SID of the [Call](https://www.twilio.com/docs/voice/api/call-resource) the User Defined Message is associated with.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $accountSid, string $callSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'callSid' => $callSid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Calls/' . \rawurlencode($callSid) . '/UserDefinedMessages.json';
    }
    /**
     * Create the UserDefinedMessageInstance
     *
     * @param string $content The User Defined Message in the form of URL-encoded JSON string.
     * @param array|Options $options Optional Arguments
     * @return UserDefinedMessageInstance Created UserDefinedMessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $content, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Call\UserDefinedMessageInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Content' => $content, 'IdempotencyKey' => $options['idempotencyKey']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Call\UserDefinedMessageInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['callSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.UserDefinedMessageList]';
    }
}
