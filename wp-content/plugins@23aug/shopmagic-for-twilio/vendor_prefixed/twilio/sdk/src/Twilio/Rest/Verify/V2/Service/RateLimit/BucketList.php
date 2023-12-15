<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class BucketList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the BucketList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $rateLimitSid Rate Limit Sid.
     * @return \Twilio\Rest\Verify\V2\Service\RateLimit\BucketList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $rateLimitSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'rateLimitSid' => $rateLimitSid);
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/RateLimits/' . \rawurlencode($rateLimitSid) . '/Buckets';
    }
    /**
     * Create a new BucketInstance
     *
     * @param int $max Max number of requests.
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     * @return BucketInstance Newly created BucketInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($max, $interval)
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Max' => $max, 'Interval' => $interval));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit\BucketInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['rateLimitSid']);
    }
    /**
     * Streams BucketInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream($limit = null, $pageSize = null)
    {
        $limits = $this->version->readLimits($limit, $pageSize);
        $page = $this->page($limits['pageSize']);
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }
    /**
     * Reads BucketInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return BucketInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of BucketInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of BucketInstance
     */
    public function page($pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit\BucketPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of BucketInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of BucketInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit\BucketPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a BucketContext
     *
     * @param string $sid A string that uniquely identifies this Bucket.
     * @return \Twilio\Rest\Verify\V2\Service\RateLimit\BucketContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit\BucketContext($this->version, $this->solution['serviceSid'], $this->solution['rateLimitSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Verify.V2.BucketList]';
    }
}
