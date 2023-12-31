<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Trunking
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
class RecordingContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the RecordingContext
     *
     * @param Version $version Version that contains the resource
     * @param string $trunkSid The SID of the Trunk from which to fetch the recording settings.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $trunkSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['trunkSid' => $trunkSid];
        $this->uri = '/Trunks/' . \rawurlencode($trunkSid) . '/Recording';
    }
    /**
     * Fetch the RecordingInstance
     *
     * @return RecordingInstance Fetched RecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk\RecordingInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk\RecordingInstance($this->version, $payload, $this->solution['trunkSid']);
    }
    /**
     * Update the RecordingInstance
     *
     * @param array|Options $options Optional Arguments
     * @return RecordingInstance Updated RecordingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk\RecordingInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Mode' => $options['mode'], 'Trim' => $options['trim']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Trunking\V1\Trunk\RecordingInstance($this->version, $payload, $this->solution['trunkSid']);
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
        return '[Twilio.Trunking.V1.RecordingContext ' . \implode(' ', $context) . ']';
    }
}
