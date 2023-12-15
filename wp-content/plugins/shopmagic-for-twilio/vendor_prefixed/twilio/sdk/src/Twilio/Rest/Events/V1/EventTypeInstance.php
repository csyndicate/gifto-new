<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Events
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Events\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $type
 * @property string|null $schemaId
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $description
 * @property string|null $url
 * @property array|null $links
 */
class EventTypeInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the EventTypeInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $type A string that uniquely identifies this Event Type.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $type = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['type' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'type'), 'schemaId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'schema_id'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'description' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'description'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['type' => $type ?: $this->properties['type']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return EventTypeContext Context for this EventTypeInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Events\V1\EventTypeContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Events\V1\EventTypeContext($this->version, $this->solution['type']);
        }
        return $this->context;
    }
    /**
     * Fetch the EventTypeInstance
     *
     * @return EventTypeInstance Fetched EventTypeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Events\V1\EventTypeInstance
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
        return '[Twilio.Events.V1.EventTypeInstance ' . \implode(' ', $context) . ']';
    }
}