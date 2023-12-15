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
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\FactorList;
use ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\NewFactorList;
use ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\ChallengeList;
/**
 * @property FactorList $factors
 * @property NewFactorList $newFactors
 * @property ChallengeList $challenges
 * @method \Twilio\Rest\Verify\V2\Service\Entity\FactorContext factors(string $sid)
 * @method \Twilio\Rest\Verify\V2\Service\Entity\ChallengeContext challenges(string $sid)
 */
class EntityContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_factors;
    protected $_newFactors;
    protected $_challenges;
    /**
     * Initialize the EntityContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The unique SID identifier of the Service.
     * @param string $identity The unique external identifier for the Entity of the Service. This identifier should be immutable, not PII, length between 8 and 64 characters, and generated by your external system, such as your user's UUID, GUID, or SID. It can only contain dash (-) separated alphanumeric characters.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $identity)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'identity' => $identity];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Entities/' . \rawurlencode($identity) . '';
    }
    /**
     * Delete the EntityInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the EntityInstance
     *
     * @return EntityInstance Fetched EntityInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\EntityInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\EntityInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['identity']);
    }
    /**
     * Access the factors
     */
    protected function getFactors() : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\FactorList
    {
        if (!$this->_factors) {
            $this->_factors = new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\FactorList($this->version, $this->solution['serviceSid'], $this->solution['identity']);
        }
        return $this->_factors;
    }
    /**
     * Access the newFactors
     */
    protected function getNewFactors() : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\NewFactorList
    {
        if (!$this->_newFactors) {
            $this->_newFactors = new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\NewFactorList($this->version, $this->solution['serviceSid'], $this->solution['identity']);
        }
        return $this->_newFactors;
    }
    /**
     * Access the challenges
     */
    protected function getChallenges() : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\ChallengeList
    {
        if (!$this->_challenges) {
            $this->_challenges = new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\Entity\ChallengeList($this->version, $this->solution['serviceSid'], $this->solution['identity']);
        }
        return $this->_challenges;
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
        return '[Twilio.Verify.V2.EntityContext ' . \implode(' ', $context) . ']';
    }
}
