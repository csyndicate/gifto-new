<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class TaskQueueCumulativeStatisticsContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the TaskQueueCumulativeStatisticsContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the TaskQueue to
     *                             fetch
     * @param string $taskQueueSid The SID of the TaskQueue for which to fetch
     *                             statistics
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueCumulativeStatisticsContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid, $taskQueueSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'taskQueueSid' => $taskQueueSid);
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/TaskQueues/' . \rawurlencode($taskQueueSid) . '/CumulativeStatistics';
    }
    /**
     * Fetch a TaskQueueCumulativeStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TaskQueueCumulativeStatisticsInstance Fetched
     *                                               TaskQueueCumulativeStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('EndDate' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['endDate']), 'Minutes' => $options['minutes'], 'StartDate' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['startDate']), 'TaskChannel' => $options['taskChannel'], 'SplitByWaitTime' => $options['splitByWaitTime']));
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueCumulativeStatisticsInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['taskQueueSid']);
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
        return '[Twilio.Taskrouter.V1.TaskQueueCumulativeStatisticsContext ' . \implode(' ', $context) . ']';
    }
}
