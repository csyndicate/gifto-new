<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Verify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class VerificationContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the VerificationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the verification [Service](https://www.twilio.com/docs/verify/api/service) to create the resource under.
     * @param string $sid The Twilio-provided string that uniquely identifies the Verification resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Verifications/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the VerificationInstance
     *
     * @return VerificationInstance Fetched VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\VerificationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\VerificationInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['sid']);
    }
    /**
     * Update the VerificationInstance
     *
     * @param string $status
     * @return VerificationInstance Updated VerificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status) : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\VerificationInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Status' => $status]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\VerificationInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['sid']);
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
        return '[Twilio.Verify.V2.VerificationContext ' . \implode(' ', $context) . ']';
    }
}
