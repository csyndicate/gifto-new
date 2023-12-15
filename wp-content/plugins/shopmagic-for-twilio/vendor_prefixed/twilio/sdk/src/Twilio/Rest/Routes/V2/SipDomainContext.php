<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Routes
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Routes\V2;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class SipDomainContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the SipDomainContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sipDomain 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sipDomain)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sipDomain' => $sipDomain];
        $this->uri = '/SipDomains/' . \rawurlencode($sipDomain) . '';
    }
    /**
     * Fetch the SipDomainInstance
     *
     * @return SipDomainInstance Fetched SipDomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainInstance($this->version, $payload, $this->solution['sipDomain']);
    }
    /**
     * Update the SipDomainInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SipDomainInstance Updated SipDomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['VoiceRegion' => $options['voiceRegion'], 'FriendlyName' => $options['friendlyName']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Routes\V2\SipDomainInstance($this->version, $payload, $this->solution['sipDomain']);
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
        return '[Twilio.Routes.V2.SipDomainContext ' . \implode(' ', $context) . ']';
    }
}