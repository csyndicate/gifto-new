<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class WorkersStatisticsContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the WorkersStatisticsContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the Worker to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid);
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Workers/Statistics';
    }
    /**
     * Fetch a WorkersStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkersStatisticsInstance Fetched WorkersStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('Minutes' => $options['minutes'], 'StartDate' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['startDate']), 'EndDate' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['endDate']), 'TaskQueueSid' => $options['taskQueueSid'], 'TaskQueueName' => $options['taskQueueName'], 'FriendlyName' => $options['friendlyName'], 'TaskChannel' => $options['taskChannel']));
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsInstance($this->version, $payload, $this->solution['workspaceSid']);
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
        return '[Twilio.Taskrouter.V1.WorkersStatisticsContext ' . \implode(' ', $context) . ']';
    }
}
