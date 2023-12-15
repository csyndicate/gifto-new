<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Trunking;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\TrunkList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Trunking\V1\TrunkList $trunks
 * @method \Twilio\Rest\Trunking\V1\TrunkContext trunks(string $sid)
 */
class V1 extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_trunks = null;
    /**
     * Construct the V1 version of Trunking
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Trunking\V1 V1 version of Trunking
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    /**
     * @return \Twilio\Rest\Trunking\V1\TrunkList
     */
    protected function getTrunks()
    {
        if (!$this->_trunks) {
            $this->_trunks = new \ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\TrunkList($this);
        }
        return $this->_trunks;
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
        return '[Twilio.Trunking.V1]';
    }
}
