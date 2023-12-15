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
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message\FeedbackList;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message\MediaList;
/**
 * @property string|null $body
 * @property string|null $numSegments
 * @property string $direction
 * @property string|null $from
 * @property string|null $to
 * @property \DateTime|null $dateUpdated
 * @property string|null $price
 * @property string|null $errorMessage
 * @property string|null $uri
 * @property string|null $accountSid
 * @property string|null $numMedia
 * @property string $status
 * @property string|null $messagingServiceSid
 * @property string|null $sid
 * @property \DateTime|null $dateSent
 * @property \DateTime|null $dateCreated
 * @property int|null $errorCode
 * @property string|null $priceUnit
 * @property string|null $apiVersion
 * @property array|null $subresourceUris
 */
class MessageInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_feedback;
    protected $_media;
    /**
     * Initialize the MessageInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) creating the Message resource.
     * @param string $sid The SID of the Message resource you wish to delete
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $accountSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['body' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'body'), 'numSegments' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'num_segments'), 'direction' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'direction'), 'from' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'from'), 'to' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'to'), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'price' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price'), 'errorMessage' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'error_message'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'numMedia' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'num_media'), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'messagingServiceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'messaging_service_sid'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'dateSent' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_sent')), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'errorCode' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'error_code'), 'priceUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price_unit'), 'apiVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'api_version'), 'subresourceUris' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'subresource_uris')];
        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return MessageContext Context for this MessageInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\MessageContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\MessageContext($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the MessageInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\MessageInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\MessageInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the feedback
     */
    protected function getFeedback() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message\FeedbackList
    {
        return $this->proxy()->feedback;
    }
    /**
     * Access the media
     */
    protected function getMedia() : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message\MediaList
    {
        return $this->proxy()->media;
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
        return '[Twilio.Api.V2010.MessageInstance ' . \implode(' ', $context) . ']';
    }
}