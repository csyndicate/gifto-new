<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Supersim
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $iccid
 * @property string|null $simSid
 * @property string $status
 * @property string|null $eid
 * @property string|null $smdpPlusAddress
 * @property string|null $matchingId
 * @property string|null $activationCode
 * @property string|null $errorCode
 * @property string|null $errorMessage
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $url
 */
class EsimProfileInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the EsimProfileInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the eSIM Profile resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'iccid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'iccid'), 'simSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sim_sid'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'eid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'eid'), 'smdpPlusAddress' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'smdp_plus_address'), 'matchingId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'matching_id'), 'activationCode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'activation_code'), 'errorCode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'error_code'), 'errorMessage' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'error_message'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return EsimProfileContext Context for this EsimProfileInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\EsimProfileContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\EsimProfileContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the EsimProfileInstance
     *
     * @return EsimProfileInstance Fetched EsimProfileInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\EsimProfileInstance
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
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Supersim.V1.EsimProfileInstance ' . \implode(' ', $context) . ']';
    }
}
