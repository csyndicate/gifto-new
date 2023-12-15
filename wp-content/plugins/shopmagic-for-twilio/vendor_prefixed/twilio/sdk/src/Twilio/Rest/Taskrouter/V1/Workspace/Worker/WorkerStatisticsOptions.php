<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Taskrouter
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class WorkerStatisticsOptions
{
    /**
     * @param int $minutes Only calculate statistics since this many minutes in the past. The default 15 minutes. This is helpful for displaying statistics for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends.
     * @param \DateTime $startDate Only calculate statistics from this date and time and later, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     * @param \DateTime $endDate Only include usage that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     * @param string $taskChannel Only calculate statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     * @return FetchWorkerStatisticsOptions Options builder
     */
    public static function fetch(int $minutes = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE, \DateTime $startDate = null, \DateTime $endDate = null, string $taskChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\FetchWorkerStatisticsOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker\FetchWorkerStatisticsOptions($minutes, $startDate, $endDate, $taskChannel);
    }
}
class FetchWorkerStatisticsOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param int $minutes Only calculate statistics since this many minutes in the past. The default 15 minutes. This is helpful for displaying statistics for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends.
     * @param \DateTime $startDate Only calculate statistics from this date and time and later, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     * @param \DateTime $endDate Only include usage that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     * @param string $taskChannel Only calculate statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     */
    public function __construct(int $minutes = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE, \DateTime $startDate = null, \DateTime $endDate = null, string $taskChannel = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['minutes'] = $minutes;
        $this->options['startDate'] = $startDate;
        $this->options['endDate'] = $endDate;
        $this->options['taskChannel'] = $taskChannel;
    }
    /**
     * Only calculate statistics since this many minutes in the past. The default 15 minutes. This is helpful for displaying statistics for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends.
     *
     * @param int $minutes Only calculate statistics since this many minutes in the past. The default 15 minutes. This is helpful for displaying statistics for the last 15 minutes, 240 minutes (4 hours), and 480 minutes (8 hours) to see trends.
     * @return $this Fluent Builder
     */
    public function setMinutes(int $minutes) : self
    {
        $this->options['minutes'] = $minutes;
        return $this;
    }
    /**
     * Only calculate statistics from this date and time and later, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $startDate Only calculate statistics from this date and time and later, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     * @return $this Fluent Builder
     */
    public function setStartDate(\DateTime $startDate) : self
    {
        $this->options['startDate'] = $startDate;
        return $this;
    }
    /**
     * Only include usage that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     *
     * @param \DateTime $endDate Only include usage that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     * @return $this Fluent Builder
     */
    public function setEndDate(\DateTime $endDate) : self
    {
        $this->options['endDate'] = $endDate;
        return $this;
    }
    /**
     * Only calculate statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     *
     * @param string $taskChannel Only calculate statistics on this TaskChannel. Can be the TaskChannel's SID or its `unique_name`, such as `voice`, `sms`, or `default`.
     * @return $this Fluent Builder
     */
    public function setTaskChannel(string $taskChannel) : self
    {
        $this->options['taskChannel'] = $taskChannel;
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
        return '[Twilio.Taskrouter.V1.FetchWorkerStatisticsOptions ' . $options . ']';
    }
}