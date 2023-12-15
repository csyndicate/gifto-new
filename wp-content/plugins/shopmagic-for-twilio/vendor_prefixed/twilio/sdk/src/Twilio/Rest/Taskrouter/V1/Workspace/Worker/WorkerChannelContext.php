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
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
class WorkerChannelContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the WorkerChannelContext
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the WorkerChannel to fetch.
     * @param string $workerSid The SID of the Worker with the WorkerChannel to fetch.
     * @param string $sid The SID of the WorkerChannel to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid, $workerSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['workspaceSid' => $workspaceSid, 'workerSid' => $workerSid, 'sid' => $sid];
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Workers/' . \rawurlencode($workerSid) . '/Channels/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the WorkerChannelInstance
     *
     * @return WorkerChannelInstance Fetched WorkerChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['workerSid'], $this->solution['sid']);
    }
    /**
     * Update the WorkerChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkerChannelInstance Updated WorkerChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Capacity' => $options['capacity'], 'Available' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['available'])]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerChannelInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['workerSid'], $this->solution['sid']);
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
        return '[Twilio.Taskrouter.V1.WorkerChannelContext ' . \implode(' ', $context) . ']';
    }
}