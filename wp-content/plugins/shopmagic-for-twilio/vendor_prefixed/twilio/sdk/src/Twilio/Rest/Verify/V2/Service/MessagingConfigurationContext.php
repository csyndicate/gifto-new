<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Verify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class MessagingConfigurationContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the MessagingConfigurationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the [Service](https://www.twilio.com/docs/verify/api/service) that the resource is associated with.
     * @param string $country The [ISO-3166-1](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code of the country this configuration will be applied to. If this is a global configuration, Country will take the value `all`.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $country)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'country' => $country];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/MessagingConfigurations/' . \rawurlencode($country) . '';
    }
    /**
     * Delete the MessagingConfigurationInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the MessagingConfigurationInstance
     *
     * @return MessagingConfigurationInstance Fetched MessagingConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\MessagingConfigurationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\MessagingConfigurationInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['country']);
    }
    /**
     * Update the MessagingConfigurationInstance
     *
     * @param string $messagingServiceSid The SID of the [Messaging Service](https://www.twilio.com/docs/messaging/api/service-resource) to be used to send SMS to the country of this configuration.
     * @return MessagingConfigurationInstance Updated MessagingConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $messagingServiceSid) : \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\MessagingConfigurationInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['MessagingServiceSid' => $messagingServiceSid]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\MessagingConfigurationInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['country']);
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
        return '[Twilio.Verify.V2.MessagingConfigurationContext ' . \implode(' ', $context) . ']';
    }
}
