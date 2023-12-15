<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Autopilot
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\SampleList;
use ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\FieldList;
use ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\TaskActionsList;
use ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\TaskStatisticsList;
/**
 * @property SampleList $samples
 * @property FieldList $fields
 * @property TaskActionsList $taskActions
 * @property TaskStatisticsList $statistics
 * @method \Twilio\Rest\Autopilot\V1\Assistant\Task\SampleContext samples(string $sid)
 * @method \Twilio\Rest\Autopilot\V1\Assistant\Task\TaskActionsContext taskActions()
 * @method \Twilio\Rest\Autopilot\V1\Assistant\Task\TaskStatisticsContext statistics()
 * @method \Twilio\Rest\Autopilot\V1\Assistant\Task\FieldContext fields(string $sid)
 */
class TaskContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_samples;
    protected $_fields;
    protected $_taskActions;
    protected $_statistics;
    /**
     * Initialize the TaskContext
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The SID of the [Assistant](https://www.twilio.com/docs/autopilot/api/assistant) that is the parent of the new resource.
     * @param string $sid The Twilio-provided string that uniquely identifies the Task resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $assistantSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['assistantSid' => $assistantSid, 'sid' => $sid];
        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/Tasks/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the TaskInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the TaskInstance
     *
     * @return TaskInstance Fetched TaskInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\TaskInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\TaskInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['sid']);
    }
    /**
     * Update the TaskInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TaskInstance Updated TaskInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\TaskInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['FriendlyName' => $options['friendlyName'], 'UniqueName' => $options['uniqueName'], 'Actions' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['actions']), 'ActionsUrl' => $options['actionsUrl']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\TaskInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['sid']);
    }
    /**
     * Access the samples
     */
    protected function getSamples() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\SampleList
    {
        if (!$this->_samples) {
            $this->_samples = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\SampleList($this->version, $this->solution['assistantSid'], $this->solution['sid']);
        }
        return $this->_samples;
    }
    /**
     * Access the fields
     */
    protected function getFields() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\FieldList
    {
        if (!$this->_fields) {
            $this->_fields = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\FieldList($this->version, $this->solution['assistantSid'], $this->solution['sid']);
        }
        return $this->_fields;
    }
    /**
     * Access the taskActions
     */
    protected function getTaskActions() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\TaskActionsList
    {
        if (!$this->_taskActions) {
            $this->_taskActions = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\TaskActionsList($this->version, $this->solution['assistantSid'], $this->solution['sid']);
        }
        return $this->_taskActions;
    }
    /**
     * Access the statistics
     */
    protected function getStatistics() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\TaskStatisticsList
    {
        if (!$this->_statistics) {
            $this->_statistics = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\TaskStatisticsList($this->version, $this->solution['assistantSid'], $this->solution['sid']);
        }
        return $this->_statistics;
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
        return '[Twilio.Autopilot.V1.TaskContext ' . \implode(' ', $context) . ']';
    }
}
