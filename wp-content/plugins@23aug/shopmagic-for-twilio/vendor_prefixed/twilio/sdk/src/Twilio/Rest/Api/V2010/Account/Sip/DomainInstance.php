<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $apiVersion
 * @property string $authType
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $domainName
 * @property string $friendlyName
 * @property string $sid
 * @property string $uri
 * @property string $voiceFallbackMethod
 * @property string $voiceFallbackUrl
 * @property string $voiceMethod
 * @property string $voiceStatusCallbackMethod
 * @property string $voiceStatusCallbackUrl
 * @property string $voiceUrl
 * @property array $subresourceUris
 * @property bool $sipRegistration
 */
class DomainInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_ipAccessControlListMappings = null;
    protected $_credentialListMappings = null;
    protected $_auth = null;
    /**
     * Initialize the DomainInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\Sip\DomainInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $accountSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'apiVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'api_version'), 'authType' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'auth_type'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'domainName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'domain_name'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'), 'voiceFallbackMethod' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_fallback_method'), 'voiceFallbackUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_fallback_url'), 'voiceMethod' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_method'), 'voiceStatusCallbackMethod' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_status_callback_method'), 'voiceStatusCallbackUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_status_callback_url'), 'voiceUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'voice_url'), 'subresourceUris' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'subresource_uris'), 'sipRegistration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sip_registration'));
        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\Sip\DomainContext Context for this
     *                                                          DomainInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\DomainContext($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a DomainInstance
     *
     * @return DomainInstance Fetched DomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the DomainInstance
     *
     * @param array|Options $options Optional Arguments
     * @return DomainInstance Updated DomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }
    /**
     * Deletes the DomainInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Access the ipAccessControlListMappings
     *
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\IpAccessControlListMappingList
     */
    protected function getIpAccessControlListMappings()
    {
        return $this->proxy()->ipAccessControlListMappings;
    }
    /**
     * Access the credentialListMappings
     *
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\CredentialListMappingList
     */
    protected function getCredentialListMappings()
    {
        return $this->proxy()->credentialListMappings;
    }
    /**
     * Access the auth
     *
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypesList
     */
    protected function getAuth()
    {
        return $this->proxy()->auth;
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
        return '[Twilio.Api.V2010.DomainInstance ' . \implode(' ', $context) . ']';
    }
}
