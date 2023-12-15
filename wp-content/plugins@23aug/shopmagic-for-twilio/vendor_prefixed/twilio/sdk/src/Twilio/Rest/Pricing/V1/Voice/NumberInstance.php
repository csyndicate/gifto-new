<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Pricing\V1\Voice;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $number
 * @property string $country
 * @property string $isoCountry
 * @property string $outboundCallPrice
 * @property string $inboundCallPrice
 * @property string $priceUnit
 * @property string $url
 */
class NumberInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the NumberInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $number The phone number to fetch
     * @return \Twilio\Rest\Pricing\V1\Voice\NumberInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $number = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('number' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'number'), 'country' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'country'), 'isoCountry' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'iso_country'), 'outboundCallPrice' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'outbound_call_price'), 'inboundCallPrice' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'inbound_call_price'), 'priceUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price_unit'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'));
        $this->solution = array('number' => $number ?: $this->properties['number']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Pricing\V1\Voice\NumberContext Context for this
     *                                                     NumberInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Pricing\V1\Voice\NumberContext($this->version, $this->solution['number']);
        }
        return $this->context;
    }
    /**
     * Fetch a NumberInstance
     *
     * @return NumberInstance Fetched NumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Pricing.V1.NumberInstance ' . \implode(' ', $context) . ']';
    }
}
