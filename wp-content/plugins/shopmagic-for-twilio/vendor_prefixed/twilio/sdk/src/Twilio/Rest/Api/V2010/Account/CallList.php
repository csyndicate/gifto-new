<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryList;
/**
 * @property FeedbackSummaryList $feedbackSummaries
 * @method \Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryContext feedbackSummaries(string $sid)
 */
class CallList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    protected $_feedbackSummaries = null;
    /**
     * Construct the CallList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that will create the resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $accountSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Calls.json';
    }
    /**
     * Create the CallInstance
     *
     * @param string $to The phone number, SIP address, or client identifier to call.
     * @param string $from The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified [outgoing caller id](https://www.twilio.com/docs/voice/api/outgoing-caller-ids) for your account. If the `to` parameter is a phone number, `From` must also be a phone number.
     * @param array|Options $options Optional Arguments
     * @return CallInstance Created CallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $to, string $from, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['To' => $to, 'From' => $from, 'Method' => $options['method'], 'FallbackUrl' => $options['fallbackUrl'], 'FallbackMethod' => $options['fallbackMethod'], 'StatusCallback' => $options['statusCallback'], 'StatusCallbackEvent' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['statusCallbackEvent'], function ($e) {
            return $e;
        }), 'StatusCallbackMethod' => $options['statusCallbackMethod'], 'SendDigits' => $options['sendDigits'], 'Timeout' => $options['timeout'], 'Record' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['record']), 'RecordingChannels' => $options['recordingChannels'], 'RecordingStatusCallback' => $options['recordingStatusCallback'], 'RecordingStatusCallbackMethod' => $options['recordingStatusCallbackMethod'], 'SipAuthUsername' => $options['sipAuthUsername'], 'SipAuthPassword' => $options['sipAuthPassword'], 'MachineDetection' => $options['machineDetection'], 'MachineDetectionTimeout' => $options['machineDetectionTimeout'], 'RecordingStatusCallbackEvent' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['recordingStatusCallbackEvent'], function ($e) {
            return $e;
        }), 'Trim' => $options['trim'], 'CallerId' => $options['callerId'], 'MachineDetectionSpeechThreshold' => $options['machineDetectionSpeechThreshold'], 'MachineDetectionSpeechEndThreshold' => $options['machineDetectionSpeechEndThreshold'], 'MachineDetectionSilenceTimeout' => $options['machineDetectionSilenceTimeout'], 'AsyncAmd' => $options['asyncAmd'], 'AsyncAmdStatusCallback' => $options['asyncAmdStatusCallback'], 'AsyncAmdStatusCallbackMethod' => $options['asyncAmdStatusCallbackMethod'], 'Byoc' => $options['byoc'], 'CallReason' => $options['callReason'], 'CallToken' => $options['callToken'], 'RecordingTrack' => $options['recordingTrack'], 'TimeLimit' => $options['timeLimit'], 'Url' => $options['url'], 'Twiml' => $options['twiml'], 'ApplicationSid' => $options['applicationSid']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallInstance($this->version, $payload, $this->solution['accountSid']);
    }
    /**
     * Reads CallInstance records from the API as a list.
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
     * @return CallInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams CallInstance records from the API as a generator stream.
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
     * Retrieve a single page of CallInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return CallPage Page of CallInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallPage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['To' => $options['to'], 'From' => $options['from'], 'ParentCallSid' => $options['parentCallSid'], 'Status' => $options['status'], 'StartTime<' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['startTimeBefore']), 'StartTime' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['startTime']), 'StartTime>' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['startTimeAfter']), 'EndTime<' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['endTimeBefore']), 'EndTime' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['endTime']), 'EndTime>' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['endTimeAfter']), 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of CallInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return CallPage Page of CallInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a CallContext
     *
     * @param string $sid The Twilio-provided Call SID that uniquely identifies the Call resource to delete
     */
    public function getContext(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallContext($this->version, $this->solution['accountSid'], $sid);
    }
    /**
     * Access the feedbackSummaries
     */
    protected function getFeedbackSummaries() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryList
    {
        if (!$this->_feedbackSummaries) {
            $this->_feedbackSummaries = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryList($this->version, $this->solution['accountSid']);
        }
        return $this->_feedbackSummaries;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name)
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown subresource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : \ShopMagicTwilioVendor\Twilio\InstanceContext
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Resource does not have a context');
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.CallList]';
    }
}
