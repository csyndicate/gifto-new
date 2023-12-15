<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Media
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Media\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamer\PlaybackGrantList;
/**
 * @property string|null $accountSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property bool|null $video
 * @property array|null $links
 * @property string|null $sid
 * @property string $status
 * @property string|null $url
 * @property string|null $statusCallback
 * @property string|null $statusCallbackMethod
 * @property string $endedReason
 * @property int|null $maxDuration
 */
class PlayerStreamerInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_playbackGrant;
    /**
     * Initialize the PlayerStreamerInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the PlayerStreamer resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'video' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'video'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'statusCallback' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback'), 'statusCallbackMethod' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback_method'), 'endedReason' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'ended_reason'), 'maxDuration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'max_duration')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return PlayerStreamerContext Context for this PlayerStreamerInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the PlayerStreamerInstance
     *
     * @return PlayerStreamerInstance Fetched PlayerStreamerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the PlayerStreamerInstance
     *
     * @param string $status
     * @return PlayerStreamerInstance Updated PlayerStreamerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status) : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerInstance
    {
        return $this->proxy()->update($status);
    }
    /**
     * Access the playbackGrant
     */
    protected function getPlaybackGrant() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamer\PlaybackGrantList
    {
        return $this->proxy()->playbackGrant;
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
        return '[Twilio.Media.V1.PlayerStreamerInstance ' . \implode(' ', $context) . ']';
    }
}
