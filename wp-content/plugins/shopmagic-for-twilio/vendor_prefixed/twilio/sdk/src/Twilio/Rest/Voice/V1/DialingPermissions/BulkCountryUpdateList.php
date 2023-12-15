<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Voice
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Voice\V1\DialingPermissions;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class BulkCountryUpdateList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the BulkCountryUpdateList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/DialingPermissions/BulkCountryUpdates';
    }
    /**
     * Create the BulkCountryUpdateInstance
     *
     * @param string $updateRequest URL encoded JSON array of update objects. example : `[ { \\\"iso_code\\\": \\\"GB\\\", \\\"low_risk_numbers_enabled\\\": \\\"true\\\", \\\"high_risk_special_numbers_enabled\\\":\\\"true\\\", \\\"high_risk_tollfraud_numbers_enabled\\\": \\\"false\\\" } ]`
     * @return BulkCountryUpdateInstance Created BulkCountryUpdateInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $updateRequest) : \ShopMagicTwilioVendor\Twilio\Rest\Voice\V1\DialingPermissions\BulkCountryUpdateInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['UpdateRequest' => $updateRequest]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Voice\V1\DialingPermissions\BulkCountryUpdateInstance($this->version, $payload);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Voice.V1.BulkCountryUpdateList]';
    }
}
