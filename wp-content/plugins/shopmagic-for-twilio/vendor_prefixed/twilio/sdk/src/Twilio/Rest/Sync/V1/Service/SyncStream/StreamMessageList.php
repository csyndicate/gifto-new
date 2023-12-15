<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Sync
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStream;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class StreamMessageList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the StreamMessageList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the [Sync Service](https://www.twilio.com/docs/sync/api/service) to create the new Stream Message in.
     * @param string $streamSid The SID of the Sync Stream to create the new Stream Message resource for.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $serviceSid, string $streamSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'streamSid' => $streamSid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Streams/' . \rawurlencode($streamSid) . '/Messages';
    }
    /**
     * Create the StreamMessageInstance
     *
     * @param array $data A JSON string that represents an arbitrary, schema-less object that makes up the Stream Message body. Can be up to 4 KiB in length.
     * @return StreamMessageInstance Created StreamMessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $data) : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStream\StreamMessageInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Data' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($data)]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStream\StreamMessageInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['streamSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Sync.V1.StreamMessageList]';
    }
}