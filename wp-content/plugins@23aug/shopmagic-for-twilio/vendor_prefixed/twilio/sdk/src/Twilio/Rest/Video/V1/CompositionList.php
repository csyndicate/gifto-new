<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Video\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class CompositionList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the CompositionList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Video\V1\CompositionList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array();
        $this->uri = '/Compositions';
    }
    /**
     * Streams CompositionInstance records from the API as a generator stream.
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
     * @return \Twilio\Stream stream of results
     */
    public function stream($options = array(), $limit = null, $pageSize = null)
    {
        $limits = $this->version->readLimits($limit, $pageSize);
        $page = $this->page($options, $limits['pageSize']);
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }
    /**
     * Reads CompositionInstance records from the API as a list.
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
     * @return CompositionInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of CompositionInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of CompositionInstance
     */
    public function page($options = array(), $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('Status' => $options['status'], 'DateCreatedAfter' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreatedAfter']), 'DateCreatedBefore' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreatedBefore']), 'RoomSid' => $options['roomSid'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\CompositionPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of CompositionInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of CompositionInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\CompositionPage($this->version, $response, $this->solution);
    }
    /**
     * Create a new CompositionInstance
     *
     * @param string $roomSid The SID of the Group Room with the media tracks to be
     *                        used as composition sources
     * @param array|Options $options Optional Arguments
     * @return CompositionInstance Newly created CompositionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($roomSid, $options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('RoomSid' => $roomSid, 'VideoLayout' => \ShopMagicTwilioVendor\Twilio\Serialize::jsonObject($options['videoLayout']), 'AudioSources' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['audioSources'], function ($e) {
            return $e;
        }), 'AudioSourcesExcluded' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['audioSourcesExcluded'], function ($e) {
            return $e;
        }), 'Resolution' => $options['resolution'], 'Format' => $options['format'], 'StatusCallback' => $options['statusCallback'], 'StatusCallbackMethod' => $options['statusCallbackMethod'], 'Trim' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['trim'])));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\CompositionInstance($this->version, $payload);
    }
    /**
     * Constructs a CompositionContext
     *
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\CompositionContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\CompositionContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Video.V1.CompositionList]';
    }
}
