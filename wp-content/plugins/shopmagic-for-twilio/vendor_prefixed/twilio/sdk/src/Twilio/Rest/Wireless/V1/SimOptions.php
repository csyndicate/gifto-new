<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Wireless
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Wireless\V1;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class SimOptions
{
    /**
     * @param string $status Only return Sim resources with this status.
     * @param string $iccid Only return Sim resources with this ICCID. This will return a list with a maximum size of 1.
     * @param string $ratePlan The SID or unique name of a [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource). Only return Sim resources assigned to this RatePlan resource.
     * @param string $eId Deprecated.
     * @param string $simRegistrationCode Only return Sim resources with this registration code. This will return a list with a maximum size of 1.
     * @return ReadSimOptions Options builder
     */
    public static function read(string $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $iccid = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $ratePlan = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $eId = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $simRegistrationCode = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Wireless\V1\ReadSimOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Wireless\V1\ReadSimOptions($status, $iccid, $ratePlan, $eId, $simRegistrationCode);
    }
    /**
     * @param string $uniqueName An application-defined string that uniquely identifies the resource. It can be used in place of the `sid` in the URL path to address the resource.
     * @param string $callbackMethod The HTTP method we should use to call `callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     * @param string $callbackUrl The URL we should call using the `callback_url` when the SIM has finished updating. When the SIM transitions from `new` to `ready` or from any status to `deactivated`, we call this URL when the status changes to an intermediate status (`ready` or `deactivated`) and again when the status changes to its final status (`active` or `canceled`).
     * @param string $friendlyName A descriptive string that you create to describe the Sim resource. It does not need to be unique.
     * @param string $ratePlan The SID or unique name of the [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource) to which the Sim resource should be assigned.
     * @param string $status
     * @param string $commandsCallbackMethod The HTTP method we should use to call `commands_callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     * @param string $commandsCallbackUrl The URL we should call using the `commands_callback_method` when the SIM sends a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource). Your server should respond with an HTTP status code in the 200 range; any response body is ignored.
     * @param string $smsFallbackMethod The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`. Default is `POST`.
     * @param string $smsFallbackUrl The URL we should call using the `sms_fallback_method` when an error occurs while retrieving or executing the TwiML requested from `sms_url`.
     * @param string $smsMethod The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`. Default is `POST`.
     * @param string $smsUrl The URL we should call using the `sms_method` when the SIM-connected device sends an SMS message that is not a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource).
     * @param string $voiceFallbackMethod Deprecated.
     * @param string $voiceFallbackUrl Deprecated.
     * @param string $voiceMethod Deprecated.
     * @param string $voiceUrl Deprecated.
     * @param string $resetStatus
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) to which the Sim resource should belong. The Account SID can only be that of the requesting Account or that of a [Subaccount](https://www.twilio.com/docs/iam/api/subaccounts) of the requesting Account. Only valid when the Sim resource's status is `new`. For more information, see the [Move SIMs between Subaccounts documentation](https://www.twilio.com/docs/iot/wireless/api/sim-resource#move-sims-between-subaccounts).
     * @return UpdateSimOptions Options builder
     */
    public static function update(string $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $callbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $callbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $ratePlan = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $commandsCallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $commandsCallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceFallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceFallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $resetStatus = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $accountSid = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Wireless\V1\UpdateSimOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Wireless\V1\UpdateSimOptions($uniqueName, $callbackMethod, $callbackUrl, $friendlyName, $ratePlan, $status, $commandsCallbackMethod, $commandsCallbackUrl, $smsFallbackMethod, $smsFallbackUrl, $smsMethod, $smsUrl, $voiceFallbackMethod, $voiceFallbackUrl, $voiceMethod, $voiceUrl, $resetStatus, $accountSid);
    }
}
class ReadSimOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $status Only return Sim resources with this status.
     * @param string $iccid Only return Sim resources with this ICCID. This will return a list with a maximum size of 1.
     * @param string $ratePlan The SID or unique name of a [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource). Only return Sim resources assigned to this RatePlan resource.
     * @param string $eId Deprecated.
     * @param string $simRegistrationCode Only return Sim resources with this registration code. This will return a list with a maximum size of 1.
     */
    public function __construct(string $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $iccid = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $ratePlan = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $eId = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $simRegistrationCode = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['status'] = $status;
        $this->options['iccid'] = $iccid;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['eId'] = $eId;
        $this->options['simRegistrationCode'] = $simRegistrationCode;
    }
    /**
     * Only return Sim resources with this status.
     *
     * @param string $status Only return Sim resources with this status.
     * @return $this Fluent Builder
     */
    public function setStatus(string $status) : self
    {
        $this->options['status'] = $status;
        return $this;
    }
    /**
     * Only return Sim resources with this ICCID. This will return a list with a maximum size of 1.
     *
     * @param string $iccid Only return Sim resources with this ICCID. This will return a list with a maximum size of 1.
     * @return $this Fluent Builder
     */
    public function setIccid(string $iccid) : self
    {
        $this->options['iccid'] = $iccid;
        return $this;
    }
    /**
     * The SID or unique name of a [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource). Only return Sim resources assigned to this RatePlan resource.
     *
     * @param string $ratePlan The SID or unique name of a [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource). Only return Sim resources assigned to this RatePlan resource.
     * @return $this Fluent Builder
     */
    public function setRatePlan(string $ratePlan) : self
    {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }
    /**
     * Deprecated.
     *
     * @param string $eId Deprecated.
     * @return $this Fluent Builder
     */
    public function setEId(string $eId) : self
    {
        $this->options['eId'] = $eId;
        return $this;
    }
    /**
     * Only return Sim resources with this registration code. This will return a list with a maximum size of 1.
     *
     * @param string $simRegistrationCode Only return Sim resources with this registration code. This will return a list with a maximum size of 1.
     * @return $this Fluent Builder
     */
    public function setSimRegistrationCode(string $simRegistrationCode) : self
    {
        $this->options['simRegistrationCode'] = $simRegistrationCode;
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
        return '[Twilio.Wireless.V1.ReadSimOptions ' . $options . ']';
    }
}
class UpdateSimOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $uniqueName An application-defined string that uniquely identifies the resource. It can be used in place of the `sid` in the URL path to address the resource.
     * @param string $callbackMethod The HTTP method we should use to call `callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     * @param string $callbackUrl The URL we should call using the `callback_url` when the SIM has finished updating. When the SIM transitions from `new` to `ready` or from any status to `deactivated`, we call this URL when the status changes to an intermediate status (`ready` or `deactivated`) and again when the status changes to its final status (`active` or `canceled`).
     * @param string $friendlyName A descriptive string that you create to describe the Sim resource. It does not need to be unique.
     * @param string $ratePlan The SID or unique name of the [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource) to which the Sim resource should be assigned.
     * @param string $status
     * @param string $commandsCallbackMethod The HTTP method we should use to call `commands_callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     * @param string $commandsCallbackUrl The URL we should call using the `commands_callback_method` when the SIM sends a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource). Your server should respond with an HTTP status code in the 200 range; any response body is ignored.
     * @param string $smsFallbackMethod The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`. Default is `POST`.
     * @param string $smsFallbackUrl The URL we should call using the `sms_fallback_method` when an error occurs while retrieving or executing the TwiML requested from `sms_url`.
     * @param string $smsMethod The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`. Default is `POST`.
     * @param string $smsUrl The URL we should call using the `sms_method` when the SIM-connected device sends an SMS message that is not a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource).
     * @param string $voiceFallbackMethod Deprecated.
     * @param string $voiceFallbackUrl Deprecated.
     * @param string $voiceMethod Deprecated.
     * @param string $voiceUrl Deprecated.
     * @param string $resetStatus
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) to which the Sim resource should belong. The Account SID can only be that of the requesting Account or that of a [Subaccount](https://www.twilio.com/docs/iam/api/subaccounts) of the requesting Account. Only valid when the Sim resource's status is `new`. For more information, see the [Move SIMs between Subaccounts documentation](https://www.twilio.com/docs/iot/wireless/api/sim-resource#move-sims-between-subaccounts).
     */
    public function __construct(string $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $callbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $callbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $ratePlan = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $commandsCallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $commandsCallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsFallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $smsUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceFallbackMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceFallbackUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $voiceUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $resetStatus = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $accountSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['status'] = $status;
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['resetStatus'] = $resetStatus;
        $this->options['accountSid'] = $accountSid;
    }
    /**
     * An application-defined string that uniquely identifies the resource. It can be used in place of the `sid` in the URL path to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely identifies the resource. It can be used in place of the `sid` in the URL path to address the resource.
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName) : self
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }
    /**
     * The HTTP method we should use to call `callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     *
     * @param string $callbackMethod The HTTP method we should use to call `callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     * @return $this Fluent Builder
     */
    public function setCallbackMethod(string $callbackMethod) : self
    {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }
    /**
     * The URL we should call using the `callback_url` when the SIM has finished updating. When the SIM transitions from `new` to `ready` or from any status to `deactivated`, we call this URL when the status changes to an intermediate status (`ready` or `deactivated`) and again when the status changes to its final status (`active` or `canceled`).
     *
     * @param string $callbackUrl The URL we should call using the `callback_url` when the SIM has finished updating. When the SIM transitions from `new` to `ready` or from any status to `deactivated`, we call this URL when the status changes to an intermediate status (`ready` or `deactivated`) and again when the status changes to its final status (`active` or `canceled`).
     * @return $this Fluent Builder
     */
    public function setCallbackUrl(string $callbackUrl) : self
    {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }
    /**
     * A descriptive string that you create to describe the Sim resource. It does not need to be unique.
     *
     * @param string $friendlyName A descriptive string that you create to describe the Sim resource. It does not need to be unique.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The SID or unique name of the [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource) to which the Sim resource should be assigned.
     *
     * @param string $ratePlan The SID or unique name of the [RatePlan resource](https://www.twilio.com/docs/iot/wireless/api/rateplan-resource) to which the Sim resource should be assigned.
     * @return $this Fluent Builder
     */
    public function setRatePlan(string $ratePlan) : self
    {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }
    /**
     * @param string $status
     * @return $this Fluent Builder
     */
    public function setStatus(string $status) : self
    {
        $this->options['status'] = $status;
        return $this;
    }
    /**
     * The HTTP method we should use to call `commands_callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     *
     * @param string $commandsCallbackMethod The HTTP method we should use to call `commands_callback_url`. Can be: `POST` or `GET`. The default is `POST`.
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackMethod(string $commandsCallbackMethod) : self
    {
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        return $this;
    }
    /**
     * The URL we should call using the `commands_callback_method` when the SIM sends a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource). Your server should respond with an HTTP status code in the 200 range; any response body is ignored.
     *
     * @param string $commandsCallbackUrl The URL we should call using the `commands_callback_method` when the SIM sends a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource). Your server should respond with an HTTP status code in the 200 range; any response body is ignored.
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackUrl(string $commandsCallbackUrl) : self
    {
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        return $this;
    }
    /**
     * The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`. Default is `POST`.
     *
     * @param string $smsFallbackMethod The HTTP method we should use to call `sms_fallback_url`. Can be: `GET` or `POST`. Default is `POST`.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod(string $smsFallbackMethod) : self
    {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }
    /**
     * The URL we should call using the `sms_fallback_method` when an error occurs while retrieving or executing the TwiML requested from `sms_url`.
     *
     * @param string $smsFallbackUrl The URL we should call using the `sms_fallback_method` when an error occurs while retrieving or executing the TwiML requested from `sms_url`.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl(string $smsFallbackUrl) : self
    {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }
    /**
     * The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`. Default is `POST`.
     *
     * @param string $smsMethod The HTTP method we should use to call `sms_url`. Can be: `GET` or `POST`. Default is `POST`.
     * @return $this Fluent Builder
     */
    public function setSmsMethod(string $smsMethod) : self
    {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }
    /**
     * The URL we should call using the `sms_method` when the SIM-connected device sends an SMS message that is not a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource).
     *
     * @param string $smsUrl The URL we should call using the `sms_method` when the SIM-connected device sends an SMS message that is not a [Command](https://www.twilio.com/docs/iot/wireless/api/command-resource).
     * @return $this Fluent Builder
     */
    public function setSmsUrl(string $smsUrl) : self
    {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }
    /**
     * Deprecated.
     *
     * @param string $voiceFallbackMethod Deprecated.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod(string $voiceFallbackMethod) : self
    {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }
    /**
     * Deprecated.
     *
     * @param string $voiceFallbackUrl Deprecated.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl(string $voiceFallbackUrl) : self
    {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }
    /**
     * Deprecated.
     *
     * @param string $voiceMethod Deprecated.
     * @return $this Fluent Builder
     */
    public function setVoiceMethod(string $voiceMethod) : self
    {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }
    /**
     * Deprecated.
     *
     * @param string $voiceUrl Deprecated.
     * @return $this Fluent Builder
     */
    public function setVoiceUrl(string $voiceUrl) : self
    {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }
    /**
     * @param string $resetStatus
     * @return $this Fluent Builder
     */
    public function setResetStatus(string $resetStatus) : self
    {
        $this->options['resetStatus'] = $resetStatus;
        return $this;
    }
    /**
     * The SID of the [Account](https://www.twilio.com/docs/iam/api/account) to which the Sim resource should belong. The Account SID can only be that of the requesting Account or that of a [Subaccount](https://www.twilio.com/docs/iam/api/subaccounts) of the requesting Account. Only valid when the Sim resource's status is `new`. For more information, see the [Move SIMs between Subaccounts documentation](https://www.twilio.com/docs/iot/wireless/api/sim-resource#move-sims-between-subaccounts).
     *
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) to which the Sim resource should belong. The Account SID can only be that of the requesting Account or that of a [Subaccount](https://www.twilio.com/docs/iam/api/subaccounts) of the requesting Account. Only valid when the Sim resource's status is `new`. For more information, see the [Move SIMs between Subaccounts documentation](https://www.twilio.com/docs/iot/wireless/api/sim-resource#move-sims-between-subaccounts).
     * @return $this Fluent Builder
     */
    public function setAccountSid(string $accountSid) : self
    {
        $this->options['accountSid'] = $accountSid;
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
        return '[Twilio.Wireless.V1.UpdateSimOptions ' . $options . ']';
    }
}