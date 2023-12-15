<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class InsightsAssessmentsCommentList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the InsightsAssessmentsCommentList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/Insights/QualityManagement/Assessments/Comments';
    }
    /**
     * Create the InsightsAssessmentsCommentInstance
     *
     * @param string $categoryId The ID of the category
     * @param string $categoryName The name of the category
     * @param string $comment The Assessment comment.
     * @param string $segmentId The id of the segment.
     * @param string $agentId The id of the agent.
     * @param string $offset The offset
     * @param array|Options $options Optional Arguments
     * @return InsightsAssessmentsCommentInstance Created InsightsAssessmentsCommentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $categoryId, string $categoryName, string $comment, string $segmentId, string $agentId, string $offset, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['CategoryId' => $categoryId, 'CategoryName' => $categoryName, 'Comment' => $comment, 'SegmentId' => $segmentId, 'AgentId' => $agentId, 'Offset' => $offset]);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['Authorization' => $options['authorization']]);
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentInstance($this->version, $payload);
    }
    /**
     * Reads InsightsAssessmentsCommentInstance records from the API as a list.
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
     * @return InsightsAssessmentsCommentInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams InsightsAssessmentsCommentInstance records from the API as a generator stream.
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
     * Retrieve a single page of InsightsAssessmentsCommentInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return InsightsAssessmentsCommentPage Page of InsightsAssessmentsCommentInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentPage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['SegmentId' => $options['segmentId'], 'AgentId' => $options['agentId'], 'Authorization' => $options['authorization'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of InsightsAssessmentsCommentInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return InsightsAssessmentsCommentPage Page of InsightsAssessmentsCommentInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentPage($this->version, $response, $this->solution);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.FlexApi.V1.InsightsAssessmentsCommentList]';
    }
}