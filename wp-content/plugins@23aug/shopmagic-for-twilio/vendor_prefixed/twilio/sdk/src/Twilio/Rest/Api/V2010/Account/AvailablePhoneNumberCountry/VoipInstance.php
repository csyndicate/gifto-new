<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $friendlyName
 * @property string $phoneNumber
 * @property string $lata
 * @property string $locality
 * @property string $rateCenter
 * @property string $latitude
 * @property string $longitude
 * @property string $region
 * @property string $postalCode
 * @property string $isoCountry
 * @property string $addressRequirements
 * @property bool $beta
 * @property string $capabilities
 */
class VoipInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the VoipInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The account_sid
     * @param string $countryCode The ISO-3166-1 country code of the country.
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\VoipInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $accountSid, $countryCode)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'phoneNumber' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'phone_number'), 'lata' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'lata'), 'locality' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'locality'), 'rateCenter' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'rate_center'), 'latitude' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'latitude'), 'longitude' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'longitude'), 'region' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'region'), 'postalCode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'postal_code'), 'isoCountry' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'iso_country'), 'addressRequirements' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'address_requirements'), 'beta' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'beta'), 'capabilities' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'capabilities'));
        $this->solution = array('accountSid' => $accountSid, 'countryCode' => $countryCode);
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
        return '[Twilio.Api.V2010.VoipInstance]';
    }
}
