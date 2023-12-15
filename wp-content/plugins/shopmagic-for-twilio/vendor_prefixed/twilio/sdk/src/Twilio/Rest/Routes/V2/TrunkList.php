<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Routes
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Routes\V2;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
class TrunkList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the TrunkList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
    }
    /**
     * Constructs a TrunkContext
     *
     * @param string $sipTrunkDomain The absolute URL of the SIP Trunk
     */
    public function getContext(string $sipTrunkDomain) : \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\TrunkContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\TrunkContext($this->version, $sipTrunkDomain);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Routes.V2.TrunkList]';
    }
}
