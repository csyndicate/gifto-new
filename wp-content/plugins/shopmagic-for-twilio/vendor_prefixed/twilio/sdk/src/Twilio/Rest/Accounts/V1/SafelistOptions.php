<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Accounts
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class SafelistOptions
{
    /**
     * @param string $phoneNumber The phone number to be removed from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     * @return DeleteSafelistOptions Options builder
     */
    public static function delete(string $phoneNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\DeleteSafelistOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\DeleteSafelistOptions($phoneNumber);
    }
    /**
     * @param string $phoneNumber The phone number to be fetched from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     * @return FetchSafelistOptions Options builder
     */
    public static function fetch(string $phoneNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\FetchSafelistOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\FetchSafelistOptions($phoneNumber);
    }
}
class DeleteSafelistOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $phoneNumber The phone number to be removed from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     */
    public function __construct(string $phoneNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['phoneNumber'] = $phoneNumber;
    }
    /**
     * The phone number to be removed from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     *
     * @param string $phoneNumber The phone number to be removed from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     * @return $this Fluent Builder
     */
    public function setPhoneNumber(string $phoneNumber) : self
    {
        $this->options['phoneNumber'] = $phoneNumber;
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
        return '[Twilio.Accounts.V1.DeleteSafelistOptions ' . $options . ']';
    }
}
class FetchSafelistOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $phoneNumber The phone number to be fetched from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     */
    public function __construct(string $phoneNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['phoneNumber'] = $phoneNumber;
    }
    /**
     * The phone number to be fetched from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     *
     * @param string $phoneNumber The phone number to be fetched from SafeList. Phone numbers must be in [E.164 format](https://www.twilio.com/docs/glossary/what-e164).
     * @return $this Fluent Builder
     */
    public function setPhoneNumber(string $phoneNumber) : self
    {
        $this->options['phoneNumber'] = $phoneNumber;
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
        return '[Twilio.Accounts.V1.FetchSafelistOptions ' . $options . ']';
    }
}