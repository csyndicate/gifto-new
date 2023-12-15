<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStepList;
use ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextList;
/**
 * @property ExecutionStepList $steps
 * @property ExecutionContextList $executionContext
 * @method \Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextContext executionContext()
 * @method \Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStepContext steps(string $sid)
 */
class ExecutionContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_steps;
    protected $_executionContext;
    /**
     * Initialize the ExecutionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Excecution's Flow.
     * @param string $sid The SID of the Execution resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $flowSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['flowSid' => $flowSid, 'sid' => $sid];
        $this->uri = '/Flows/' . \rawurlencode($flowSid) . '/Executions/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the ExecutionInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the ExecutionInstance
     *
     * @return ExecutionInstance Fetched ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionInstance($this->version, $payload, $this->solution['flowSid'], $this->solution['sid']);
    }
    /**
     * Update the ExecutionInstance
     *
     * @param string $status
     * @return ExecutionInstance Updated ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Status' => $status]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionInstance($this->version, $payload, $this->solution['flowSid'], $this->solution['sid']);
    }
    /**
     * Access the steps
     */
    protected function getSteps() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStepList
    {
        if (!$this->_steps) {
            $this->_steps = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStepList($this->version, $this->solution['flowSid'], $this->solution['sid']);
        }
        return $this->_steps;
    }
    /**
     * Access the executionContext
     */
    protected function getExecutionContext() : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextList
    {
        if (!$this->_executionContext) {
            $this->_executionContext = new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextList($this->version, $this->solution['flowSid'], $this->solution['sid']);
        }
        return $this->_executionContext;
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
        return '[Twilio.Studio.V2.ExecutionContext ' . \implode(' ', $context) . ']';
    }
}