<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStream;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class StreamMessageList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the StreamMessageList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Sync Service that the resource is
     *                           associated with
     * @param string $streamSid The unique string that identifies the resource
     * @return \Twilio\Rest\Sync\V1\Service\SyncStream\StreamMessageList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $streamSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'streamSid' => $streamSid);
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Streams/' . \rawurlencode($streamSid) . '/Messages';
    }
    /**
     * Create a new StreamMessageInstance
     *
     * @param array $data A JSON string that represents an arbitrary, schema-less
     *                    object that makes up the Stream Message body
     * @return StreamMessageInstance Newly created StreamMessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($data)
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Data' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($data)));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStream\StreamMessageInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['streamSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Sync.V1.StreamMessageList]';
    }
}
