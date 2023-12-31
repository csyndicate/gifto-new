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
namespace ShopMagicTwilioVendor\Twilio\Rest\Insights\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Room\ParticipantList;
/**
 * @property ParticipantList $participants
 * @method \Twilio\Rest\Insights\V1\Room\ParticipantContext participants(string $participantSid)
 */
class RoomContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_participants;
    /**
     * Initialize the RoomContext
     *
     * @param Version $version Version that contains the resource
     * @param string $roomSid The SID of the Room resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $roomSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['roomSid' => $roomSid];
        $this->uri = '/Video/Rooms/' . \rawurlencode($roomSid) . '';
    }
    /**
     * Fetch the RoomInstance
     *
     * @return RoomInstance Fetched RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomInstance($this->version, $payload, $this->solution['roomSid']);
    }
    /**
     * Access the participants
     */
    protected function getParticipants() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Room\ParticipantList
    {
        if (!$this->_participants) {
            $this->_participants = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Room\ParticipantList($this->version, $this->solution['roomSid']);
        }
        return $this->_participants;
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
        return '[Twilio.Insights.V1.RoomContext ' . \implode(' ', $context) . ']';
    }
}
