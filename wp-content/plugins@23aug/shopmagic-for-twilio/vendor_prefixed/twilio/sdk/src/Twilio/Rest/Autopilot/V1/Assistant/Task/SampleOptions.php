<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class SampleOptions
{
    /**
     * @param string $language The ISO language-country string that specifies the
     *                         language used for the sample
     * @return ReadSampleOptions Options builder
     */
    public static function read($language = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\ReadSampleOptions($language);
    }
    /**
     * @param string $sourceChannel The communication channel from which the new
     *                              sample was captured
     * @return CreateSampleOptions Options builder
     */
    public static function create($sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\CreateSampleOptions($sourceChannel);
    }
    /**
     * @param string $language The ISO language-country string that specifies the
     *                         language used for the sample
     * @param string $taggedText The text example of how end users might express
     *                           the task
     * @param string $sourceChannel The communication channel from which the sample
     *                              was captured
     * @return UpdateSampleOptions Options builder
     */
    public static function update($language = \ShopMagicTwilioVendor\Twilio\Values::NONE, $taggedText = \ShopMagicTwilioVendor\Twilio\Values::NONE, $sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\Assistant\Task\UpdateSampleOptions($language, $taggedText, $sourceChannel);
    }
}
class ReadSampleOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $language The ISO language-country string that specifies the
     *                         language used for the sample
     */
    public function __construct($language = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['language'] = $language;
    }
    /**
     * The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     *
     * @param string $language The ISO language-country string that specifies the
     *                         language used for the sample
     * @return $this Fluent Builder
     */
    public function setLanguage($language)
    {
        $this->options['language'] = $language;
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
        return '[Twilio.Autopilot.V1.ReadSampleOptions ' . \implode(' ', $options) . ']';
    }
}
class CreateSampleOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $sourceChannel The communication channel from which the new
     *                              sample was captured
     */
    public function __construct($sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['sourceChannel'] = $sourceChannel;
    }
    /**
     * The communication channel from which the new sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     *
     * @param string $sourceChannel The communication channel from which the new
     *                              sample was captured
     * @return $this Fluent Builder
     */
    public function setSourceChannel($sourceChannel)
    {
        $this->options['sourceChannel'] = $sourceChannel;
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
        return '[Twilio.Autopilot.V1.CreateSampleOptions ' . \implode(' ', $options) . ']';
    }
}
class UpdateSampleOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $language The ISO language-country string that specifies the
     *                         language used for the sample
     * @param string $taggedText The text example of how end users might express
     *                           the task
     * @param string $sourceChannel The communication channel from which the sample
     *                              was captured
     */
    public function __construct($language = \ShopMagicTwilioVendor\Twilio\Values::NONE, $taggedText = \ShopMagicTwilioVendor\Twilio\Values::NONE, $sourceChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['language'] = $language;
        $this->options['taggedText'] = $taggedText;
        $this->options['sourceChannel'] = $sourceChannel;
    }
    /**
     * The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) string that specifies the language used for the sample. For example: `en-US`.
     *
     * @param string $language The ISO language-country string that specifies the
     *                         language used for the sample
     * @return $this Fluent Builder
     */
    public function setLanguage($language)
    {
        $this->options['language'] = $language;
        return $this;
    }
    /**
     * The text example of how end users might express the task. The sample can contain [Field tag blocks](https://www.twilio.com/docs/autopilot/api/task-sample#field-tagging).
     *
     * @param string $taggedText The text example of how end users might express
     *                           the task
     * @return $this Fluent Builder
     */
    public function setTaggedText($taggedText)
    {
        $this->options['taggedText'] = $taggedText;
        return $this;
    }
    /**
     * The communication channel from which the sample was captured. Can be: `voice`, `sms`, `chat`, `alexa`, `google-assistant`, `slack`, or null if not included.
     *
     * @param string $sourceChannel The communication channel from which the sample
     *                              was captured
     * @return $this Fluent Builder
     */
    public function setSourceChannel($sourceChannel)
    {
        $this->options['sourceChannel'] = $sourceChannel;
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
        return '[Twilio.Autopilot.V1.UpdateSampleOptions ' . \implode(' ', $options) . ']';
    }
}
