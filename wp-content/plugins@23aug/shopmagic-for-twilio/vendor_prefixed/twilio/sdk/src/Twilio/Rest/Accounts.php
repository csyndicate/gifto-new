<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1;
/**
 * @property \Twilio\Rest\Accounts\V1 $v1
 * @property \Twilio\Rest\Accounts\V1\CredentialList $credentials
 */
class Accounts extends \ShopMagicTwilioVendor\Twilio\Domain
{
    protected $_v1 = null;
    /**
     * Construct the Accounts Domain
     *
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Accounts Domain for Accounts
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Rest\Client $client)
    {
        parent::__construct($client);
        $this->baseUrl = 'https://accounts.twilio.com';
    }
    /**
     * @return \Twilio\Rest\Accounts\V1 Version v1 of accounts
     */
    protected function getV1()
    {
        if (!$this->_v1) {
            $this->_v1 = new \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1($this);
        }
        return $this->_v1;
    }
    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get($name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown version ' . $name);
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
        $method = 'context' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return \call_user_func_array(array($this, $method), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown context ' . $name);
    }
    /**
     * @return \Twilio\Rest\Accounts\V1\CredentialList
     */
    protected function getCredentials()
    {
        return $this->v1->credentials;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Accounts]';
    }
}
