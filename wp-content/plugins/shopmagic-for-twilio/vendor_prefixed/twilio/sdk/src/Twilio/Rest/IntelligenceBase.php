<?php

/*
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Rest\Intelligence\V2;
/**
 * @property \Twilio\Rest\Intelligence\V2 $v2
 */
class IntelligenceBase extends \ShopMagicTwilioVendor\Twilio\Domain
{
    protected $_v2;
    /**
     * Construct the Intelligence Domain
     *
     * @param Client $client Client to communicate with Twilio
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Rest\Client $client)
    {
        parent::__construct($client);
        $this->baseUrl = 'https://intelligence.twilio.com';
    }
    /**
     * @return V2 Version v2 of intelligence
     */
    protected function getV2() : \ShopMagicTwilioVendor\Twilio\Rest\Intelligence\V2
    {
        if (!$this->_v2) {
            $this->_v2 = new \ShopMagicTwilioVendor\Twilio\Rest\Intelligence\V2($this);
        }
        return $this->_v2;
    }
    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get(string $name)
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
    public function __call(string $name, array $arguments)
    {
        $method = 'context' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return \call_user_func_array([$this, $method], $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown context ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Intelligence]';
    }
}
