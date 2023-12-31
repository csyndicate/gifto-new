<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Video
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Video\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\RecordingRulesList;
use ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\ParticipantList;
use ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\RoomRecordingList;
/**
 * @property string|null $sid
 * @property string $status
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $accountSid
 * @property bool|null $enableTurn
 * @property string|null $uniqueName
 * @property string|null $statusCallback
 * @property string|null $statusCallbackMethod
 * @property \DateTime|null $endTime
 * @property int|null $duration
 * @property string $type
 * @property int|null $maxParticipants
 * @property int|null $maxParticipantDuration
 * @property int|null $maxConcurrentPublishedTracks
 * @property bool|null $recordParticipantsOnConnect
 * @property string[]|null $videoCodecs
 * @property string|null $mediaRegion
 * @property bool|null $audioOnly
 * @property int|null $emptyRoomTimeout
 * @property int|null $unusedRoomTimeout
 * @property bool|null $largeRoom
 * @property string|null $url
 * @property array|null $links
 */
class RoomInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_recordingRules;
    protected $_participants;
    protected $_recordings;
    /**
     * Initialize the RoomInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the Room resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'enableTurn' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'enable_turn'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'statusCallback' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback'), 'statusCallbackMethod' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback_method'), 'endTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_time')), 'duration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'duration'), 'type' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'type'), 'maxParticipants' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'max_participants'), 'maxParticipantDuration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'max_participant_duration'), 'maxConcurrentPublishedTracks' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'max_concurrent_published_tracks'), 'recordParticipantsOnConnect' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'record_participants_on_connect'), 'videoCodecs' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'video_codecs'), 'mediaRegion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'media_region'), 'audioOnly' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'audio_only'), 'emptyRoomTimeout' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'empty_room_timeout'), 'unusedRoomTimeout' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unused_room_timeout'), 'largeRoom' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'large_room'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return RoomContext Context for this RoomInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\RoomContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\RoomContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the RoomInstance
     *
     * @return RoomInstance Fetched RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\RoomInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the RoomInstance
     *
     * @param string $status
     * @return RoomInstance Updated RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status) : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\RoomInstance
    {
        return $this->proxy()->update($status);
    }
    /**
     * Access the recordingRules
     */
    protected function getRecordingRules() : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\RecordingRulesList
    {
        return $this->proxy()->recordingRules;
    }
    /**
     * Access the participants
     */
    protected function getParticipants() : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\ParticipantList
    {
        return $this->proxy()->participants;
    }
    /**
     * Access the recordings
     */
    protected function getRecordings() : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\RoomRecordingList
    {
        return $this->proxy()->recordings;
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
        return '[Twilio.Video.V1.RoomInstance ' . \implode(' ', $context) . ']';
    }
}
