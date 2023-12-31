<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Conversations
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class AddressConfigurationList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the AddressConfigurationList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/Configuration/Addresses';
    }
    /**
     * Create the AddressConfigurationInstance
     *
     * @param string $type
     * @param string $address The unique address to be configured. The address can be a whatsapp address or phone number
     * @param array|Options $options Optional Arguments
     * @return AddressConfigurationInstance Created AddressConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $type, string $address, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Type' => $type, 'Address' => $address, 'FriendlyName' => $options['friendlyName'], 'AutoCreation.Enabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['autoCreationEnabled']), 'AutoCreation.Type' => $options['autoCreationType'], 'AutoCreation.ConversationServiceSid' => $options['autoCreationConversationServiceSid'], 'AutoCreation.WebhookUrl' => $options['autoCreationWebhookUrl'], 'AutoCreation.WebhookMethod' => $options['autoCreationWebhookMethod'], 'AutoCreation.WebhookFilters' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['autoCreationWebhookFilters'], function ($e) {
            return $e;
        }), 'AutoCreation.StudioFlowSid' => $options['autoCreationStudioFlowSid'], 'AutoCreation.StudioRetryCount' => $options['autoCreationStudioRetryCount'], 'AddressCountry' => $options['addressCountry']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationInstance($this->version, $payload);
    }
    /**
     * Reads AddressConfigurationInstance records from the API as a list.
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
     * @return AddressConfigurationInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams AddressConfigurationInstance records from the API as a generator stream.
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
     * Retrieve a single page of AddressConfigurationInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return AddressConfigurationPage Page of AddressConfigurationInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationPage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['Type' => $options['type'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of AddressConfigurationInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return AddressConfigurationPage Page of AddressConfigurationInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a AddressConfigurationContext
     *
     * @param string $sid The SID of the Address Configuration resource. This value can be either the `sid` or the `address` of the configuration
     */
    public function getContext(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationContext
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\AddressConfigurationContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Conversations.V1.AddressConfigurationList]';
    }
}
