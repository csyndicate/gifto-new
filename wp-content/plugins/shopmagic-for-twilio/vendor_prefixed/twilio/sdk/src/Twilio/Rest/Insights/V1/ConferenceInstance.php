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
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Conference\ConferenceParticipantList;
/**
 * @property string|null $conferenceSid
 * @property string|null $accountSid
 * @property string|null $friendlyName
 * @property \DateTime|null $createTime
 * @property \DateTime|null $startTime
 * @property \DateTime|null $endTime
 * @property int|null $durationSeconds
 * @property int|null $connectDurationSeconds
 * @property string $status
 * @property int|null $maxParticipants
 * @property int|null $maxConcurrentParticipants
 * @property int|null $uniqueParticipants
 * @property string $endReason
 * @property string|null $endedBy
 * @property string $mixerRegion
 * @property string $mixerRegionRequested
 * @property bool|null $recordingEnabled
 * @property array|null $detectedIssues
 * @property string[]|null $tags
 * @property array|null $tagInfo
 * @property string $processingState
 * @property string|null $url
 * @property array|null $links
 */
class ConferenceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_conferenceParticipants;
    /**
     * Initialize the ConferenceInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $conferenceSid The unique SID identifier of the Conference.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $conferenceSid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['conferenceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'conference_sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'createTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'create_time')), 'startTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'start_time')), 'endTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_time')), 'durationSeconds' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'duration_seconds'), 'connectDurationSeconds' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_duration_seconds'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'maxParticipants' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'max_participants'), 'maxConcurrentParticipants' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'max_concurrent_participants'), 'uniqueParticipants' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_participants'), 'endReason' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_reason'), 'endedBy' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'ended_by'), 'mixerRegion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'mixer_region'), 'mixerRegionRequested' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'mixer_region_requested'), 'recordingEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'recording_enabled'), 'detectedIssues' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'detected_issues'), 'tags' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tags'), 'tagInfo' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tag_info'), 'processingState' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'processing_state'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['conferenceSid' => $conferenceSid ?: $this->properties['conferenceSid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ConferenceContext Context for this ConferenceInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceContext($this->version, $this->solution['conferenceSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the ConferenceInstance
     *
     * @return ConferenceInstance Fetched ConferenceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Access the conferenceParticipants
     */
    protected function getConferenceParticipants() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\Conference\ConferenceParticipantList
    {
        return $this->proxy()->conferenceParticipants;
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
        return '[Twilio.Insights.V1.ConferenceInstance ' . \implode(' ', $context) . ']';
    }
}