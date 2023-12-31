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

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class MemberOptions
{
    /**
     * @param string $roleSid 
     * @return CreateMemberOptions Options builder
     */
    public static function create(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\CreateMemberOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\CreateMemberOptions($roleSid);
    }
    /**
     * @param string[] $identity 
     * @return ReadMemberOptions Options builder
     */
    public static function read(array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\ReadMemberOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\ReadMemberOptions($identity);
    }
    /**
     * @param string $roleSid 
     * @param int $lastConsumedMessageIndex 
     * @return UpdateMemberOptions Options builder
     */
    public static function update(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, int $lastConsumedMessageIndex = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\UpdateMemberOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V1\Service\Channel\UpdateMemberOptions($roleSid, $lastConsumedMessageIndex);
    }
}
class CreateMemberOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $roleSid 
     */
    public function __construct(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['roleSid'] = $roleSid;
    }
    /**
     * 
     *
     * @param string $roleSid 
     * @return $this Fluent Builder
     */
    public function setRoleSid(string $roleSid) : self
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(\ShopMagicTwilioVendor\Twilio\Values::of($this->options), '', ' ');
        return '[Twilio.IpMessaging.V1.CreateMemberOptions ' . $options . ']';
    }
}
class ReadMemberOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string[] $identity 
     */
    public function __construct(array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['identity'] = $identity;
    }
    /**
     * 
     *
     * @param string[] $identity 
     * @return $this Fluent Builder
     */
    public function setIdentity(array $identity) : self
    {
        $this->options['identity'] = $identity;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(\ShopMagicTwilioVendor\Twilio\Values::of($this->options), '', ' ');
        return '[Twilio.IpMessaging.V1.ReadMemberOptions ' . $options . ']';
    }
}
class UpdateMemberOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $roleSid 
     * @param int $lastConsumedMessageIndex 
     */
    public function __construct(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, int $lastConsumedMessageIndex = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE)
    {
        $this->options['roleSid'] = $roleSid;
        $this->options['lastConsumedMessageIndex'] = $lastConsumedMessageIndex;
    }
    /**
     * 
     *
     * @param string $roleSid 
     * @return $this Fluent Builder
     */
    public function setRoleSid(string $roleSid) : self
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }
    /**
     * 
     *
     * @param int $lastConsumedMessageIndex 
     * @return $this Fluent Builder
     */
    public function setLastConsumedMessageIndex(int $lastConsumedMessageIndex) : self
    {
        $this->options['lastConsumedMessageIndex'] = $lastConsumedMessageIndex;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(\ShopMagicTwilioVendor\Twilio\Values::of($this->options), '', ' ');
        return '[Twilio.IpMessaging.V1.UpdateMemberOptions ' . $options . ']';
    }
}
