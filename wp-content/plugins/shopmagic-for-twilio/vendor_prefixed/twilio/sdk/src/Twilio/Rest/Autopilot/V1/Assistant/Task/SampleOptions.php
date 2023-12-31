<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Autopilot
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class SampleOptions
{
    /**
     * @param string $sourceChannel The communication channel from which the new sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     * @return CreateSampleOptions Options builder
     */
    public static function create(string $sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\CreateSampleOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\CreateSampleOptions($sourceChannel);
    }
    /**
     * @param string $language The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     * @return ReadSampleOptions Options builder
     */
    public static function read(string $language = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\ReadSampleOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\ReadSampleOptions($language);
    }
    /**
     * @param string $language The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     * @param string $taggedText The text example of how end users might express the task. The sample can contain [Field tag blocks](https://www.twilio.com/docs/autopilot/api/task-sample#field-tagging).
     * @param string $sourceChannel The communication channel from which the sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     * @return UpdateSampleOptions Options builder
     */
    public static function update(string $language = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $taggedText = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\UpdateSampleOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\UpdateSampleOptions($language, $taggedText, $sourceChannel);
    }
}
class CreateSampleOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $sourceChannel The communication channel from which the new sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     */
    public function __construct(string $sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['sourceChannel'] = $sourceChannel;
    }
    /**
     * The communication channel from which the new sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     *
     * @param string $sourceChannel The communication channel from which the new sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     * @return $this Fluent Builder
     */
    public function setSourceChannel(string $sourceChannel) : self
    {
        $this->options['sourceChannel'] = $sourceChannel;
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
        return '[Twilio.Autopilot.V1.CreateSampleOptions ' . $options . ']';
    }
}
class ReadSampleOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $language The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     */
    public function __construct(string $language = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['language'] = $language;
    }
    /**
     * The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     *
     * @param string $language The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     * @return $this Fluent Builder
     */
    public function setLanguage(string $language) : self
    {
        $this->options['language'] = $language;
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
        return '[Twilio.Autopilot.V1.ReadSampleOptions ' . $options . ']';
    }
}
class UpdateSampleOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $language The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     * @param string $taggedText The text example of how end users might express the task. The sample can contain [Field tag blocks](https://www.twilio.com/docs/autopilot/api/task-sample#field-tagging).
     * @param string $sourceChannel The communication channel from which the sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     */
    public function __construct(string $language = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $taggedText = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['language'] = $language;
        $this->options['taggedText'] = $taggedText;
        $this->options['sourceChannel'] = $sourceChannel;
    }
    /**
     * The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     *
     * @param string $language The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     * @return $this Fluent Builder
     */
    public function setLanguage(string $language) : self
    {
        $this->options['language'] = $language;
        return $this;
    }
    /**
     * The text example of how end users might express the task. The sample can contain [Field tag blocks](https://www.twilio.com/docs/autopilot/api/task-sample#field-tagging).
     *
     * @param string $taggedText The text example of how end users might express the task. The sample can contain [Field tag blocks](https://www.twilio.com/docs/autopilot/api/task-sample#field-tagging).
     * @return $this Fluent Builder
     */
    public function setTaggedText(string $taggedText) : self
    {
        $this->options['taggedText'] = $taggedText;
        return $this;
    }
    /**
     * The communication channel from which the sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     *
     * @param string $sourceChannel The communication channel from which the sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     * @return $this Fluent Builder
     */
    public function setSourceChannel(string $sourceChannel) : self
    {
        $this->options['sourceChannel'] = $sourceChannel;
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
        return '[Twilio.Autopilot.V1.UpdateSampleOptions ' . $options . ']';
    }
}
