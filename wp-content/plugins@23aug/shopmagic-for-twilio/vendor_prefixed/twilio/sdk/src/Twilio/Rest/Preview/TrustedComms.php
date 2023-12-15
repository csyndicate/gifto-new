<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\BrandedCallList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\BusinessList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\CpsList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\CurrentCallList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\DeviceList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\PhoneCallList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Preview\TrustedComms\BrandedCallList $brandedCalls
 * @property \Twilio\Rest\Preview\TrustedComms\BusinessList $businesses
 * @property \Twilio\Rest\Preview\TrustedComms\CpsList $cps
 * @property \Twilio\Rest\Preview\TrustedComms\CurrentCallList $currentCalls
 * @property \Twilio\Rest\Preview\TrustedComms\DeviceList $devices
 * @property \Twilio\Rest\Preview\TrustedComms\PhoneCallList $phoneCalls
 * @method \Twilio\Rest\Preview\TrustedComms\BusinessContext businesses(string $sid)
 */
class TrustedComms extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_brandedCalls = null;
    protected $_businesses = null;
    protected $_cps = null;
    protected $_currentCalls = null;
    protected $_devices = null;
    protected $_phoneCalls = null;
    /**
     * Construct the TrustedComms version of Preview
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\TrustedComms TrustedComms version of Preview
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'TrustedComms';
    }
    /**
     * @return \Twilio\Rest\Preview\TrustedComms\BrandedCallList
     */
    protected function getBrandedCalls()
    {
        if (!$this->_brandedCalls) {
            $this->_brandedCalls = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\BrandedCallList($this);
        }
        return $this->_brandedCalls;
    }
    /**
     * @return \Twilio\Rest\Preview\TrustedComms\BusinessList
     */
    protected function getBusinesses()
    {
        if (!$this->_businesses) {
            $this->_businesses = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\BusinessList($this);
        }
        return $this->_businesses;
    }
    /**
     * @return \Twilio\Rest\Preview\TrustedComms\CpsList
     */
    protected function getCps()
    {
        if (!$this->_cps) {
            $this->_cps = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\CpsList($this);
        }
        return $this->_cps;
    }
    /**
     * @return \Twilio\Rest\Preview\TrustedComms\CurrentCallList
     */
    protected function getCurrentCalls()
    {
        if (!$this->_currentCalls) {
            $this->_currentCalls = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\CurrentCallList($this);
        }
        return $this->_currentCalls;
    }
    /**
     * @return \Twilio\Rest\Preview\TrustedComms\DeviceList
     */
    protected function getDevices()
    {
        if (!$this->_devices) {
            $this->_devices = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\DeviceList($this);
        }
        return $this->_devices;
    }
    /**
     * @return \Twilio\Rest\Preview\TrustedComms\PhoneCallList
     */
    protected function getPhoneCalls()
    {
        if (!$this->_phoneCalls) {
            $this->_phoneCalls = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\TrustedComms\PhoneCallList($this);
        }
        return $this->_phoneCalls;
    }
    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown resource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments)
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
    public function __toString()
    {
        return '[Twilio.Preview.TrustedComms]';
    }
}
