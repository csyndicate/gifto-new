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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Stream;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Serialize;
class MachineToMachineList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the MachineToMachineList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) requesting the AvailablePhoneNumber resources.
     * @param string $countryCode The [ISO-3166-1](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) country code of the country from which to read phone numbers.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, string $accountSid, string $countryCode)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'countryCode' => $countryCode];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/AvailablePhoneNumbers/' . \rawurlencode($countryCode) . '/MachineToMachine.json';
    }
    /**
     * Reads MachineToMachineInstance records from the API as a list.
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
     * @return MachineToMachineInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Streams MachineToMachineInstance records from the API as a generator stream.
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
     * Retrieve a single page of MachineToMachineInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return MachineToMachinePage Page of MachineToMachineInstance
     */
    public function page(array $options = [], $pageSize = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $pageToken = \ShopMagicTwilioVendor\Twilio\Values::NONE, $pageNumber = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachinePage
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(['AreaCode' => $options['areaCode'], 'Contains' => $options['contains'], 'SmsEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['smsEnabled']), 'MmsEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['mmsEnabled']), 'VoiceEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['voiceEnabled']), 'ExcludeAllAddressRequired' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['excludeAllAddressRequired']), 'ExcludeLocalAddressRequired' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['excludeLocalAddressRequired']), 'ExcludeForeignAddressRequired' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['excludeForeignAddressRequired']), 'Beta' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['beta']), 'NearNumber' => $options['nearNumber'], 'NearLatLong' => $options['nearLatLong'], 'Distance' => $options['distance'], 'InPostalCode' => $options['inPostalCode'], 'InRegion' => $options['inRegion'], 'InRateCenter' => $options['inRateCenter'], 'InLata' => $options['inLata'], 'InLocality' => $options['inLocality'], 'FaxEnabled' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['faxEnabled']), 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachinePage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of MachineToMachineInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return MachineToMachinePage Page of MachineToMachineInstance
     */
    public function getPage(string $targetUrl) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachinePage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MachineToMachinePage($this->version, $response, $this->solution);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.MachineToMachineList]';
    }
}
