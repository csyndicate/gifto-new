<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class CommandOptions
{
    /**
     * @param string $device The device
     * @param string $sim The sim
     * @param string $status The status
     * @param string $direction The direction
     * @return ReadCommandOptions Options builder
     */
    public static function read($device = \ShopMagicTwilioVendor\Twilio\Values::NONE, $sim = \ShopMagicTwilioVendor\Twilio\Values::NONE, $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, $direction = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless\ReadCommandOptions($device, $sim, $status, $direction);
    }
    /**
     * @param string $device The device
     * @param string $sim The sim
     * @param string $callbackMethod The callback_method
     * @param string $callbackUrl The callback_url
     * @param string $commandMode The command_mode
     * @param string $includeSid The include_sid
     * @return CreateCommandOptions Options builder
     */
    public static function create($device = \ShopMagicTwilioVendor\Twilio\Values::NONE, $sim = \ShopMagicTwilioVendor\Twilio\Values::NONE, $callbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, $callbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, $commandMode = \ShopMagicTwilioVendor\Twilio\Values::NONE, $includeSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Wireless\CreateCommandOptions($device, $sim, $callbackMethod, $callbackUrl, $commandMode, $includeSid);
    }
}
class ReadCommandOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $device The device
     * @param string $sim The sim
     * @param string $status The status
     * @param string $direction The direction
     */
    public function __construct($device = \ShopMagicTwilioVendor\Twilio\Values::NONE, $sim = \ShopMagicTwilioVendor\Twilio\Values::NONE, $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, $direction = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['device'] = $device;
        $this->options['sim'] = $sim;
        $this->options['status'] = $status;
        $this->options['direction'] = $direction;
    }
    /**
     * The device
     *
     * @param string $device The device
     * @return $this Fluent Builder
     */
    public function setDevice($device)
    {
        $this->options['device'] = $device;
        return $this;
    }
    /**
     * The sim
     *
     * @param string $sim The sim
     * @return $this Fluent Builder
     */
    public function setSim($sim)
    {
        $this->options['sim'] = $sim;
        return $this;
    }
    /**
     * The status
     *
     * @param string $status The status
     * @return $this Fluent Builder
     */
    public function setStatus($status)
    {
        $this->options['status'] = $status;
        return $this;
    }
    /**
     * The direction
     *
     * @param string $direction The direction
     * @return $this Fluent Builder
     */
    public function setDirection($direction)
    {
        $this->options['direction'] = $direction;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != \ShopMagicTwilioVendor\Twilio\Values::NONE) {
                $options[] = "{$key}={$value}";
            }
        }
        return '[Twilio.Preview.Wireless.ReadCommandOptions ' . \implode(' ', $options) . ']';
    }
}
class CreateCommandOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $device The device
     * @param string $sim The sim
     * @param string $callbackMethod The callback_method
     * @param string $callbackUrl The callback_url
     * @param string $commandMode The command_mode
     * @param string $includeSid The include_sid
     */
    public function __construct($device = \ShopMagicTwilioVendor\Twilio\Values::NONE, $sim = \ShopMagicTwilioVendor\Twilio\Values::NONE, $callbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, $callbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, $commandMode = \ShopMagicTwilioVendor\Twilio\Values::NONE, $includeSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['device'] = $device;
        $this->options['sim'] = $sim;
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['commandMode'] = $commandMode;
        $this->options['includeSid'] = $includeSid;
    }
    /**
     * The device
     *
     * @param string $device The device
     * @return $this Fluent Builder
     */
    public function setDevice($device)
    {
        $this->options['device'] = $device;
        return $this;
    }
    /**
     * The sim
     *
     * @param string $sim The sim
     * @return $this Fluent Builder
     */
    public function setSim($sim)
    {
        $this->options['sim'] = $sim;
        return $this;
    }
    /**
     * The callback_method
     *
     * @param string $callbackMethod The callback_method
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod)
    {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }
    /**
     * The callback_url
     *
     * @param string $callbackUrl The callback_url
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl)
    {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }
    /**
     * The command_mode
     *
     * @param string $commandMode The command_mode
     * @return $this Fluent Builder
     */
    public function setCommandMode($commandMode)
    {
        $this->options['commandMode'] = $commandMode;
        return $this;
    }
    /**
     * The include_sid
     *
     * @param string $includeSid The include_sid
     * @return $this Fluent Builder
     */
    public function setIncludeSid($includeSid)
    {
        $this->options['includeSid'] = $includeSid;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != \ShopMagicTwilioVendor\Twilio\Values::NONE) {
                $options[] = "{$key}={$value}";
            }
        }
        return '[Twilio.Preview.Wireless.CreateCommandOptions ' . \implode(' ', $options) . ']';
    }
}
