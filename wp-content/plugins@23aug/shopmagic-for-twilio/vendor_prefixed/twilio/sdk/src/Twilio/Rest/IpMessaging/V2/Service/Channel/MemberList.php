<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class MemberList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the MemberList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $channelSid The SID of the Channel for the member
     * @return \Twilio\Rest\IpMessaging\V2\Service\Channel\MemberList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $channelSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'channelSid' => $channelSid);
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Channels/' . \rawurlencode($channelSid) . '/Members';
    }
    /**
     * Create a new MemberInstance
     *
     * @param string $identity The `identity` value that identifies the new
     *                         resource's User
     * @param array|Options $options Optional Arguments
     * @return MemberInstance Newly created MemberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($identity, $options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Identity' => $identity, 'RoleSid' => $options['roleSid'], 'LastConsumedMessageIndex' => $options['lastConsumedMessageIndex'], 'LastConsumptionTimestamp' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['lastConsumptionTimestamp']), 'DateCreated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateCreated']), 'DateUpdated' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateUpdated']), 'Attributes' => $options['attributes']));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['channelSid']);
    }
    /**
     * Streams MemberInstance records from the API as a generator stream.
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
     * Reads MemberInstance records from the API as a list.
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
     * @return MemberInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of MemberInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of MemberInstance
     */
    public function page($options = array(), $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('Identity' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['identity'], function ($e) {
            return $e;
        }), 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of MemberInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of MemberInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a MemberContext
     *
     * @param string $sid The SID of the Member resource to fetch
     * @return \Twilio\Rest\IpMessaging\V2\Service\Channel\MemberContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\Channel\MemberContext($this->version, $this->solution['serviceSid'], $this->solution['channelSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.IpMessaging.V2.MemberList]';
    }
}
