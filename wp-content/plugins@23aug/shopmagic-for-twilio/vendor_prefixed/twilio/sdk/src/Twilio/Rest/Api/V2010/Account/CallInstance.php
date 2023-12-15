<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property string $annotation
 * @property string $answeredBy
 * @property string $apiVersion
 * @property string $callerName
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $direction
 * @property string $duration
 * @property \DateTime $endTime
 * @property string $forwardedFrom
 * @property string $from
 * @property string $fromFormatted
 * @property string $groupSid
 * @property string $parentCallSid
 * @property string $phoneNumberSid
 * @property string $price
 * @property string $priceUnit
 * @property string $sid
 * @property \DateTime $startTime
 * @property string $status
 * @property array $subresourceUris
 * @property string $to
 * @property string $toFormatted
 * @property string $uri
 */
class CallInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_recordings = null;
    protected $_notifications = null;
    protected $_feedback = null;
    protected $_payments = null;
    /**
     * Initialize the CallInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created this resource
     * @param string $sid The SID of the Call resource to fetch
     * @return \Twilio\Rest\Api\V2010\Account\CallInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $accountSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'annotation' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'annotation'), 'answeredBy' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'answered_by'), 'apiVersion' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'api_version'), 'callerName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'caller_name'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'direction' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'direction'), 'duration' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'duration'), 'endTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'end_time')), 'forwardedFrom' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'forwarded_from'), 'from' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'from'), 'fromFormatted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'from_formatted'), 'groupSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'group_sid'), 'parentCallSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'parent_call_sid'), 'phoneNumberSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'phone_number_sid'), 'price' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price'), 'priceUnit' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'price_unit'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'startTime' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'start_time')), 'status' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'status'), 'subresourceUris' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'subresource_uris'), 'to' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'to'), 'toFormatted' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'to_formatted'), 'uri' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'uri'));
        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\CallContext Context for this
     *                                                    CallInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\CallContext($this->version, $this->solution['accountSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Deletes the CallInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch a CallInstance
     *
     * @return CallInstance Fetched CallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the CallInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CallInstance Updated CallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the recordings
     *
     * @return \Twilio\Rest\Api\V2010\Account\Call\RecordingList
     */
    protected function getRecordings()
    {
        return $this->proxy()->recordings;
    }
    /**
     * Access the notifications
     *
     * @return \Twilio\Rest\Api\V2010\Account\Call\NotificationList
     */
    protected function getNotifications()
    {
        return $this->proxy()->notifications;
    }
    /**
     * Access the feedback
     *
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackList
     */
    protected function getFeedback()
    {
        return $this->proxy()->feedback;
    }
    /**
     * Access the payments
     *
     * @return \Twilio\Rest\Api\V2010\Account\Call\PaymentList
     */
    protected function getPayments()
    {
        return $this->proxy()->payments;
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
        return '[Twilio.Api.V2010.CallInstance ' . \implode(' ', $context) . ']';
    }
}
