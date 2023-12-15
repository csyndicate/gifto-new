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

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class TokenOptions
{
    /**
     * @param string $clientSecret The credential for confidential OAuth App.
     * @param string $code JWT token related to the authorization code grant type.
     * @param string $codeVerifier A code which is generation cryptographically.
     * @param string $deviceCode JWT token related to the device code grant type.
     * @param string $refreshToken JWT token related to the refresh token grant type.
     * @param string $deviceId The Id of the device associated with the token (refresh token).
     * @return CreateTokenOptions Options builder
     */
    public static function create(string $clientSecret = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $code = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $codeVerifier = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $deviceCode = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $refreshToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $deviceId = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Oauth\V1\CreateTokenOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Oauth\V1\CreateTokenOptions($clientSecret, $code, $codeVerifier, $deviceCode, $refreshToken, $deviceId);
    }
}
class CreateTokenOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $clientSecret The credential for confidential OAuth App.
     * @param string $code JWT token related to the authorization code grant type.
     * @param string $codeVerifier A code which is generation cryptographically.
     * @param string $deviceCode JWT token related to the device code grant type.
     * @param string $refreshToken JWT token related to the refresh token grant type.
     * @param string $deviceId The Id of the device associated with the token (refresh token).
     */
    public function __construct(string $clientSecret = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $code = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $codeVerifier = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $deviceCode = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $refreshToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $deviceId = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['clientSecret'] = $clientSecret;
        $this->options['code'] = $code;
        $this->options['codeVerifier'] = $codeVerifier;
        $this->options['deviceCode'] = $deviceCode;
        $this->options['refreshToken'] = $refreshToken;
        $this->options['deviceId'] = $deviceId;
    }
    /**
     * The credential for confidential OAuth App.
     *
     * @param string $clientSecret The credential for confidential OAuth App.
     * @return $this Fluent Builder
     */
    public function setClientSecret(string $clientSecret) : self
    {
        $this->options['clientSecret'] = $clientSecret;
        return $this;
    }
    /**
     * JWT token related to the authorization code grant type.
     *
     * @param string $code JWT token related to the authorization code grant type.
     * @return $this Fluent Builder
     */
    public function setCode(string $code) : self
    {
        $this->options['code'] = $code;
        return $this;
    }
    /**
     * A code which is generation cryptographically.
     *
     * @param string $codeVerifier A code which is generation cryptographically.
     * @return $this Fluent Builder
     */
    public function setCodeVerifier(string $codeVerifier) : self
    {
        $this->options['codeVerifier'] = $codeVerifier;
        return $this;
    }
    /**
     * JWT token related to the device code grant type.
     *
     * @param string $deviceCode JWT token related to the device code grant type.
     * @return $this Fluent Builder
     */
    public function setDeviceCode(string $deviceCode) : self
    {
        $this->options['deviceCode'] = $deviceCode;
        return $this;
    }
    /**
     * JWT token related to the refresh token grant type.
     *
     * @param string $refreshToken JWT token related to the refresh token grant type.
     * @return $this Fluent Builder
     */
    public function setRefreshToken(string $refreshToken) : self
    {
        $this->options['refreshToken'] = $refreshToken;
        return $this;
    }
    /**
     * The Id of the device associated with the token (refresh token).
     *
     * @param string $deviceId The Id of the device associated with the token (refresh token).
     * @return $this Fluent Builder
     */
    public function setDeviceId(string $deviceId) : self
    {
        $this->options['deviceId'] = $deviceId;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(\ShopMagicTwilioVendor\Twilio\Values::of($this->options), '', ' ');
        return '[Twilio.Oauth.V1.CreateTokenOptions ' . $options . ']';
    }
}