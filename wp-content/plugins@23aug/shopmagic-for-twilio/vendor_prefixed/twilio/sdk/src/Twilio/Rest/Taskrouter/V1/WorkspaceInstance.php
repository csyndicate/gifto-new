<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $defaultActivityName
 * @property string $defaultActivitySid
 * @property string $eventCallbackUrl
 * @property string $eventsFilter
 * @property string $friendlyName
 * @property bool $multiTaskEnabled
 * @property string $sid
 * @property string $timeoutActivityName
 * @property string $timeoutActivitySid
 * @property string $prioritizeQueueOrder
 * @property string $url
 * @property array $links
 */
class WorkspaceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
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
     * Initialize the WorkspaceInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\WorkspaceInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'defaultActivityName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'default_activity_name'), 'defaultActivitySid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'default_activity_sid'), 'eventCallbackUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'event_callback_url'), 'eventsFilter' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'events_filter'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'multiTaskEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'multi_task_enabled'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'timeoutActivityName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'timeout_activity_name'), 'timeoutActivitySid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'timeout_activity_sid'), 'prioritizeQueueOrder' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'prioritize_queue_order'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'));
        $this->solution = array('sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\WorkspaceContext Context for this
     *                                                     WorkspaceInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\WorkspaceContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a WorkspaceInstance
     *
     * @return WorkspaceInstance Fetched WorkspaceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
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
        return $this->proxy()->update($options);
    }
    /**
     * Deletes the WorkspaceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Access the activities
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\ActivityList
     */
    protected function getActivities()
    {
        return $this->proxy()->activities;
    }
    /**
     * Access the events
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\EventList
     */
    protected function getEvents()
    {
        return $this->proxy()->events;
    }
    /**
     * Access the tasks
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskList
     */
    protected function getTasks()
    {
        return $this->proxy()->tasks;
    }
    /**
     * Access the taskQueues
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueueList
     */
    protected function getTaskQueues()
    {
        return $this->proxy()->taskQueues;
    }
    /**
     * Access the workers
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkerList
     */
    protected function getWorkers()
    {
        return $this->proxy()->workers;
    }
    /**
     * Access the workflows
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkflowList
     */
    protected function getWorkflows()
    {
        return $this->proxy()->workflows;
    }
    /**
     * Access the statistics
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceStatisticsList
     */
    protected function getStatistics()
    {
        return $this->proxy()->statistics;
    }
    /**
     * Access the realTimeStatistics
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsList
     */
    protected function getRealTimeStatistics()
    {
        return $this->proxy()->realTimeStatistics;
    }
    /**
     * Access the cumulativeStatistics
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsList
     */
    protected function getCumulativeStatistics()
    {
        return $this->proxy()->cumulativeStatistics;
    }
    /**
     * Access the taskChannels
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskChannelList
     */
    protected function getTaskChannels()
    {
        return $this->proxy()->taskChannels;
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Taskrouter.V1.WorkspaceInstance ' . \implode(' ', $context) . ']';
    }
}
