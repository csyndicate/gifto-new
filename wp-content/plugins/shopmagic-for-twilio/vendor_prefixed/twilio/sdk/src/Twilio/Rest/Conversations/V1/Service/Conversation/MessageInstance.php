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
namespace ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\Message\DeliveryReceiptList;
/**
 * @property string|null $accountSid
 * @property string|null $chatServiceSid
 * @property string|null $conversationSid
 * @property string|null $sid
 * @property int|null $index
 * @property string|null $author
 * @property string|null $body
 * @property array[]|null $media
 * @property string|null $attributes
 * @property string|null $participantSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property array|null $delivery
 * @property string|null $url
 * @property array|null $links
 * @property string|null $contentSid
 */
class MessageInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_deliveryReceipts;
    /**
     * Initialize the MessageInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $chatServiceSid The SID of the [Conversation Service](https://www.twilio.com/docs/conversations/api/service-resource) the Participant resource is associated with.
     * @param string $conversationSid The unique ID of the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for this message.
     * @param string $sid A 34 character string that uniquely identifies this resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $chatServiceSid, string $conversationSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'chatServiceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'chat_service_sid'), 'conversationSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'conversation_sid'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'index' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'index'), 'author' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'author'), 'body' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'body'), 'media' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'media'), 'attributes' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'attributes'), 'participantSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'participant_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'delivery' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'delivery'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'), 'contentSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'content_sid')];
        $this->solution = ['chatServiceSid' => $chatServiceSid, 'conversationSid' => $conversationSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return MessageContext Context for this MessageInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\MessageContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\MessageContext($this->version, $this->solution['chatServiceSid'], $this->solution['conversationSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the MessageInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []) : bool
    {
        return $this->proxy()->delete($options);
    }
    /**
     * Fetch the MessageInstance
     *
     * @return MessageInstance Fetched MessageInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\MessageInstance
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
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\MessageInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the deliveryReceipts
     */
    protected function getDeliveryReceipts() : \ShopMagicTwilioVendor\Twilio\Rest\Conversations\V1\Service\Conversation\Message\DeliveryReceiptList
    {
        return $this->proxy()->deliveryReceipts;
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
        return '[Twilio.Conversations.V1.MessageInstance ' . \implode(' ', $context) . ']';
    }
}