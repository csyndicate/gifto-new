<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextList;
use ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepList;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepList $steps
 * @property \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextList $executionContext
 * @method \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepContext steps(string $sid)
 * @method \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextContext executionContext()
 */
class ExecutionContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_steps = null;
    protected $_executionContext = null;
    /**
     * Initialize the ExecutionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     * @param string $sid The SID of the Execution resource to fetch
     * @return \Twilio\Rest\Studio\V1\Flow\ExecutionContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $flowSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('flowSid' => $flowSid, 'sid' => $sid);
        $this->uri = '/Flows/' . \rawurlencode($flowSid) . '/Executions/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a ExecutionInstance
     *
     * @return ExecutionInstance Fetched ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\ExecutionInstance($this->version, $payload, $this->solution['flowSid'], $this->solution['sid']);
    }
    /**
     * Deletes the ExecutionInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }
    /**
     * Access the steps
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepList
     */
    protected function getSteps()
    {
        if (!$this->_steps) {
            $this->_steps = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStepList($this->version, $this->solution['flowSid'], $this->solution['sid']);
        }
        return $this->_steps;
    }
    /**
     * Access the executionContext
     *
     * @return \Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextList
     */
    protected function getExecutionContext()
    {
        if (!$this->_executionContext) {
            $this->_executionContext = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V1\Flow\Execution\ExecutionContextList($this->version, $this->solution['flowSid'], $this->solution['sid']);
        }
        return $this->_executionContext;
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
        return '[Twilio.Studio.V1.ExecutionContext ' . \implode(' ', $context) . ']';
    }
}
