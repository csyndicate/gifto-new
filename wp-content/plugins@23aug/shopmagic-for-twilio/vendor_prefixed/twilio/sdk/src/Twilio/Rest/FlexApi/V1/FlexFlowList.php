<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class FlexFlowList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the FlexFlowList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\FlexApi\V1\FlexFlowList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array();
        $this->uri = '/FlexFlows';
    }
    /**
     * Streams FlexFlowInstance records from the API as a generator stream.
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
     * Reads FlexFlowInstance records from the API as a list.
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
     * @return FlexFlowInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null)
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of FlexFlowInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of FlexFlowInstance
     */
    public function page($options = array(), $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $options['friendlyName'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize));
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of FlexFlowInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of FlexFlowInstance
     */
    public function getPage($targetUrl)
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowPage($this->version, $response, $this->solution);
    }
    /**
     * Create a new FlexFlowInstance
     *
     * @param string $friendlyName A string to describe the resource
     * @param string $chatServiceSid The SID of the chat service
     * @param string $channelType The channel type
     * @param array|Options $options Optional Arguments
     * @return FlexFlowInstance Newly created FlexFlowInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($friendlyName, $chatServiceSid, $channelType, $options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('FriendlyName' => $friendlyName, 'ChatServiceSid' => $chatServiceSid, 'ChannelType' => $channelType, 'ContactIdentity' => $options['contactIdentity'], 'Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['enabled']), 'IntegrationType' => $options['integrationType'], 'Integration.FlowSid' => $options['integrationFlowSid'], 'Integration.Url' => $options['integrationUrl'], 'Integration.WorkspaceSid' => $options['integrationWorkspaceSid'], 'Integration.WorkflowSid' => $options['integrationWorkflowSid'], 'Integration.Channel' => $options['integrationChannel'], 'Integration.Timeout' => $options['integrationTimeout'], 'Integration.Priority' => $options['integrationPriority'], 'Integration.CreationOnMessage' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['integrationCreationOnMessage']), 'LongLived' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['longLived']), 'JanitorEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['janitorEnabled']), 'Integration.RetryCount' => $options['integrationRetryCount']));
        $payload = $this->version->create('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowInstance($this->version, $payload);
    }
    /**
     * Constructs a FlexFlowContext
     *
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\FlexApi\V1\FlexFlowContext
     */
    public function getContext($sid)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.FlexApi.V1.FlexFlowList]';
    }
}
