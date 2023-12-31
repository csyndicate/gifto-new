<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Pricing
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Pricing\V2;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class NumberContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the NumberContext
     *
     * @param Version $version Version that contains the resource
     * @param string $destinationNumber The destination phone number, in [E.164](https://www.twilio.com/docs/glossary/what-e164) format, for which to fetch the origin-based voice pricing information. E.164 format consists of a + followed by the country code and subscriber number.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $destinationNumber)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['destinationNumber' => $destinationNumber];
        $this->uri = '/Trunking/Numbers/' . \rawurlencode($destinationNumber) . '';
    }
    /**
     * Fetch the NumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return NumberInstance Fetched NumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Pricing\V2\NumberInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['OriginationNumber' => $options['originationNumber']]);
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Pricing\V2\NumberInstance($this->version, $payload, $this->solution['destinationNumber']);
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
        return '[Twilio.Pricing.V2.NumberContext ' . \implode(' ', $context) . ']';
    }
}
