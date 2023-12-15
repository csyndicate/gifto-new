<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Video\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property string $friendlyName
 * @property string $awsCredentialsSid
 * @property string $awsS3Url
 * @property bool $awsStorageEnabled
 * @property string $encryptionKeySid
 * @property bool $encryptionEnabled
 * @property string $url
 */
class RecordingSettingsInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the RecordingSettingsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @return \Twilio\Rest\Video\V1\RecordingSettingsInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'awsCredentialsSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'aws_credentials_sid'), 'awsS3Url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'aws_s3_url'), 'awsStorageEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'aws_storage_enabled'), 'encryptionKeySid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'encryption_key_sid'), 'encryptionEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'encryption_enabled'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'));
        $this->solution = array();
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Video\V1\RecordingSettingsContext Context for this
     *                                                        RecordingSettingsInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\RecordingSettingsContext($this->version);
        }
        return $this->context;
    }
    /**
     * Fetch a RecordingSettingsInstance
     *
     * @return RecordingSettingsInstance Fetched RecordingSettingsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Create a new RecordingSettingsInstance
     *
     * @param string $friendlyName A string to describe the resource
     * @param array|Options $options Optional Arguments
     * @return RecordingSettingsInstance Newly created RecordingSettingsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($friendlyName, $options = array())
    {
        return $this->proxy()->create($friendlyName, $options);
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
        return '[Twilio.Video.V1.RecordingSettingsInstance ' . \implode(' ', $context) . ']';
    }
}
