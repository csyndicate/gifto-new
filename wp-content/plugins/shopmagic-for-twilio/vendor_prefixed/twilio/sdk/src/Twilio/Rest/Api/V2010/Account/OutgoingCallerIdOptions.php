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
abstract class OutgoingCallerIdOptions
{
    /**
     * @param string $phoneNumber The phone number of the OutgoingCallerId resources to read.
     * @param string $friendlyName The string that identifies the OutgoingCallerId resources to read.
     * @return ReadOutgoingCallerIdOptions Options builder
     */
    public static function read(string $phoneNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ReadOutgoingCallerIdOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ReadOutgoingCallerIdOptions($phoneNumber, $friendlyName);
    }
    /**
     * @param string $friendlyName A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     * @return UpdateOutgoingCallerIdOptions Options builder
     */
    public static function update(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\UpdateOutgoingCallerIdOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\UpdateOutgoingCallerIdOptions($friendlyName);
    }
}
class ReadOutgoingCallerIdOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $phoneNumber The phone number of the OutgoingCallerId resources to read.
     * @param string $friendlyName The string that identifies the OutgoingCallerId resources to read.
     */
    public function __construct(string $phoneNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['phoneNumber'] = $phoneNumber;
        $this->options['friendlyName'] = $friendlyName;
    }
    /**
     * The phone number of the OutgoingCallerId resources to read.
     *
     * @param string $phoneNumber The phone number of the OutgoingCallerId resources to read.
     * @return $this Fluent Builder
     */
    public function setPhoneNumber(string $phoneNumber) : self
    {
        $this->options['phoneNumber'] = $phoneNumber;
        return $this;
    }
    /**
     * The string that identifies the OutgoingCallerId resources to read.
     *
     * @param string $friendlyName The string that identifies the OutgoingCallerId resources to read.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.ReadOutgoingCallerIdOptions ' . $options . ']';
    }
}
class UpdateOutgoingCallerIdOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     */
    public function __construct(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
    }
    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Api.V2010.UpdateOutgoingCallerIdOptions ' . $options . ']';
    }
}