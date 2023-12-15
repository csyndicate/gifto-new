<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\ActivityList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\EventList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskChannelList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkerList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkflowList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsList;
use ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceStatisticsList;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\ActivityList $activities
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\EventList $events
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\TaskList $tasks
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueList $taskQueues
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\WorkerList $workers
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\WorkflowList $workflows
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceStatisticsList $statistics
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsList $realTimeStatistics
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsList $cumulativeStatistics
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\TaskChannelList $taskChannels
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\ActivityContext activities(string $sid)
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\EventContext events(string $sid)
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\TaskContext tasks(string $sid)
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueContext taskQueues(string $sid)
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\WorkerContext workers(string $sid)
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\WorkflowContext workflows(string $sid)
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceStatisticsContext statistics()
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsContext realTimeStatistics()
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsContext cumulativeStatistics()
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\TaskChannelContext taskChannels(string $sid)
 */
class WorkspaceContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_activities = null;
    protected $_events = null;
    protected $_tasks = null;
    protected $_taskQueues = null;
    protected $_workers = null;
    protected $_workflows = null;
    protected $_statistics = null;
    protected $_realTimeStatistics = null;
    protected $_cumulativeStatistics = null;
    protected $_taskChannels = null;
    /**
     * Initialize the WorkspaceContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\WorkspaceContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/Workspaces/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a WorkspaceInstance
     *
     * @return WorkspaceInstance Fetched WorkspaceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\WorkspaceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the WorkspaceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkspaceInstance Updated WorkspaceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('DefaultActivitySid' => $options['defaultActivitySid'], 'EventCallbackUrl' => $options['eventCallbackUrl'], 'EventsFilter' => $options['eventsFilter'], 'FriendlyName' => $options['friendlyName'], 'MultiTaskEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['multiTaskEnabled']), 'TimeoutActivitySid' => $options['timeoutActivitySid'], 'PrioritizeQueueOrder' => $options['prioritizeQueueOrder']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\WorkspaceInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Deletes the WorkspaceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->version->delete('delete', $this->uri);
    }
    /**
     * Access the activities
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\ActivityList
     */
    protected function getActivities()
    {
        if (!$this->_activities) {
            $this->_activities = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\ActivityList($this->version, $this->solution['sid']);
        }
        return $this->_activities;
    }
    /**
     * Access the events
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\EventList
     */
    protected function getEvents()
    {
        if (!$this->_events) {
            $this->_events = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\EventList($this->version, $this->solution['sid']);
        }
        return $this->_events;
    }
    /**
     * Access the tasks
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskList
     */
    protected function getTasks()
    {
        if (!$this->_tasks) {
            $this->_tasks = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskList($this->version, $this->solution['sid']);
        }
        return $this->_tasks;
    }
    /**
     * Access the taskQueues
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueList
     */
    protected function getTaskQueues()
    {
        if (!$this->_taskQueues) {
            $this->_taskQueues = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueList($this->version, $this->solution['sid']);
        }
        return $this->_taskQueues;
    }
    /**
     * Access the workers
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkerList
     */
    protected function getWorkers()
    {
        if (!$this->_workers) {
            $this->_workers = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkerList($this->version, $this->solution['sid']);
        }
        return $this->_workers;
    }
    /**
     * Access the workflows
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkflowList
     */
    protected function getWorkflows()
    {
        if (!$this->_workflows) {
            $this->_workflows = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkflowList($this->version, $this->solution['sid']);
        }
        return $this->_workflows;
    }
    /**
     * Access the statistics
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceStatisticsList
     */
    protected function getStatistics()
    {
        if (!$this->_statistics) {
            $this->_statistics = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceStatisticsList($this->version, $this->solution['sid']);
        }
        return $this->_statistics;
    }
    /**
     * Access the realTimeStatistics
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsList
     */
    protected function getRealTimeStatistics()
    {
        if (!$this->_realTimeStatistics) {
            $this->_realTimeStatistics = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsList($this->version, $this->solution['sid']);
        }
        return $this->_realTimeStatistics;
    }
    /**
     * Access the cumulativeStatistics
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsList
     */
    protected function getCumulativeStatistics()
    {
        if (!$this->_cumulativeStatistics) {
            $this->_cumulativeStatistics = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsList($this->version, $this->solution['sid']);
        }
        return $this->_cumulativeStatistics;
    }
    /**
     * Access the taskChannels
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskChannelList
     */
    protected function getTaskChannels()
    {
        if (!$this->_taskChannels) {
            $this->_taskChannels = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskChannelList($this->version, $this->solution['sid']);
        }
        return $this->_taskChannels;
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
        return '[Twilio.Taskrouter.V1.WorkspaceContext ' . \implode(' ', $context) . ']';
    }
}
