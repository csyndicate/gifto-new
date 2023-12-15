<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\Fleet;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class DeploymentList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the DeploymentList
     *
     * @param Version $version Version that contains the resource
     * @param string $fleetSid The unique identifier of the Fleet.
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $fleetSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('fleetSid' => $fleetSid);
        $this->uri = '/Fleets/' . \rawurlencode($fleetSid) . '/Deployments';
    }
    /**
     * Create a new DeploymentInstance
     *
     * @param array|Options $options Optional Arguments
     * @return DeploymentInstance Newly created DeploymentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName'], 'SyncServiceSid' => $options['syncServiceSid']));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentInstance($this->version, $payload, $this->solution['fleetSid']);
    }
    /**
     * Streams DeploymentInstance records from the API as a generator stream.
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
     * Reads DeploymentInstance records from the API as a list.
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
     * @return DeploymentInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of DeploymentInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of DeploymentInstance
     */
    public function page($pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of DeploymentInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of DeploymentInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a DeploymentContext
     *
     * @param string $sid A string that uniquely identifies the Deployment.
     * @return \Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\DeployedDevices\Fleet\DeploymentContext($this->version, $this->solution['fleetSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Preview.DeployedDevices.DeploymentList]';
    }
}
