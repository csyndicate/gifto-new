<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\Record;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $apiVersion
 * @property string $asOf
 * @property string $category
 * @property string $count
 * @property string $countUnit
 * @property string $description
 * @property \DateTime $endDate
 * @property string $price
 * @property string $priceUnit
 * @property \DateTime $startDate
 * @property array $subresourceUris
 * @property string $uri
 * @property string $usage
 * @property string $usageUnit
 */
class YearlyInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the YearlyInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return \Twilio\Rest\Api\V2010\Account\Usage\Record\YearlyInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $accountSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'apiVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'api_version'), 'asOf' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'as_of'), 'category' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'category'), 'count' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'count'), 'countUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'count_unit'), 'description' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'description'), 'endDate' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_date')), 'price' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price'), 'priceUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price_unit'), 'startDate' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'start_date')), 'subresourceUris' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'subresource_uris'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'), 'usage' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'usage'), 'usageUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'usage_unit'));
        $this->solution = array('accountSid' => $accountSid);
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
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
    public function __toString()
    {
        return '[Twilio.Api.V2010.YearlyInstance]';
    }
}
