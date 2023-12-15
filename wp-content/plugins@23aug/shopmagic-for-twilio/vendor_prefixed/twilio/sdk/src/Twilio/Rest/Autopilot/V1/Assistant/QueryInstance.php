<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property array $results
 * @property string $language
 * @property string $modelBuildSid
 * @property string $query
 * @property string $sampleSid
 * @property string $assistantSid
 * @property string $sid
 * @property string $status
 * @property string $url
 * @property string $sourceChannel
 * @property string $dialogueSid
 */
class QueryInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the QueryInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the resource
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Autopilot\V1\Assistant\QueryInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $assistantSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'results' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'results'), 'language' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'language'), 'modelBuildSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'model_build_sid'), 'query' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'query'), 'sampleSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sample_sid'), 'assistantSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'assistant_sid'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'sourceChannel' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'source_channel'), 'dialogueSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'dialogue_sid'));
        $this->solution = array('assistantSid' => $assistantSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Autopilot\V1\Assistant\QueryContext Context for this
     *                                                          QueryInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\QueryContext($this->version, $this->solution['assistantSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a QueryInstance
     *
     * @return QueryInstance Fetched QueryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the QueryInstance
     *
     * @param array|Options $options Optional Arguments
     * @return QueryInstance Updated QueryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }
    /**
     * Deletes the QueryInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
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
        return '[Twilio.Autopilot.V1.QueryInstance ' . \implode(' ', $context) . ']';
    }
}
