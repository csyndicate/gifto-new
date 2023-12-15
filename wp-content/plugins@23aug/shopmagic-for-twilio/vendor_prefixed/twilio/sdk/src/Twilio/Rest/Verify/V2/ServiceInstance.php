<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Verify\V2;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $sid
 * @property string $accountSid
 * @property string $friendlyName
 * @property int $codeLength
 * @property bool $lookupEnabled
 * @property bool $psd2Enabled
 * @property bool $skipSmsToLandlines
 * @property bool $dtmfInputRequired
 * @property string $ttsName
 * @property bool $doNotShareWarningEnabled
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class ServiceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_verifications = null;
    protected $_verificationChecks = null;
    protected $_rateLimits = null;
    protected $_messagingConfigurations = null;
    /**
     * Initialize the ServiceInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Verify\V2\ServiceInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'codeLength' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'code_length'), 'lookupEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'lookup_enabled'), 'psd2Enabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'psd2_enabled'), 'skipSmsToLandlines' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'skip_sms_to_landlines'), 'dtmfInputRequired' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'dtmf_input_required'), 'ttsName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'tts_name'), 'doNotShareWarningEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'do_not_share_warning_enabled'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'));
        $this->solution = array('sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Verify\V2\ServiceContext Context for this
     *                                               ServiceInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\ServiceContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Deletes the ServiceInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the verifications
     *
     * @return \Twilio\Rest\Verify\V2\Service\VerificationList
     */
    protected function getVerifications()
    {
        return $this->proxy()->verifications;
    }
    /**
     * Access the verificationChecks
     *
     * @return \Twilio\Rest\Verify\V2\Service\VerificationCheckList
     */
    protected function getVerificationChecks()
    {
        return $this->proxy()->verificationChecks;
    }
    /**
     * Access the rateLimits
     *
     * @return \Twilio\Rest\Verify\V2\Service\RateLimitList
     */
    protected function getRateLimits()
    {
        return $this->proxy()->rateLimits;
    }
    /**
     * Access the messagingConfigurations
     *
     * @return \Twilio\Rest\Verify\V2\Service\MessagingConfigurationList
     */
    protected function getMessagingConfigurations()
    {
        return $this->proxy()->messagingConfigurations;
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
        return '[Twilio.Verify.V2.ServiceInstance ' . \implode(' ', $context) . ']';
    }
}
