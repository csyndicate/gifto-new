<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Preview
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class HostedNumberOrderList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the HostedNumberOrderList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/HostedNumberOrders';
    }
    /**
     * Create the HostedNumberOrderInstance
     *
     * @param string $phoneNumber The number to host in [+E.164](https://en.wikipedia.org/wiki/E.164) format
     * @param bool $smsCapability Used to specify that the SMS capability will be hosted on Twilio's platform.
     * @param array|Options $options Optional Arguments
     * @return HostedNumberOrderInstance Created HostedNumberOrderInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $phoneNumber, bool $smsCapability, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['PhoneNumber' => $phoneNumber, 'SmsCapability' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($smsCapability), 'AccountSid' => $options['accountSid'], 'FriendlyName' => $options['friendlyName'], 'UniqueName' => $options['uniqueName'], 'CcEmails' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['ccEmails'], function ($e) {
            return $e;
        }), 'SmsUrl' => $options['smsUrl'], 'SmsMethod' => $options['smsMethod'], 'SmsFallbackUrl' => $options['smsFallbackUrl'], 'SmsFallbackMethod' => $options['smsFallbackMethod'], 'StatusCallbackUrl' => $options['statusCallbackUrl'], 'StatusCallbackMethod' => $options['statusCallbackMethod'], 'SmsApplicationSid' => $options['smsApplicationSid'], 'AddressSid' => $options['addressSid'], 'Email' => $options['email'], 'VerificationType' => $options['verificationType'], 'VerificationDocumentSid' => $options['verificationDocumentSid']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderInstance($this->version, $payload);
    }
    /**
     * Reads HostedNumberOrderInstance records from the API as a list.
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
     * @return HostedNumberOrderInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams HostedNumberOrderInstance records from the API as a generator stream.
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
     * Retrieve a single page of HostedNumberOrderInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return HostedNumberOrderPage Page of HostedNumberOrderInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderPage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['Status' => $options['status'], 'PhoneNumber' => $options['phoneNumber'], 'IncomingPhoneNumberSid' => $options['incomingPhoneNumberSid'], 'FriendlyName' => $options['friendlyName'], 'UniqueName' => $options['uniqueName'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of HostedNumberOrderInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return HostedNumberOrderPage Page of HostedNumberOrderInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a HostedNumberOrderContext
     *
     * @param string $sid A 34 character string that uniquely identifies this HostedNumberOrder.
     */
    public function getContext(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\HostedNumbers\HostedNumberOrderContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Preview.HostedNumbers.HostedNumberOrderList]';
    }
}
