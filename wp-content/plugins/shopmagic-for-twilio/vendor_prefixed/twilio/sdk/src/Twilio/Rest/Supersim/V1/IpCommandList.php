<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Supersim
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class IpCommandList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the IpCommandList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/IpCommands';
    }
    /**
     * Create the IpCommandInstance
     *
     * @param string $sim The `sid` or `unique_name` of the [Super SIM](https://www.twilio.com/docs/iot/supersim/api/sim-resource) to send the IP Command to.
     * @param string $payload The data that will be sent to the device. The payload cannot exceed 1300 bytes. If the PayloadType is set to text, the payload is encoded in UTF-8. If PayloadType is set to binary, the payload is encoded in Base64.
     * @param int $devicePort The device port to which the IP Command will be sent.
     * @param array|Options $options Optional Arguments
     * @return IpCommandInstance Created IpCommandInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $sim, string $payload, int $devicePort, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Sim' => $sim, 'Payload' => $payload, 'DevicePort' => $devicePort, 'PayloadType' => $options['payloadType'], 'CallbackUrl' => $options['callbackUrl'], 'CallbackMethod' => $options['callbackMethod']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandInstance($this->version, $payload);
    }
    /**
     * Reads IpCommandInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return IpCommandInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams IpCommandInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null) : \ShopMagicTwilioVendor\Twilio\Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);
        $page = $this->page($options, $limits['pageSize']);
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }
    /**
     * Retrieve a single page of IpCommandInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return IpCommandPage Page of IpCommandInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandPage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['Sim' => $options['sim'], 'SimIccid' => $options['simIccid'], 'Status' => $options['status'], 'Direction' => $options['direction'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of IpCommandInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return IpCommandPage Page of IpCommandInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a IpCommandContext
     *
     * @param string $sid The SID of the IP Command resource to fetch.
     */
    public function getContext(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Supersim.V1.IpCommandList]';
    }
}