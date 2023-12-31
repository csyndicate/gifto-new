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
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class EventTypeContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the EventTypeContext
     *
     * @param Version $version Version that contains the resource
     * @param string $type A string that uniquely identifies this Event Type.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $type)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['type' => $type];
        $this->uri = '/Types/' . \rawurlencode($type) . '';
    }
    /**
     * Fetch the EventTypeInstance
     *
     * @return EventTypeInstance Fetched EventTypeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Events\V1\EventTypeInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Events\V1\EventTypeInstance($this->version, $payload, $this->solution['type']);
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
        return '[Twilio.Events.V1.EventTypeContext ' . \implode(' ', $context) . ']';
    }
}
