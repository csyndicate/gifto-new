<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Taskrouter
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $accountSid
 * @property int|null $avgTaskAcceptanceTime
 * @property \DateTime|null $startTime
 * @property \DateTime|null $endTime
 * @property int|null $reservationsCreated
 * @property int|null $reservationsAccepted
 * @property int|null $reservationsRejected
 * @property int|null $reservationsTimedOut
 * @property int|null $reservationsCanceled
 * @property int|null $reservationsRescinded
 * @property array|null $splitByWaitTime
 * @property string|null $taskQueueSid
 * @property array|null $waitDurationUntilAccepted
 * @property array|null $waitDurationUntilCanceled
 * @property array|null $waitDurationInQueueUntilAccepted
 * @property int|null $tasksCanceled
 * @property int|null $tasksCompleted
 * @property int|null $tasksDeleted
 * @property int|null $tasksEntered
 * @property int|null $tasksMoved
 * @property string|null $workspaceSid
 * @property string|null $url
 */
class TaskQueueCumulativeStatisticsInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the TaskQueueCumulativeStatisticsInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace with the TaskQueue to fetch.
     * @param string $taskQueueSid The SID of the TaskQueue for which to fetch statistics.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $workspaceSid, string $taskQueueSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'avgTaskAcceptanceTime' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'avg_task_acceptance_time'), 'startTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'start_time')), 'endTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_time')), 'reservationsCreated' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_created'), 'reservationsAccepted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_accepted'), 'reservationsRejected' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_rejected'), 'reservationsTimedOut' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_timed_out'), 'reservationsCanceled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_canceled'), 'reservationsRescinded' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_rescinded'), 'splitByWaitTime' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'split_by_wait_time'), 'taskQueueSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'task_queue_sid'), 'waitDurationUntilAccepted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'wait_duration_until_accepted'), 'waitDurationUntilCanceled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'wait_duration_until_canceled'), 'waitDurationInQueueUntilAccepted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'wait_duration_in_queue_until_accepted'), 'tasksCanceled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_canceled'), 'tasksCompleted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_completed'), 'tasksDeleted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_deleted'), 'tasksEntered' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_entered'), 'tasksMoved' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_moved'), 'workspaceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'workspace_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['workspaceSid' => $workspaceSid, 'taskQueueSid' => $taskQueueSid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return TaskQueueCumulativeStatisticsContext Context for this TaskQueueCumulativeStatisticsInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueCumulativeStatisticsContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueCumulativeStatisticsContext($this->version, $this->solution['workspaceSid'], $this->solution['taskQueueSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the TaskQueueCumulativeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TaskQueueCumulativeStatisticsInstance Fetched TaskQueueCumulativeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueCumulativeStatisticsInstance
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
    public function __get(string $name)
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
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Taskrouter.V1.TaskQueueCumulativeStatisticsInstance ' . \implode(' ', $context) . ']';
    }
}
