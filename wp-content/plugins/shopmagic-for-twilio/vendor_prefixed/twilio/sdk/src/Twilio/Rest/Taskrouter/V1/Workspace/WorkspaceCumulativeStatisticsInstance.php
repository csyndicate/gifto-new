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
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace;

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
 * @property array|null $waitDurationUntilAccepted
 * @property array|null $waitDurationUntilCanceled
 * @property int|null $tasksCanceled
 * @property int|null $tasksCompleted
 * @property int|null $tasksCreated
 * @property int|null $tasksDeleted
 * @property int|null $tasksMoved
 * @property int|null $tasksTimedOutInWorkflow
 * @property string|null $workspaceSid
 * @property string|null $url
 */
class WorkspaceCumulativeStatisticsInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the WorkspaceCumulativeStatisticsInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $workspaceSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'avgTaskAcceptanceTime' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'avg_task_acceptance_time'), 'startTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'start_time')), 'endTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_time')), 'reservationsCreated' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_created'), 'reservationsAccepted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_accepted'), 'reservationsRejected' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_rejected'), 'reservationsTimedOut' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_timed_out'), 'reservationsCanceled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_canceled'), 'reservationsRescinded' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reservations_rescinded'), 'splitByWaitTime' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'split_by_wait_time'), 'waitDurationUntilAccepted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'wait_duration_until_accepted'), 'waitDurationUntilCanceled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'wait_duration_until_canceled'), 'tasksCanceled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_canceled'), 'tasksCompleted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_completed'), 'tasksCreated' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_created'), 'tasksDeleted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_deleted'), 'tasksMoved' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_moved'), 'tasksTimedOutInWorkflow' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tasks_timed_out_in_workflow'), 'workspaceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'workspace_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['workspaceSid' => $workspaceSid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return WorkspaceCumulativeStatisticsContext Context for this WorkspaceCumulativeStatisticsInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsContext($this->version, $this->solution['workspaceSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the WorkspaceCumulativeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkspaceCumulativeStatisticsInstance Fetched WorkspaceCumulativeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\WorkspaceCumulativeStatisticsInstance
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
        return '[Twilio.Taskrouter.V1.WorkspaceCumulativeStatisticsInstance ' . \implode(' ', $context) . ']';
    }
}
