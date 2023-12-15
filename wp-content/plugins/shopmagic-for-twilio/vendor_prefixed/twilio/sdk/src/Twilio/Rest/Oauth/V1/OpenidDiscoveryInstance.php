<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Oauth
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Oauth\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $issuer
 * @property string|null $authorizationEndpoint
 * @property string|null $deviceAuthorizationEndpoint
 * @property string|null $tokenEndpoint
 * @property string|null $userinfoEndpoint
 * @property string|null $revocationEndpoint
 * @property string|null $jwkUri
 * @property string[]|null $responseTypeSupported
 * @property string[]|null $subjectTypeSupported
 * @property string[]|null $idTokenSigningAlgValuesSupported
 * @property string[]|null $scopesSupported
 * @property string[]|null $claimsSupported
 * @property string|null $url
 */
class OpenidDiscoveryInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the OpenidDiscoveryInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['issuer' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'issuer'), 'authorizationEndpoint' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'authorization_endpoint'), 'deviceAuthorizationEndpoint' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'device_authorization_endpoint'), 'tokenEndpoint' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'token_endpoint'), 'userinfoEndpoint' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'userinfo_endpoint'), 'revocationEndpoint' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'revocation_endpoint'), 'jwkUri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'jwk_uri'), 'responseTypeSupported' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'response_type_supported'), 'subjectTypeSupported' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'subject_type_supported'), 'idTokenSigningAlgValuesSupported' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'id_token_signing_alg_values_supported'), 'scopesSupported' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'scopes_supported'), 'claimsSupported' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'claims_supported'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = [];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return OpenidDiscoveryContext Context for this OpenidDiscoveryInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Oauth\V1\OpenidDiscoveryContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Oauth\V1\OpenidDiscoveryContext($this->version);
        }
        return $this->context;
    }
    /**
     * Fetch the OpenidDiscoveryInstance
     *
     * @return OpenidDiscoveryInstance Fetched OpenidDiscoveryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Oauth\V1\OpenidDiscoveryInstance
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
        return '[Twilio.Oauth.V1.OpenidDiscoveryInstance ' . \implode(' ', $context) . ']';
    }
}
