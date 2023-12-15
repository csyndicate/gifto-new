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
use ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\FleetList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Preview\DeployedDevices\FleetList $fleets
 * @method \Twilio\Rest\Preview\DeployedDevices\FleetContext fleets(string $sid)
 */
class DeployedDevices extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_fleets = null;
    /**
     * Construct the DeployedDevices version of Preview
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\DeployedDevices DeployedDevices version of
     *                                              Preview
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'DeployedDevices';
    }
    /**
     * @return \Twilio\Rest\Preview\DeployedDevices\FleetList
     */
    protected function getFleets()
    {
        if (!$this->_fleets) {
            $this->_fleets = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\FleetList($this);
        }
        return $this->_fleets;
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
        return '[Twilio.Preview.DeployedDevices]';
    }
}
