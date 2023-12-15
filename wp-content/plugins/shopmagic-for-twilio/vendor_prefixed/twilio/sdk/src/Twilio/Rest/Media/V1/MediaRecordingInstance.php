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
/**
 * @property string|null $accountSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property int|null $duration
 * @property string $format
 * @property array|null $links
 * @property string|null $processorSid
 * @property string|null $resolution
 * @property string|null $sourceSid
 * @property string|null $sid
 * @property int|null $mediaSize
 * @property string $status
 * @property string|null $statusCallback
 * @property string|null $statusCallbackMethod
 * @property string|null $url
 */
class MediaRecordingInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the MediaRecordingInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the MediaRecording resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'duration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'duration'), 'format' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'format'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'), 'processorSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'processor_sid'), 'resolution' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'resolution'), 'sourceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'source_sid'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'mediaSize' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'media_size'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'statusCallback' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback'), 'statusCallbackMethod' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status_callback_method'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return MediaRecordingContext Context for this MediaRecordingInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaRecordingContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaRecordingContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the MediaRecordingInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the MediaRecordingInstance
     *
     * @return MediaRecordingInstance Fetched MediaRecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaRecordingInstance
    {
        return $this->proxy()->fetch();
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
        return '[Twilio.Media.V1.MediaRecordingInstance ' . \implode(' ', $context) . ']';
    }
}