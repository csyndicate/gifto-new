<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Chat
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class MemberOptions
{
    /**
     * @param string $roleSid The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     * @return CreateMemberOptions Options builder
     */
    public static function create(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel\CreateMemberOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel\CreateMemberOptions($roleSid);
    }
    /**
     * @param string[] $identity The [User](https://www.twilio.com/docs/api/chat/rest/v1/user)'s `identity` value of the resources to read. See [access tokens](https://www.twilio.com/docs/api/chat/guides/create-tokens) for more details.
     * @return ReadMemberOptions Options builder
     */
    public static function read(array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel\ReadMemberOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel\ReadMemberOptions($identity);
    }
    /**
     * @param string $roleSid The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     * @param int $lastConsumedMessageIndex The index of the last [Message](https://www.twilio.com/docs/api/chat/rest/messages) that the Member has read within the [Channel](https://www.twilio.com/docs/api/chat/rest/channels).
     * @return UpdateMemberOptions Options builder
     */
    public static function update(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, int $lastConsumedMessageIndex = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel\UpdateMemberOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Chat\V1\Service\Channel\UpdateMemberOptions($roleSid, $lastConsumedMessageIndex);
    }
}
class CreateMemberOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $roleSid The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     */
    public function __construct(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['roleSid'] = $roleSid;
    }
    /**
     * The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     *
     * @param string $roleSid The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
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
        return '[Twilio.Chat.V1.CreateMemberOptions ' . $options . ']';
    }
}
class ReadMemberOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string[] $identity The [User](https://www.twilio.com/docs/api/chat/rest/v1/user)'s `identity` value of the resources to read. See [access tokens](https://www.twilio.com/docs/api/chat/guides/create-tokens) for more details.
     */
    public function __construct(array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['identity'] = $identity;
    }
    /**
     * The [User](https://www.twilio.com/docs/api/chat/rest/v1/user)'s `identity` value of the resources to read. See [access tokens](https://www.twilio.com/docs/api/chat/guides/create-tokens) for more details.
     *
     * @param string[] $identity The [User](https://www.twilio.com/docs/api/chat/rest/v1/user)'s `identity` value of the resources to read. See [access tokens](https://www.twilio.com/docs/api/chat/guides/create-tokens) for more details.
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
        return '[Twilio.Chat.V1.ReadMemberOptions ' . $options . ']';
    }
}
class UpdateMemberOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $roleSid The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     * @param int $lastConsumedMessageIndex The index of the last [Message](https://www.twilio.com/docs/api/chat/rest/messages) that the Member has read within the [Channel](https://www.twilio.com/docs/api/chat/rest/channels).
     */
    public function __construct(string $roleSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, int $lastConsumedMessageIndex = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE)
    {
        $this->options['roleSid'] = $roleSid;
        $this->options['lastConsumedMessageIndex'] = $lastConsumedMessageIndex;
    }
    /**
     * The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     *
     * @param string $roleSid The SID of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) to assign to the member. The default roles are those specified on the [Service](https://www.twilio.com/docs/chat/api/services).
     * @return $this Fluent Builder
     */
    public function setRoleSid(string $roleSid) : self
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }
    /**
     * The index of the last [Message](https://www.twilio.com/docs/api/chat/rest/messages) that the Member has read within the [Channel](https://www.twilio.com/docs/api/chat/rest/channels).
     *
     * @param int $lastConsumedMessageIndex The index of the last [Message](https://www.twilio.com/docs/api/chat/rest/messages) that the Member has read within the [Channel](https://www.twilio.com/docs/api/chat/rest/channels).
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
        return '[Twilio.Chat.V1.UpdateMemberOptions ' . $options . ']';
    }
}
