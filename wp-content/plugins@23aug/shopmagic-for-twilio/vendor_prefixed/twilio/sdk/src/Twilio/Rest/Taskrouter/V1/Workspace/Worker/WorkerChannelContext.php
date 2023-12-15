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
class WorkerChannelContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the WorkerChannelContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the WorkerChannel
     *                             to fetch
     * @param string $workerSid The SID of the Worker with the WorkerChannel to
     *                          fetch
     * @param string $sid The SID of the to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid, $workerSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'workerSid' => $workerSid, 'sid' => $sid);
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Workers/' . \rawurlencode($workerSid) . '/Channels/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a WorkerChannelInstance
     *
     * @return WorkerChannelInstance Fetched WorkerChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['workerSid'], $this->solution['sid']);
    }
    /**
     * Update the WorkerChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkerChannelInstance Updated WorkerChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Capacity' => $options['capacity'], 'Available' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['available'])));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['workerSid'], $this->solution['sid']);
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
        return '[Twilio.Taskrouter.V1.WorkerChannelContext ' . \implode(' ', $context) . ']';
    }
}
