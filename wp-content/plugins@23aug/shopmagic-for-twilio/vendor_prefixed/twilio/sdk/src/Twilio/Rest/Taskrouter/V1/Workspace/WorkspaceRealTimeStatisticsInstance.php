<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property array $activityStatistics
 * @property int $longestTaskWaitingAge
 * @property string $longestTaskWaitingSid
 * @property array $tasksByPriority
 * @property array $tasksByStatus
 * @property int $totalTasks
 * @property int $totalWorkers
 * @property string $workspaceSid
 * @property string $url
 */
class WorkspaceRealTimeStatisticsInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the WorkspaceRealTimeStatisticsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $workspaceSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'activityStatistics' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'activity_statistics'), 'longestTaskWaitingAge' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'longest_task_waiting_age'), 'longestTaskWaitingSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'longest_task_waiting_sid'), 'tasksByPriority' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_by_priority'), 'tasksByStatus' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_by_status'), 'totalTasks' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'total_tasks'), 'totalWorkers' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'total_workers'), 'workspaceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'workspace_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'));
        $this->solution = array('workspaceSid' => $workspaceSid);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsContext Context for this
     *                                                                                 WorkspaceRealTimeStatisticsInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceRealTimeStatisticsContext($this->version, $this->solution['workspaceSid']);
        }
        return $this->context;
    }
    /**
     * Fetch a WorkspaceRealTimeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkspaceRealTimeStatisticsInstance Fetched
     *                                             WorkspaceRealTimeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array())
    {
        return $this->proxy()->fetch($options);
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
        return '[Twilio.Taskrouter.V1.WorkspaceRealTimeStatisticsInstance ' . \implode(' ', $context) . ']';
    }
}
