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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCalls;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class AuthCallsCredentialListMappingContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the AuthCallsCredentialListMappingContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that will create the resource.
     * @param string $domainSid The SID of the SIP domain that will contain the new resource.
     * @param string $sid The Twilio-provided string that uniquely identifies the CredentialListMapping resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid, $domainSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'domainSid' => $domainSid, 'sid' => $sid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/SIP/Domains/' . \rawurlencode($domainSid) . '/Auth/Calls/CredentialListMappings/' . \rawurlencode($sid) . '.json';
    }
    /**
     * Delete the AuthCallsCredentialListMappingInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the AuthCallsCredentialListMappingInstance
     *
     * @return AuthCallsCredentialListMappingInstance Fetched AuthCallsCredentialListMappingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCalls\AuthCallsCredentialListMappingInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCalls\AuthCallsCredentialListMappingInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['domainSid'], $this->solution['sid']);
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
        return '[Twilio.Api.V2010.AuthCallsCredentialListMappingContext ' . \implode(' ', $context) . ']';
    }
}