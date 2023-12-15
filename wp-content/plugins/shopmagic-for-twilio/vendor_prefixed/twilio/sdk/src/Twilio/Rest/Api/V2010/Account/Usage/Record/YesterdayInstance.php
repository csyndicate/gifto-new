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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\Record;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $accountSid
 * @property string|null $apiVersion
 * @property string|null $asOf
 * @property string $category
 * @property string|null $count
 * @property string|null $countUnit
 * @property string|null $description
 * @property \DateTime|null $endDate
 * @property string|null $price
 * @property string|null $priceUnit
 * @property \DateTime|null $startDate
 * @property array|null $subresourceUris
 * @property string|null $uri
 * @property string|null $usage
 * @property string|null $usageUnit
 */
class YesterdayInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the YesterdayInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that created the UsageRecord resources to read.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $accountSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'apiVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'api_version'), 'asOf' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'as_of'), 'category' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'category'), 'count' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'count'), 'countUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'count_unit'), 'description' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'description'), 'endDate' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_date')), 'price' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price'), 'priceUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price_unit'), 'startDate' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'start_date')), 'subresourceUris' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'subresource_uris'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'), 'usage' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'usage'), 'usageUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'usage_unit')];
        $this->solution = ['accountSid' => $accountSid];
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown property: ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.YesterdayInstance]';
    }
}
