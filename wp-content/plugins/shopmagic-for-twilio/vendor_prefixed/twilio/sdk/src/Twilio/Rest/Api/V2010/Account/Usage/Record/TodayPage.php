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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\Record;

use ShopMagicTwilioVendor\Twilio\Http\Response;
use ShopMagicTwilioVendor\Twilio\Page;
use ShopMagicTwilioVendor\Twilio\Version;
class TodayPage extends \ShopMagicTwilioVendor\Twilio\Page
{
    /**
     * @param Version $version Version that contains the resource
     * @param Response $response Response from the API
     * @param array $solution The context solution
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, \ShopMagicTwilioVendor\Twilio\Http\Response $response, array $solution)
    {
        parent::__construct($version, $response);
        // Path Solution
        $this->solution = $solution;
    }
    /**
     * @param array $payload Payload response from the API
     * @return TodayInstance \Twilio\Rest\Api\V2010\Account\Usage\Record\TodayInstance
     */
    public function buildInstance(array $payload) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\Record\TodayInstance
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\Record\TodayInstance($this->version, $payload, $this->solution['accountSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.TodayPage]';
    }
}
