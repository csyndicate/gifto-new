<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Ip_messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
/**
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $attributes
 * @property string|null $serviceSid
 * @property string|null $to
 * @property string|null $channelSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property bool|null $wasEdited
 * @property string|null $from
 * @property string|null $body
 * @property int|null $index
 * @property string|null $url
 */
class MessageInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the MessageInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid 
     * @param string $channelSid 
     * @param string $sid 
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $serviceSid, string $channelSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'attributes' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'attributes'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'to' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'to'), 'channelSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'channel_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'wasEdited' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'was_edited'), 'from' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'from'), 'body' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'body'), 'index' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'index'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['serviceSid' => $serviceSid, 'channelSid' => $channelSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return MessageContext Context for this MessageInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\MessageContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\MessageContext($this->version, $this->solution['serviceSid'], $this->solution['channelSid'], $this->solution['sid']);
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
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\MessageInstance
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
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\MessageInstance
    {
        return $this->proxy()->update($options);
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
        return '[Twilio.IpMessaging.V1.MessageInstance ' . \implode(' ', $context) . ']';
    }
}