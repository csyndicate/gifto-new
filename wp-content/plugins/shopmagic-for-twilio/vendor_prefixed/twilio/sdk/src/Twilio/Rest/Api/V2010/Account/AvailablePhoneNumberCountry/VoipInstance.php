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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Base\PhoneNumberCapabilities;
/**
 * @property string|null $friendlyName
 * @property string|null $phoneNumber
 * @property string|null $lata
 * @property string|null $locality
 * @property string|null $rateCenter
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $region
 * @property string|null $postalCode
 * @property string|null $isoCountry
 * @property string|null $addressRequirements
 * @property bool|null $beta
 * @property PhoneNumberCapabilities|null $capabilities
 */
class VoipInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the VoipInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) requesting the AvailablePhoneNumber resources.
     * @param string $countryCode The [ISO-3166-1](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code of the country from which to read phone numbers.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $accountSid, string $countryCode)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'phoneNumber' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'phone_number'), 'lata' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'lata'), 'locality' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'locality'), 'rateCenter' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'rate_center'), 'latitude' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'latitude'), 'longitude' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'longitude'), 'region' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'region'), 'postalCode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'postal_code'), 'isoCountry' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'iso_country'), 'addressRequirements' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'address_requirements'), 'beta' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'beta'), 'capabilities' => \ShopMagicTwilioVendor\Twilio\Deserialize::phoneNumberCapabilities(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'capabilities'))];
        $this->solution = ['accountSid' => $accountSid, 'countryCode' => $countryCode];
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
        return '[Twilio.Api.V2010.VoipInstance]';
    }
}
