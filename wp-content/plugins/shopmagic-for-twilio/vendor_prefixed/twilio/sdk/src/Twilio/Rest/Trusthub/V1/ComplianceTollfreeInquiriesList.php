<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Trusthub
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class ComplianceTollfreeInquiriesList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the ComplianceTollfreeInquiriesList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/ComplianceInquiries/Tollfree/Initialize';
    }
    /**
     * Create the ComplianceTollfreeInquiriesInstance
     *
     * @param string $did The Tollfree phone number to be verified
     * @return ComplianceTollfreeInquiriesInstance Created ComplianceTollfreeInquiriesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $did) : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceTollfreeInquiriesInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Did' => $did]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceTollfreeInquiriesInstance($this->version, $payload);
    }
    /**
     * Constructs a ComplianceTollfreeInquiriesContext
     *
     * @param string $tollfreeId The unique TolfreeId matching the Compliance Tollfree Verification Inquiry that should be resumed or resubmitted. This value will have been returned by the initial Compliance Tollfree Verification Inquiry creation call.
     */
    public function getContext(string $tollfreeId) : \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceTollfreeInquiriesContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Trusthub\V1\ComplianceTollfreeInquiriesContext($this->version, $tollfreeId);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Trusthub.V1.ComplianceTollfreeInquiriesList]';
    }
}