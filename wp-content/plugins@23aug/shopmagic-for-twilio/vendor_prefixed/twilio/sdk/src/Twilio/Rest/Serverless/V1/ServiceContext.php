<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\AssetList;
use ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildList;
use ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\EnvironmentList;
use ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\FunctionList;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property \Twilio\Rest\Serverless\V1\Service\EnvironmentList $environments
 * @property \Twilio\Rest\Serverless\V1\Service\FunctionList $functions
 * @property \Twilio\Rest\Serverless\V1\Service\AssetList $assets
 * @property \Twilio\Rest\Serverless\V1\Service\BuildList $builds
 * @method \Twilio\Rest\Serverless\V1\Service\EnvironmentContext environments(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\FunctionContext functions(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\AssetContext assets(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\BuildContext builds(string $sid)
 */
class ServiceContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_environments = null;
    protected $_functions = null;
    protected $_assets = null;
    protected $_builds = null;
    /**
     * Initialize the ServiceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID of the Service resource to fetch
     * @return \Twilio\Rest\Serverless\V1\ServiceContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/Services/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Deletes the ServiceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('IncludeCredentials' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['includeCredentials']), 'FriendlyName' => $options['friendlyName']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\ServiceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the environments
     *
     * @return \Twilio\Rest\Serverless\V1\Service\EnvironmentList
     */
    protected function getEnvironments()
    {
        if (!$this->_environments) {
            $this->_environments = new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\EnvironmentList($this->version, $this->solution['sid']);
        }
        return $this->_environments;
    }
    /**
     * Access the functions
     *
     * @return \Twilio\Rest\Serverless\V1\Service\FunctionList
     */
    protected function getFunctions()
    {
        if (!$this->_functions) {
            $this->_functions = new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\FunctionList($this->version, $this->solution['sid']);
        }
        return $this->_functions;
    }
    /**
     * Access the assets
     *
     * @return \Twilio\Rest\Serverless\V1\Service\AssetList
     */
    protected function getAssets()
    {
        if (!$this->_assets) {
            $this->_assets = new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\AssetList($this->version, $this->solution['sid']);
        }
        return $this->_assets;
    }
    /**
     * Access the builds
     *
     * @return \Twilio\Rest\Serverless\V1\Service\BuildList
     */
    protected function getBuilds()
    {
        if (!$this->_builds) {
            $this->_builds = new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildList($this->version, $this->solution['sid']);
        }
        return $this->_builds;
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
        return '[Twilio.Serverless.V1.ServiceContext ' . \implode(' ', $context) . ']';
    }
}
