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
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Conference\ParticipantList;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Conference\RecordingList;
/**
 * @property ParticipantList $participants
 * @property RecordingList $recordings
 * @method \Twilio\Rest\Api\V2010\Account\Conference\RecordingContext recordings(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\Conference\ParticipantContext participants(string $callSid)
 */
class ConferenceContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_participants;
    protected $_recordings;
    /**
     * Initialize the ConferenceContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the Conference resource(s) to fetch.
     * @param string $sid The Twilio-provided string that uniquely identifies the Conference resource to fetch
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Conferences/' . \rawurlencode($sid) . '.json';
    }
    /**
     * Fetch the ConferenceInstance
     *
     * @return ConferenceInstance Fetched ConferenceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ConferenceInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ConferenceInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['sid']);
    }
    /**
     * Update the ConferenceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConferenceInstance Updated ConferenceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ConferenceInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Status' => $options['status'], 'AnnounceUrl' => $options['announceUrl'], 'AnnounceMethod' => $options['announceMethod']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ConferenceInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['sid']);
    }
    /**
     * Access the participants
     */
    protected function getParticipants() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Conference\ParticipantList
    {
        if (!$this->_participants) {
            $this->_participants = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Conference\ParticipantList($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->_participants;
    }
    /**
     * Access the recordings
     */
    protected function getRecordings() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Conference\RecordingList
    {
        if (!$this->_recordings) {
            $this->_recordings = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Conference\RecordingList($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->_recordings;
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
        return '[Twilio.Api.V2010.ConferenceContext ' . \implode(' ', $context) . ']';
    }
}
