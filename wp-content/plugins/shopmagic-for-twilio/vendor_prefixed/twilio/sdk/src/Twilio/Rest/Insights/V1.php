<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Insights
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Insights;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallList;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallSummariesList;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceList;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomList;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\SettingList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property CallList $calls
 * @property CallSummariesList $callSummaries
 * @property ConferenceList $conferences
 * @property RoomList $rooms
 * @property SettingList $settings
 * @method \Twilio\Rest\Insights\V1\CallContext calls(string $sid)
 * @method \Twilio\Rest\Insights\V1\ConferenceContext conferences(string $conferenceSid)
 * @method \Twilio\Rest\Insights\V1\RoomContext rooms(string $roomSid)
 */
class V1 extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_calls;
    protected $_callSummaries;
    protected $_conferences;
    protected $_rooms;
    protected $_settings;
    /**
     * Construct the V1 version of Insights
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    protected function getCalls() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallList
    {
        if (!$this->_calls) {
            $this->_calls = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallList($this);
        }
        return $this->_calls;
    }
    protected function getCallSummaries() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallSummariesList
    {
        if (!$this->_callSummaries) {
            $this->_callSummaries = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallSummariesList($this);
        }
        return $this->_callSummaries;
    }
    protected function getConferences() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceList
    {
        if (!$this->_conferences) {
            $this->_conferences = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceList($this);
        }
        return $this->_conferences;
    }
    protected function getRooms() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomList
    {
        if (!$this->_rooms) {
            $this->_rooms = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomList($this);
        }
        return $this->_rooms;
    }
    protected function getSettings() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\SettingList
    {
        if (!$this->_settings) {
            $this->_settings = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\SettingList($this);
        }
        return $this->_settings;
    }
    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown resource ' . $name);
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
        return '[Twilio.Insights.V1]';
    }
}
