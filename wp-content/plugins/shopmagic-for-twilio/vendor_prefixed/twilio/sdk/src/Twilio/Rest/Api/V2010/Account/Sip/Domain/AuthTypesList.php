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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCallsList;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrationsList;
/**
 * @property AuthTypeCallsList $calls
 * @property AuthTypeRegistrationsList $registrations
 */
class AuthTypesList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    protected $_calls = null;
    protected $_registrations = null;
    /**
     * Construct the AuthTypesList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the CredentialListMapping resource to fetch.
     * @param string $domainSid The SID of the SIP domain that contains the resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $accountSid, string $domainSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'domainSid' => $domainSid];
    }
    /**
     * Access the calls
     */
    protected function getCalls() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCallsList
    {
        if (!$this->_calls) {
            $this->_calls = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeCallsList($this->version, $this->solution['accountSid'], $this->solution['domainSid']);
        }
        return $this->_calls;
    }
    /**
     * Access the registrations
     */
    protected function getRegistrations() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrationsList
    {
        if (!$this->_registrations) {
            $this->_registrations = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrationsList($this->version, $this->solution['accountSid'], $this->solution['domainSid']);
        }
        return $this->_registrations;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name)
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown subresource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : \ShopMagicTwilioVendor\Twilio\InstanceContext
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Resource does not have a context');
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.AuthTypesList]';
    }
}