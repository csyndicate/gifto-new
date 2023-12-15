<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $connectAppCompanyName
 * @property string $connectAppDescription
 * @property string $connectAppFriendlyName
 * @property string $connectAppHomepageUrl
 * @property string $connectAppSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $permissions
 * @property string $uri
 */
class AuthorizedConnectAppInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the AuthorizedConnectAppInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created the resource
     * @param string $connectAppSid The SID of the Connect App to fetch
     * @return \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $accountSid, $connectAppSid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'connectAppCompanyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_company_name'), 'connectAppDescription' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_description'), 'connectAppFriendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_friendly_name'), 'connectAppHomepageUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_homepage_url'), 'connectAppSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'permissions' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'permissions'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'));
        $this->solution = array('accountSid' => $accountSid, 'connectAppSid' => $connectAppSid ?: $this->properties['connectAppSid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext Context
     *                                                                    for this
     *                                                                    AuthorizedConnectAppInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext($this->version, $this->solution['accountSid'], $this->solution['connectAppSid']);
        }
        return $this->context;
    }
    /**
     * Fetch a AuthorizedConnectAppInstance
     *
     * @return AuthorizedConnectAppInstance Fetched AuthorizedConnectAppInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
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
        return '[Twilio.Api.V2010.AuthorizedConnectAppInstance ' . \implode(' ', $context) . ']';
    }
}
