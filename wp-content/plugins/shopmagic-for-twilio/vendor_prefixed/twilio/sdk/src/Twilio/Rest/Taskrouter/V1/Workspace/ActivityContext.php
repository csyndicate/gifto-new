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
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class ActivityContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the ActivityContext
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that the new Activity belongs to.
     * @param string $sid The SID of the Activity resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['workspaceSid' => $workspaceSid, 'sid' => $sid];
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Activities/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the ActivityInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the ActivityInstance
     *
     * @return ActivityInstance Fetched ActivityInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\ActivityInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\ActivityInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['sid']);
    }
    /**
     * Update the ActivityInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ActivityInstance Updated ActivityInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\ActivityInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['FriendlyName' => $options['friendlyName']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\ActivityInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['sid']);
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
        return '[Twilio.Taskrouter.V1.ActivityContext ' . \implode(' ', $context) . ']';
    }
}