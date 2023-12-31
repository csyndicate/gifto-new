<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Serverless
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class BuildList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the BuildList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to create the Build resource under.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $serviceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Builds';
    }
    /**
     * Create the BuildInstance
     *
     * @param array|Options $options Optional Arguments
     * @return BuildInstance Created BuildInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['AssetVersions' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['assetVersions'], function ($e) {
            return $e;
        }), 'FunctionVersions' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['functionVersions'], function ($e) {
            return $e;
        }), 'Dependencies' => $options['dependencies'], 'Runtime' => $options['runtime']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildInstance($this->version, $payload, $this->solution['serviceSid']);
    }
    /**
     * Reads BuildInstance records from the API as a list.
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
     * @return BuildInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Streams BuildInstance records from the API as a generator stream.
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
     * @return Stream stream of results
     */
    public function stream(int $limit = null, $pageSize = null) : \ShopMagicTwilioVendor\Twilio\Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);
        $page = $this->page($limits['pageSize']);
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }
    /**
     * Retrieve a single page of BuildInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return BuildPage Page of BuildInstance
     */
    public function page($pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildPage
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of BuildInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return BuildPage Page of BuildInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a BuildContext
     *
     * @param string $sid The SID of the Build resource to delete.
     */
    public function getContext(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Serverless\V1\Service\BuildContext($this->version, $this->solution['serviceSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Serverless.V1.BuildList]';
    }
}
