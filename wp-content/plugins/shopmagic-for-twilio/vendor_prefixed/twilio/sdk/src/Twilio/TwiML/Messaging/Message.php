<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Messaging;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Message extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Message constructor.
     *
     * @param string $body Message Body
     * @param array $attributes Optional attributes
     */
    public function __construct($body, $attributes = [])
    {
        parent::__construct('Message', $body, $attributes);
    }
    /**
     * Add Body child.
     *
     * @param string $message Message Body
     * @return Body Child element.
     */
    public function body($message) : \ShopMagicTwilioVendor\Twilio\TwiML\Messaging\Body
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Messaging\Body($message));
    }
    /**
     * Add Media child.
     *
     * @param string $url Media URL
     * @return Media Child element.
     */
    public function media($url) : \ShopMagicTwilioVendor\Twilio\TwiML\Messaging\Media
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Messaging\Media($url));
    }
    /**
     * Add To attribute.
     *
     * @param string $to Phone Number to send Message to
     */
    public function setTo($to) : self
    {
        return $this->setAttribute('to', $to);
    }
    /**
     * Add From attribute.
     *
     * @param string $from Phone Number to send Message from
     */
    public function setFrom($from) : self
    {
        return $this->setAttribute('from', $from);
    }
    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     */
    public function setAction($action) : self
    {
        return $this->setAttribute('action', $action);
    }
    /**
     * Add Method attribute.
     *
     * @param string $method Action URL Method
     */
    public function setMethod($method) : self
    {
        return $this->setAttribute('method', $method);
    }
    /**
     * Add StatusCallback attribute.
     *
     * @param string $statusCallback Status callback URL. Deprecated in favor of
     *                               action.
     */
    public function setStatusCallback($statusCallback) : self
    {
        return $this->setAttribute('statusCallback', $statusCallback);
    }
}
