<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Proxy
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberList;
use ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\ShortCodeList;
use ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionList;
/**
 * @property PhoneNumberList $phoneNumbers
 * @property ShortCodeList $shortCodes
 * @property SessionList $sessions
 * @method \Twilio\Rest\Proxy\V1\Service\SessionContext sessions(string $sid)
 * @method \Twilio\Rest\Proxy\V1\Service\ShortCodeContext shortCodes(string $sid)
 * @method \Twilio\Rest\Proxy\V1\Service\PhoneNumberContext phoneNumbers(string $sid)
 */
class ServiceContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_phoneNumbers;
    protected $_shortCodes;
    protected $_sessions;
    /**
     * Initialize the ServiceContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The Twilio-provided string that uniquely identifies the Service resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the ServiceInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\ServiceInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\ServiceInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['UniqueName' => $options['uniqueName'], 'DefaultTtl' => $options['defaultTtl'], 'CallbackUrl' => $options['callbackUrl'], 'GeoMatchLevel' => $options['geoMatchLevel'], 'NumberSelectionBehavior' => $options['numberSelectionBehavior'], 'InterceptCallbackUrl' => $options['interceptCallbackUrl'], 'OutOfSessionCallbackUrl' => $options['outOfSessionCallbackUrl'], 'ChatInstanceSid' => $options['chatInstanceSid']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the phoneNumbers
     */
    protected function getPhoneNumbers() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberList
    {
        if (!$this->_phoneNumbers) {
            $this->_phoneNumbers = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\PhoneNumberList($this->version, $this->solution['sid']);
        }
        return $this->_phoneNumbers;
    }
    /**
     * Access the shortCodes
     */
    protected function getShortCodes() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\ShortCodeList
    {
        if (!$this->_shortCodes) {
            $this->_shortCodes = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\ShortCodeList($this->version, $this->solution['sid']);
        }
        return $this->_shortCodes;
    }
    /**
     * Access the sessions
     */
    protected function getSessions() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionList
    {
        if (!$this->_sessions) {
            $this->_sessions = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionList($this->version, $this->solution['sid']);
        }
        return $this->_sessions;
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
        return '[Twilio.Proxy.V1.ServiceContext ' . \implode(' ', $context) . ']';
    }
}
