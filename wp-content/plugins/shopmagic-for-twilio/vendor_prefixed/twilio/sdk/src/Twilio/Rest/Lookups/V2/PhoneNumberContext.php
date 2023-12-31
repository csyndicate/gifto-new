<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Lookups
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Lookups\V2;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class PhoneNumberContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the PhoneNumberContext
     *
     * @param Version $version Version that contains the resource
     * @param string $phoneNumber The phone number to lookup in E.164 or national format. Default country code is +1 (North America).
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $phoneNumber)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['phoneNumber' => $phoneNumber];
        $this->uri = '/PhoneNumbers/' . \rawurlencode($phoneNumber) . '';
    }
    /**
     * Fetch the PhoneNumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return PhoneNumberInstance Fetched PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Lookups\V2\PhoneNumberInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['Fields' => $options['fields'], 'CountryCode' => $options['countryCode'], 'FirstName' => $options['firstName'], 'LastName' => $options['lastName'], 'AddressLine1' => $options['addressLine1'], 'AddressLine2' => $options['addressLine2'], 'City' => $options['city'], 'State' => $options['state'], 'PostalCode' => $options['postalCode'], 'AddressCountryCode' => $options['addressCountryCode'], 'NationalId' => $options['nationalId'], 'DateOfBirth' => $options['dateOfBirth'], 'LastVerifiedDate' => $options['lastVerifiedDate']]);
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Lookups\V2\PhoneNumberInstance($this->version, $payload, $this->solution['phoneNumber']);
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
        return '[Twilio.Lookups.V2.PhoneNumberContext ' . \implode(' ', $context) . ']';
    }
}
