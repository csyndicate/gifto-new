<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Recording\AddOnResultList;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Recording\TranscriptionList;
/**
 * @property AddOnResultList $addOnResults
 * @property TranscriptionList $transcriptions
 * @method \Twilio\Rest\Api\V2010\Account\Recording\AddOnResultContext addOnResults(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\Recording\TranscriptionContext transcriptions(string $sid)
 */
class RecordingContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_addOnResults;
    protected $_transcriptions;
    /**
     * Initialize the RecordingContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the Recording resources to delete.
     * @param string $sid The Twilio-provided string that uniquely identifies the Recording resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Recordings/' . \rawurlencode($sid) . '.json';
    }
    /**
     * Delete the RecordingInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the RecordingInstance
     *
     * @param array|Options $options Optional Arguments
     * @return RecordingInstance Fetched RecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\RecordingInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['IncludeSoftDeleted' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['includeSoftDeleted'])]);
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\RecordingInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['sid']);
    }
    /**
     * Access the addOnResults
     */
    protected function getAddOnResults() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Recording\AddOnResultList
    {
        if (!$this->_addOnResults) {
            $this->_addOnResults = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Recording\AddOnResultList($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->_addOnResults;
    }
    /**
     * Access the transcriptions
     */
    protected function getTranscriptions() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Recording\TranscriptionList
    {
        if (!$this->_transcriptions) {
            $this->_transcriptions = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Recording\TranscriptionList($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->_transcriptions;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name) : \ShopMagicTwilioVendor\Twilio\ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown subresource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : \ShopMagicTwilioVendor\Twilio\InstanceContext
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Resource does not have a context');
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
        return '[Twilio.Api.V2010.RecordingContext ' . \implode(' ', $context) . ']';
    }
}
