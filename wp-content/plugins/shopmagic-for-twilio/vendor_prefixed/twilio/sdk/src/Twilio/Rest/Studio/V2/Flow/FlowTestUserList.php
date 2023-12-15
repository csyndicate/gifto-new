<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
class FlowTestUserList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the FlowTestUserList
     *
     * @param Version $version Version that contains the resource
     * @param string $sid Unique identifier of the flow.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
    }
    /**
     * Constructs a FlowTestUserContext
     */
    public function getContext() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\FlowTestUserContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\FlowTestUserContext($this->version, $this->solution['sid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Studio.V2.FlowTestUserList]';
    }
}
