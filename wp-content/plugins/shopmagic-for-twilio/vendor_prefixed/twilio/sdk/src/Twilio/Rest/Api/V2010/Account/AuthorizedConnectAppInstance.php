<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $accountSid
 * @property string|null $connectAppCompanyName
 * @property string|null $connectAppDescription
 * @property string|null $connectAppFriendlyName
 * @property string|null $connectAppHomepageUrl
 * @property string|null $connectAppSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string[]|null $permissions
 * @property string|null $uri
 */
class AuthorizedConnectAppInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the AuthorizedConnectAppInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the AuthorizedConnectApp resource to fetch.
     * @param string $connectAppSid The SID of the Connect App to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $accountSid, string $connectAppSid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'connectAppCompanyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_company_name'), 'connectAppDescription' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_description'), 'connectAppFriendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_friendly_name'), 'connectAppHomepageUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_homepage_url'), 'connectAppSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'connect_app_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'permissions' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'permissions'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri')];
        $this->solution = ['accountSid' => $accountSid, 'connectAppSid' => $connectAppSid ?: $this->properties['connectAppSid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return AuthorizedConnectAppContext Context for this AuthorizedConnectAppInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext($this->version, $this->solution['accountSid'], $this->solution['connectAppSid']);
        }
        return $this->context;
    }
    /**
     * Fetch the AuthorizedConnectAppInstance
     *
     * @return AuthorizedConnectAppInstance Fetched AuthorizedConnectAppInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppInstance
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
        return '[Twilio.Api.V2010.AuthorizedConnectAppInstance ' . \implode(' ', $context) . ']';
    }
}
