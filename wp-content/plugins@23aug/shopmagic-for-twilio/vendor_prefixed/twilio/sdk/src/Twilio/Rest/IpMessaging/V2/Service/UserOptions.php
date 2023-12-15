<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class UserOptions
{
    /**
     * @param string $roleSid The SID of the Role assigned to this user
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @param string $friendlyName A string to describe the new resource
     * @return CreateUserOptions Options builder
     */
    public static function create($roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, $attributes = \ShopMagicTwilioVendor\Twilio\Values::NONE, $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\CreateUserOptions($roleSid, $attributes, $friendlyName);
    }
    /**
     * @param string $roleSid The SID id of the Role assigned to this user
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @param string $friendlyName A string to describe the resource
     * @return UpdateUserOptions Options builder
     */
    public static function update($roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, $attributes = \ShopMagicTwilioVendor\Twilio\Values::NONE, $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\UpdateUserOptions($roleSid, $attributes, $friendlyName);
    }
}
class CreateUserOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $roleSid The SID of the Role assigned to this user
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @param string $friendlyName A string to describe the new resource
     */
    public function __construct($roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, $attributes = \ShopMagicTwilioVendor\Twilio\Values::NONE, $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['roleSid'] = $roleSid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
    }
    /**
     * The SID of the [Role](https://www.twilio.com/docs/chat/rest/role-resource) to assign to the new User.
     *
     * @param string $roleSid The SID of the Role assigned to this user
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid)
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }
    /**
     * A valid JSON string that contains application-specific data.
     *
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes)
    {
        $this->options['attributes'] = $attributes;
        return $this;
    }
    /**
     * A descriptive string that you create to describe the new resource. This value is often used for display purposes.
     *
     * @param string $friendlyName A string to describe the new resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.IpMessaging.V2.CreateUserOptions ' . \implode(' ', $options) . ']';
    }
}
class UpdateUserOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $roleSid The SID id of the Role assigned to this user
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @param string $friendlyName A string to describe the resource
     */
    public function __construct($roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, $attributes = \ShopMagicTwilioVendor\Twilio\Values::NONE, $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['roleSid'] = $roleSid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
    }
    /**
     * The SID of the [Role](https://www.twilio.com/docs/chat/rest/role-resource) to assign to the User.
     *
     * @param string $roleSid The SID id of the Role assigned to this user
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid)
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }
    /**
     * A valid JSON string that contains application-specific data.
     *
     * @param string $attributes A valid JSON string that contains
     *                           application-specific data
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes)
    {
        $this->options['attributes'] = $attributes;
        return $this;
    }
    /**
     * A descriptive string that you create to describe the resource. It is often used for display purposes.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.IpMessaging.V2.UpdateUserOptions ' . \implode(' ', $options) . ']';
    }
}
