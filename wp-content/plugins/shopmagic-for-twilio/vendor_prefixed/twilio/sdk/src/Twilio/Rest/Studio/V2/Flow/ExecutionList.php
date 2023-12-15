<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class ExecutionList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the ExecutionList
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Excecution's Flow.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $flowSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['flowSid' => $flowSid];
        $this->uri = '/Flows/' . \rawurlencode($flowSid) . '/Executions';
    }
    /**
     * Create the ExecutionInstance
     *
     * @param string $to The Contact phone number to start a Studio Flow Execution, available as variable `{{contact.channel.address}}`.
     * @param string $from The Twilio phone number to send messages or initiate calls from during the Flow's Execution. Available as variable `{{flow.channel.address}}`. For SMS, this can also be a Messaging Service SID.
     * @param array|Options $options Optional Arguments
     * @return ExecutionInstance Created ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $to, string $from, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['To' => $to, 'From' => $from, 'Parameters' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['parameters'])]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionInstance($this->version, $payload, $this->solution['flowSid']);
    }
    /**
     * Reads ExecutionInstance records from the API as a list.
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
     * @return ExecutionInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams ExecutionInstance records from the API as a generator stream.
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
     * Retrieve a single page of ExecutionInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return ExecutionPage Page of ExecutionInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionPage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['DateCreatedFrom' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreatedFrom']), 'DateCreatedTo' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreatedTo']), 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of ExecutionInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return ExecutionPage Page of ExecutionInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a ExecutionContext
     *
     * @param string $sid The SID of the Execution resource to delete.
     */
    public function getContext(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\Flow\ExecutionContext($this->version, $this->solution['flowSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Studio.V2.ExecutionList]';
    }
}