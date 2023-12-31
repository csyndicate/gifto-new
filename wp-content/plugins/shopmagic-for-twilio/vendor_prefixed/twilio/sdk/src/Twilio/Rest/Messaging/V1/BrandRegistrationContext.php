<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistration\BrandRegistrationOtpList;
use ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistration\BrandVettingList;
/**
 * @property BrandRegistrationOtpList $brandRegistrationOtps
 * @property BrandVettingList $brandVettings
 * @method \Twilio\Rest\Messaging\V1\BrandRegistration\BrandVettingContext brandVettings(string $brandVettingSid)
 */
class BrandRegistrationContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_brandRegistrationOtps;
    protected $_brandVettings;
    /**
     * Initialize the BrandRegistrationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID of the Brand Registration resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
        $this->uri = '/a2p/BrandRegistrations/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the BrandRegistrationInstance
     *
     * @return BrandRegistrationInstance Fetched BrandRegistrationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistrationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistrationInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the BrandRegistrationInstance
     *
     * @return BrandRegistrationInstance Updated BrandRegistrationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update() : \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistrationInstance
    {
        $payload = $this->version->update('POST', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistrationInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the brandRegistrationOtps
     */
    protected function getBrandRegistrationOtps() : \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistration\BrandRegistrationOtpList
    {
        if (!$this->_brandRegistrationOtps) {
            $this->_brandRegistrationOtps = new \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistration\BrandRegistrationOtpList($this->version, $this->solution['sid']);
        }
        return $this->_brandRegistrationOtps;
    }
    /**
     * Access the brandVettings
     */
    protected function getBrandVettings() : \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistration\BrandVettingList
    {
        if (!$this->_brandVettings) {
            $this->_brandVettings = new \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\BrandRegistration\BrandVettingList($this->version, $this->solution['sid']);
        }
        return $this->_brandVettings;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name) : \ShopMagicTwilioVendor\Twilio\ListResource
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
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Messaging.V1.BrandRegistrationContext ' . \implode(' ', $context) . ']';
    }
}
