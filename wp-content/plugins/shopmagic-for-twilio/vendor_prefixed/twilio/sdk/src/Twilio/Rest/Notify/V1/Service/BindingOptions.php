<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Notify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class BindingOptions
{
    /**
     * @param string[] $tag A tag that can be used to select the Bindings to notify. Repeat this parameter to specify more than one tag, up to a total of 20 tags.
     * @param string $notificationProtocolVersion The protocol version to use to send the notification. This defaults to the value of `default_xxxx_notification_protocol_version` for the protocol in the [Service](https://www.twilio.com/docs/notify/api/service-resource). The current version is `\\\"3\\\"` for `apn`, `fcm`, and `gcm` type Bindings. The parameter is not applicable to `sms` and `facebook-messenger` type Bindings as the data format is fixed.
     * @param string $credentialSid The SID of the [Credential](https://www.twilio.com/docs/notify/api/credential-resource) resource to be used to send notifications to this Binding. If present, this overrides the Credential specified in the Service resource. Applies to only `apn`, `fcm`, and `gcm` type Bindings.
     * @param string $endpoint Deprecated.
     * @return CreateBindingOptions Options builder
     */
    public static function create(array $tag = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, string $notificationProtocolVersion = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $credentialSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $endpoint = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\CreateBindingOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\CreateBindingOptions($tag, $notificationProtocolVersion, $credentialSid, $endpoint);
    }
    /**
     * @param \DateTime $startDate Only include usage that has occurred on or after this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     * @param \DateTime $endDate Only include usage that occurred on or before this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     * @param string[] $identity The [User](https://www.twilio.com/docs/chat/rest/user-resource)'s `identity` value of the resources to read.
     * @param string[] $tag Only list Bindings that have all of the specified Tags. The following implicit tags are available: `all`, `apn`, `fcm`, `gcm`, `sms`, `facebook-messenger`. Up to 5 tags are allowed.
     * @return ReadBindingOptions Options builder
     */
    public static function read(\DateTime $startDate = null, \DateTime $endDate = null, array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, array $tag = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\ReadBindingOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\Service\ReadBindingOptions($startDate, $endDate, $identity, $tag);
    }
}
class CreateBindingOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string[] $tag A tag that can be used to select the Bindings to notify. Repeat this parameter to specify more than one tag, up to a total of 20 tags.
     * @param string $notificationProtocolVersion The protocol version to use to send the notification. This defaults to the value of `default_xxxx_notification_protocol_version` for the protocol in the [Service](https://www.twilio.com/docs/notify/api/service-resource). The current version is `\\\"3\\\"` for `apn`, `fcm`, and `gcm` type Bindings. The parameter is not applicable to `sms` and `facebook-messenger` type Bindings as the data format is fixed.
     * @param string $credentialSid The SID of the [Credential](https://www.twilio.com/docs/notify/api/credential-resource) resource to be used to send notifications to this Binding. If present, this overrides the Credential specified in the Service resource. Applies to only `apn`, `fcm`, and `gcm` type Bindings.
     * @param string $endpoint Deprecated.
     */
    public function __construct(array $tag = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, string $notificationProtocolVersion = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $credentialSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $endpoint = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['tag'] = $tag;
        $this->options['notificationProtocolVersion'] = $notificationProtocolVersion;
        $this->options['credentialSid'] = $credentialSid;
        $this->options['endpoint'] = $endpoint;
    }
    /**
     * A tag that can be used to select the Bindings to notify. Repeat this parameter to specify more than one tag, up to a total of 20 tags.
     *
     * @param string[] $tag A tag that can be used to select the Bindings to notify. Repeat this parameter to specify more than one tag, up to a total of 20 tags.
     * @return $this Fluent Builder
     */
    public function setTag(array $tag) : self
    {
        $this->options['tag'] = $tag;
        return $this;
    }
    /**
     * The protocol version to use to send the notification. This defaults to the value of `default_xxxx_notification_protocol_version` for the protocol in the [Service](https://www.twilio.com/docs/notify/api/service-resource). The current version is `\\\"3\\\"` for `apn`, `fcm`, and `gcm` type Bindings. The parameter is not applicable to `sms` and `facebook-messenger` type Bindings as the data format is fixed.
     *
     * @param string $notificationProtocolVersion The protocol version to use to send the notification. This defaults to the value of `default_xxxx_notification_protocol_version` for the protocol in the [Service](https://www.twilio.com/docs/notify/api/service-resource). The current version is `\\\"3\\\"` for `apn`, `fcm`, and `gcm` type Bindings. The parameter is not applicable to `sms` and `facebook-messenger` type Bindings as the data format is fixed.
     * @return $this Fluent Builder
     */
    public function setNotificationProtocolVersion(string $notificationProtocolVersion) : self
    {
        $this->options['notificationProtocolVersion'] = $notificationProtocolVersion;
        return $this;
    }
    /**
     * The SID of the [Credential](https://www.twilio.com/docs/notify/api/credential-resource) resource to be used to send notifications to this Binding. If present, this overrides the Credential specified in the Service resource. Applies to only `apn`, `fcm`, and `gcm` type Bindings.
     *
     * @param string $credentialSid The SID of the [Credential](https://www.twilio.com/docs/notify/api/credential-resource) resource to be used to send notifications to this Binding. If present, this overrides the Credential specified in the Service resource. Applies to only `apn`, `fcm`, and `gcm` type Bindings.
     * @return $this Fluent Builder
     */
    public function setCredentialSid(string $credentialSid) : self
    {
        $this->options['credentialSid'] = $credentialSid;
        return $this;
    }
    /**
     * Deprecated.
     *
     * @param string $endpoint Deprecated.
     * @return $this Fluent Builder
     */
    public function setEndpoint(string $endpoint) : self
    {
        $this->options['endpoint'] = $endpoint;
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
        return '[Twilio.Notify.V1.CreateBindingOptions ' . $options . ']';
    }
}
class ReadBindingOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param \DateTime $startDate Only include usage that has occurred on or after this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     * @param \DateTime $endDate Only include usage that occurred on or before this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     * @param string[] $identity The [User](https://www.twilio.com/docs/chat/rest/user-resource)'s `identity` value of the resources to read.
     * @param string[] $tag Only list Bindings that have all of the specified Tags. The following implicit tags are available: `all`, `apn`, `fcm`, `gcm`, `sms`, `facebook-messenger`. Up to 5 tags are allowed.
     */
    public function __construct(\DateTime $startDate = null, \DateTime $endDate = null, array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, array $tag = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['startDate'] = $startDate;
        $this->options['endDate'] = $endDate;
        $this->options['identity'] = $identity;
        $this->options['tag'] = $tag;
    }
    /**
     * Only include usage that has occurred on or after this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     *
     * @param \DateTime $startDate Only include usage that has occurred on or after this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     * @return $this Fluent Builder
     */
    public function setStartDate(\DateTime $startDate) : self
    {
        $this->options['startDate'] = $startDate;
        return $this;
    }
    /**
     * Only include usage that occurred on or before this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     *
     * @param \DateTime $endDate Only include usage that occurred on or before this date. Specify the date in GMT and format as `YYYY-MM-DD`.
     * @return $this Fluent Builder
     */
    public function setEndDate(\DateTime $endDate) : self
    {
        $this->options['endDate'] = $endDate;
        return $this;
    }
    /**
     * The [User](https://www.twilio.com/docs/chat/rest/user-resource)'s `identity` value of the resources to read.
     *
     * @param string[] $identity The [User](https://www.twilio.com/docs/chat/rest/user-resource)'s `identity` value of the resources to read.
     * @return $this Fluent Builder
     */
    public function setIdentity(array $identity) : self
    {
        $this->options['identity'] = $identity;
        return $this;
    }
    /**
     * Only list Bindings that have all of the specified Tags. The following implicit tags are available: `all`, `apn`, `fcm`, `gcm`, `sms`, `facebook-messenger`. Up to 5 tags are allowed.
     *
     * @param string[] $tag Only list Bindings that have all of the specified Tags. The following implicit tags are available: `all`, `apn`, `fcm`, `gcm`, `sms`, `facebook-messenger`. Up to 5 tags are allowed.
     * @return $this Fluent Builder
     */
    public function setTag(array $tag) : self
    {
        $this->options['tag'] = $tag;
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
        return '[Twilio.Notify.V1.ReadBindingOptions ' . $options . ']';
    }
}