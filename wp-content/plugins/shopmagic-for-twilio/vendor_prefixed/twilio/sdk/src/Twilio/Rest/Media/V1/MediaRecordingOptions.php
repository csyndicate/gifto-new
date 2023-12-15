<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Media
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Media\V1;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class MediaRecordingOptions
{
    /**
     * @param string $order The sort order of the list by `date_created`. Can be: `asc` (ascending) or `desc` (descending) with `desc` as the default.
     * @param string $status Status to filter by, with possible values `processing`, `completed`, `deleted`, or `failed`.
     * @param string $processorSid SID of a MediaProcessor to filter by.
     * @param string $sourceSid SID of a MediaRecording source to filter by.
     * @return ReadMediaRecordingOptions Options builder
     */
    public static function read(string $order = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $processorSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $sourceSid = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\ReadMediaRecordingOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\ReadMediaRecordingOptions($order, $status, $processorSid, $sourceSid);
    }
}
class ReadMediaRecordingOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $order The sort order of the list by `date_created`. Can be: `asc` (ascending) or `desc` (descending) with `desc` as the default.
     * @param string $status Status to filter by, with possible values `processing`, `completed`, `deleted`, or `failed`.
     * @param string $processorSid SID of a MediaProcessor to filter by.
     * @param string $sourceSid SID of a MediaRecording source to filter by.
     */
    public function __construct(string $order = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $status = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $processorSid = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $sourceSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['order'] = $order;
        $this->options['status'] = $status;
        $this->options['processorSid'] = $processorSid;
        $this->options['sourceSid'] = $sourceSid;
    }
    /**
     * The sort order of the list by `date_created`. Can be: `asc` (ascending) or `desc` (descending) with `desc` as the default.
     *
     * @param string $order The sort order of the list by `date_created`. Can be: `asc` (ascending) or `desc` (descending) with `desc` as the default.
     * @return $this Fluent Builder
     */
    public function setOrder(string $order) : self
    {
        $this->options['order'] = $order;
        return $this;
    }
    /**
     * Status to filter by, with possible values `processing`, `completed`, `deleted`, or `failed`.
     *
     * @param string $status Status to filter by, with possible values `processing`, `completed`, `deleted`, or `failed`.
     * @return $this Fluent Builder
     */
    public function setStatus(string $status) : self
    {
        $this->options['status'] = $status;
        return $this;
    }
    /**
     * SID of a MediaProcessor to filter by.
     *
     * @param string $processorSid SID of a MediaProcessor to filter by.
     * @return $this Fluent Builder
     */
    public function setProcessorSid(string $processorSid) : self
    {
        $this->options['processorSid'] = $processorSid;
        return $this;
    }
    /**
     * SID of a MediaRecording source to filter by.
     *
     * @param string $sourceSid SID of a MediaRecording source to filter by.
     * @return $this Fluent Builder
     */
    public function setSourceSid(string $sourceSid) : self
    {
        $this->options['sourceSid'] = $sourceSid;
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
        return '[Twilio.Media.V1.ReadMediaRecordingOptions ' . $options . ']';
    }
}