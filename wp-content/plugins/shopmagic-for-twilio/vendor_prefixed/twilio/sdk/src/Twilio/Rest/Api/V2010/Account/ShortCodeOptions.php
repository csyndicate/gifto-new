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

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class ShortCodeOptions
{
    /**
     * @param string $friendlyName The string that identifies the ShortCode resources to read.
     * @param string $shortCode Only show the ShortCode resources that match this pattern. You can specify partial numbers and use '*' as a wildcard for any digit.
     * @return ReadShortCodeOptions Options builder
     */
    public static function read(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $shortCode = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ReadShortCodeOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ReadShortCodeOptions($friendlyName, $shortCode);
    }
    /**
     * @param string $friendlyName A descriptive string that you created to describe this resource. It can be up to 64 characters long. By default, the `FriendlyName` is the short code.
     * @param string $apiVersion The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`.
     * @param string $smsUrl The URL we should call when receiving an incoming SMS message to this short code.
     * @param string $smsMethod The HTTP method we should use when calling the `sms_url`. Can be: `GET` or `POST`.
     * @param string $smsFallbackUrl The URL that we should call if an error occurs while retrieving or executing the TwiML from `sms_url`.
     * @param string $smsFallbackMethod The HTTP method that we should use to call the `sms_fallback_url`. Can be: `GET` or `POST`.
     * @return UpdateShortCodeOptions Options builder
     */
    public static function update(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $apiVersion = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\UpdateShortCodeOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\UpdateShortCodeOptions($friendlyName, $apiVersion, $smsUrl, $smsMethod, $smsFallbackUrl, $smsFallbackMethod);
    }
}
class ReadShortCodeOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName The string that identifies the ShortCode resources to read.
     * @param string $shortCode Only show the ShortCode resources that match this pattern. You can specify partial numbers and use '*' as a wildcard for any digit.
     */
    public function __construct(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $shortCode = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['shortCode'] = $shortCode;
    }
    /**
     * The string that identifies the ShortCode resources to read.
     *
     * @param string $friendlyName The string that identifies the ShortCode resources to read.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * Only show the ShortCode resources that match this pattern. You can specify partial numbers and use '*' as a wildcard for any digit.
     *
     * @param string $shortCode Only show the ShortCode resources that match this pattern. You can specify partial numbers and use '*' as a wildcard for any digit.
     * @return $this Fluent Builder
     */
    public function setShortCode(string $shortCode) : self
    {
        $this->options['shortCode'] = $shortCode;
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
        return '[Twilio.Api.V2010.ReadShortCodeOptions ' . $options . ']';
    }
}
class UpdateShortCodeOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName A descriptive string that you created to describe this resource. It can be up to 64 characters long. By default, the `FriendlyName` is the short code.
     * @param string $apiVersion The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`.
     * @param string $smsUrl The URL we should call when receiving an incoming SMS message to this short code.
     * @param string $smsMethod The HTTP method we should use when calling the `sms_url`. Can be: `GET` or `POST`.
     * @param string $smsFallbackUrl The URL that we should call if an error occurs while retrieving or executing the TwiML from `sms_url`.
     * @param string $smsFallbackMethod The HTTP method that we should use to call the `sms_fallback_url`. Can be: `GET` or `POST`.
     */
    public function __construct(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $apiVersion = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['apiVersion'] = $apiVersion;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
    }
    /**
     * A descriptive string that you created to describe this resource. It can be up to 64 characters long. By default, the `FriendlyName` is the short code.
     *
     * @param string $friendlyName A descriptive string that you created to describe this resource. It can be up to 64 characters long. By default, the `FriendlyName` is the short code.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`.
     *
     * @param string $apiVersion The API version to use to start a new TwiML session. Can be: `2010-04-01` or `2008-08-01`.
     * @return $this Fluent Builder
     */
    public function setApiVersion(string $apiVersion) : self
    {
        $this->options['apiVersion'] = $apiVersion;
        return $this;
    }
    /**
     * The URL we should call when receiving an incoming SMS message to this short code.
     *
     * @param string $smsUrl The URL we should call when receiving an incoming SMS message to this short code.
     * @return $this Fluent Builder
     */
    public function setSmsUrl(string $smsUrl) : self
    {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }
    /**
     * The HTTP method we should use when calling the `sms_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsMethod The HTTP method we should use when calling the `sms_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setSmsMethod(string $smsMethod) : self
    {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }
    /**
     * The URL that we should call if an error occurs while retrieving or executing the TwiML from `sms_url`.
     *
     * @param string $smsFallbackUrl The URL that we should call if an error occurs while retrieving or executing the TwiML from `sms_url`.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl(string $smsFallbackUrl) : self
    {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }
    /**
     * The HTTP method that we should use to call the `sms_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $smsFallbackMethod The HTTP method that we should use to call the `sms_fallback_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod(string $smsFallbackMethod) : self
    {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
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
        return '[Twilio.Api.V2010.UpdateShortCodeOptions ' . $options . ']';
    }
}
