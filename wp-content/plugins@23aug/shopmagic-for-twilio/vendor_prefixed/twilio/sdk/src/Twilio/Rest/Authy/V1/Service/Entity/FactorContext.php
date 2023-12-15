<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Authy\V1\Service\Entity;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeList;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeList $challenges
 * @method \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeContext challenges(string $sid)
 */
class FactorContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_challenges = null;
    /**
     * Initialize the FactorContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique identity of the Entity
     * @param string $sid A string that uniquely identifies this Factor.
     * @return \Twilio\Rest\Authy\V1\Service\Entity\FactorContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $identity, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'identity' => $identity, 'sid' => $sid);
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Entities/' . \rawurlencode($identity) . '/Factors/' . \rawurlencode($sid) . '';
    }
    /**
     * Deletes the FactorInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }
    /**
     * Fetch a FactorInstance
     *
     * @return FactorInstance Fetched FactorInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Authy\V1\Service\Entity\FactorInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['identity'], $this->solution['sid']);
    }
    /**
     * Update the FactorInstance
     *
     * @param array|Options $options Optional Arguments
     * @return FactorInstance Updated FactorInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('AuthPayload' => $options['authPayload']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Authy\V1\Service\Entity\FactorInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['identity'], $this->solution['sid']);
    }
    /**
     * Access the challenges
     *
     * @return \Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeList
     */
    protected function getChallenges()
    {
        if (!$this->_challenges) {
            $this->_challenges = new \ShopMagicTwilioVendor\Twilio\Rest\Authy\V1\Service\Entity\Factor\ChallengeList($this->version, $this->solution['serviceSid'], $this->solution['identity'], $this->solution['sid']);
        }
        return $this->_challenges;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name)
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Authy.V1.FactorContext ' . \implode(' ', $context) . ']';
    }
}
