<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Supersim
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\Sim\BillingPeriodList;
use ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\Sim\SimIpAddressList;
/**
 * @property BillingPeriodList $billingPeriods
 * @property SimIpAddressList $simIpAddresses
 */
class SimContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_billingPeriods;
    protected $_simIpAddresses;
    /**
     * Initialize the SimContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID of the Sim resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
        $this->uri = '/Sims/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the SimInstance
     *
     * @return SimInstance Fetched SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SimInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SimInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the SimInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SimInstance Updated SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SimInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['UniqueName' => $options['uniqueName'], 'Status' => $options['status'], 'Fleet' => $options['fleet'], 'CallbackUrl' => $options['callbackUrl'], 'CallbackMethod' => $options['callbackMethod'], 'AccountSid' => $options['accountSid']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SimInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the billingPeriods
     */
    protected function getBillingPeriods() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\Sim\BillingPeriodList
    {
        if (!$this->_billingPeriods) {
            $this->_billingPeriods = new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\Sim\BillingPeriodList($this->version, $this->solution['sid']);
        }
        return $this->_billingPeriods;
    }
    /**
     * Access the simIpAddresses
     */
    protected function getSimIpAddresses() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\Sim\SimIpAddressList
    {
        if (!$this->_simIpAddresses) {
            $this->_simIpAddresses = new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\Sim\SimIpAddressList($this->version, $this->solution['sid']);
        }
        return $this->_simIpAddresses;
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
        return '[Twilio.Supersim.V1.SimContext ' . \implode(' ', $context) . ']';
    }
}
