<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace;

use ShopMagicTwilioVendor\Twilio\Page;
class EventPage extends \ShopMagicTwilioVendor\Twilio\Page
{
    public function __construct($version, $response, $solution)
    {
        parent::__construct($version, $response);
        // Path Solution
        $this->solution = $solution;
    }
    public function buildInstance(array $payload)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\EventInstance($this->version, $payload, $this->solution['workspaceSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Taskrouter.V1.EventPage]';
    }
}
