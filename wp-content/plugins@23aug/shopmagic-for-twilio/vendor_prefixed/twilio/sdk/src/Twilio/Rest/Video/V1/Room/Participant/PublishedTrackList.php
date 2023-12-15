<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class PublishedTrackList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the PublishedTrackList
     *
     * @param Version $version Version that contains the resource
     * @param string $roomSid The SID of the Room resource where the track is
     *                        published
     * @param string $participantSid The SID of the Participant resource with the
     *                               published track
     * @return \Twilio\Rest\Video\V1\Room\Participant\PublishedTrackList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $roomSid, $participantSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('roomSid' => $roomSid, 'participantSid' => $participantSid);
        $this->uri = '/Rooms/' . \rawurlencode($roomSid) . '/Participants/' . \rawurlencode($participantSid) . '/PublishedTracks';
    }
    /**
     * Streams PublishedTrackInstance records from the API as a generator stream.
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
     * Reads PublishedTrackInstance records from the API as a list.
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
     * @return PublishedTrackInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of PublishedTrackInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of PublishedTrackInstance
     */
    public function page($pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant\PublishedTrackPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of PublishedTrackInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of PublishedTrackInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant\PublishedTrackPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a PublishedTrackContext
     *
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\Room\Participant\PublishedTrackContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant\PublishedTrackContext($this->version, $this->solution['roomSid'], $this->solution['participantSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Video.V1.PublishedTrackList]';
    }
}
