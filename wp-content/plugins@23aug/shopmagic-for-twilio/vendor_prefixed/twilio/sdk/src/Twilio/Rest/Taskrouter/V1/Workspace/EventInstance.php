<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $actorSid
 * @property string $actorType
 * @property string $actorUrl
 * @property string $description
 * @property array $eventData
 * @property \DateTime $eventDate
 * @property string $eventDateMs
 * @property string $eventType
 * @property string $resourceSid
 * @property string $resourceType
 * @property string $resourceUrl
 * @property string $sid
 * @property string $source
 * @property string $sourceIpAddress
 * @property string $url
 * @property string $workspaceSid
 */
class EventInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the EventInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the Event
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\EventInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $workspaceSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'actorSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'actor_sid'), 'actorType' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'actor_type'), 'actorUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'actor_url'), 'description' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'description'), 'eventData' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'event_data'), 'eventDate' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'event_date')), 'eventDateMs' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'event_date_ms'), 'eventType' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'event_type'), 'resourceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'resource_sid'), 'resourceType' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'resource_type'), 'resourceUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'resource_url'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'source' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'source'), 'sourceIpAddress' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'source_ip_address'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'workspaceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'workspace_sid'));
        $this->solution = array('workspaceSid' => $workspaceSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\EventContext Context for this
     *                                                           EventInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\EventContext($this->version, $this->solution['workspaceSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a EventInstance
     *
     * @return EventInstance Fetched EventInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
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
        return '[Twilio.Taskrouter.V1.EventInstance ' . \implode(' ', $context) . ']';
    }
}
