<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Autopilot
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class QueryContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the QueryContext
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The SID of the [Assistant](https://www.twilio.com/docs/autopilot/api/assistant) that is the parent of the new resource.
     * @param string $sid The Twilio-provided string that uniquely identifies the Query resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $assistantSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['assistantSid' => $assistantSid, 'sid' => $sid];
        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/Queries/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the QueryInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the QueryInstance
     *
     * @return QueryInstance Fetched QueryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\QueryInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\QueryInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['sid']);
    }
    /**
     * Update the QueryInstance
     *
     * @param array|Options $options Optional Arguments
     * @return QueryInstance Updated QueryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\QueryInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['SampleSid' => $options['sampleSid'], 'Status' => $options['status']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\QueryInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['sid']);
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
        return '[Twilio.Autopilot.V1.QueryContext ' . \implode(' ', $context) . ']';
    }
}
