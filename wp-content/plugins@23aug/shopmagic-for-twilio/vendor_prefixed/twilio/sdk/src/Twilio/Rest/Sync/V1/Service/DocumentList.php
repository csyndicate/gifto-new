<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class DocumentList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the DocumentList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Sync Service that the resource is
     *                           associated with
     * @return \Twilio\Rest\Sync\V1\Service\DocumentList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid);
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Documents';
    }
    /**
     * Create a new DocumentInstance
     *
     * @param array|Options $options Optional Arguments
     * @return DocumentInstance Newly created DocumentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('UniqueName' => $options['uniqueName'], 'Data' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['data']), 'Ttl' => $options['ttl']));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\DocumentInstance($this->version, $payload, $this->solution['serviceSid']);
    }
    /**
     * Streams DocumentInstance records from the API as a generator stream.
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
     * Reads DocumentInstance records from the API as a list.
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
     * @return DocumentInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of DocumentInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of DocumentInstance
     */
    public function page($pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\DocumentPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of DocumentInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of DocumentInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\DocumentPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a DocumentContext
     *
     * @param string $sid The SID of the Document resource to fetch
     * @return \Twilio\Rest\Sync\V1\Service\DocumentContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\DocumentContext($this->version, $this->solution['serviceSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Sync.V1.DocumentList]';
    }
}
