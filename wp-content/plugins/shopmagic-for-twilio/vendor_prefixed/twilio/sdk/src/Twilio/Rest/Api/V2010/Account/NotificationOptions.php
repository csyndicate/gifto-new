<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class NotificationOptions
{
    /**
     * @param int $log Only read notifications of the specified log level. Can be:  `0` to read only ERROR notifications or `1` to read only WARNING notifications. By default, all notifications are read.
     * @param string $messageDateBefore Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @param string $messageDate Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @param string $messageDateAfter Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @return ReadNotificationOptions Options builder
     */
    public static function read(int $log = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE, string $messageDateBefore = null, string $messageDate = null, string $messageDateAfter = null) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ReadNotificationOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\ReadNotificationOptions($log, $messageDateBefore, $messageDate, $messageDateAfter);
    }
}
class ReadNotificationOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param int $log Only read notifications of the specified log level. Can be:  `0` to read only ERROR notifications or `1` to read only WARNING notifications. By default, all notifications are read.
     * @param string $messageDateBefore Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @param string $messageDate Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @param string $messageDateAfter Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     */
    public function __construct(int $log = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE, string $messageDateBefore = null, string $messageDate = null, string $messageDateAfter = null)
    {
        $this->options['log'] = $log;
        $this->options['messageDateBefore'] = $messageDateBefore;
        $this->options['messageDate'] = $messageDate;
        $this->options['messageDateAfter'] = $messageDateAfter;
    }
    /**
     * Only read notifications of the specified log level. Can be:  `0` to read only ERROR notifications or `1` to read only WARNING notifications. By default, all notifications are read.
     *
     * @param int $log Only read notifications of the specified log level. Can be:  `0` to read only ERROR notifications or `1` to read only WARNING notifications. By default, all notifications are read.
     * @return $this Fluent Builder
     */
    public function setLog(int $log) : self
    {
        $this->options['log'] = $log;
        return $this;
    }
    /**
     * Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     *
     * @param string $messageDateBefore Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @return $this Fluent Builder
     */
    public function setMessageDateBefore(string $messageDateBefore) : self
    {
        $this->options['messageDateBefore'] = $messageDateBefore;
        return $this;
    }
    /**
     * Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     *
     * @param string $messageDate Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @return $this Fluent Builder
     */
    public function setMessageDate(string $messageDate) : self
    {
        $this->options['messageDate'] = $messageDate;
        return $this;
    }
    /**
     * Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     *
     * @param string $messageDateAfter Only show notifications for the specified date, formatted as `YYYY-MM-DD`. You can also specify an inequality, such as `<=YYYY-MM-DD` for messages logged at or before midnight on a date, or `>=YYYY-MM-DD` for messages logged at or after midnight on a date.
     * @return $this Fluent Builder
     */
    public function setMessageDateAfter(string $messageDateAfter) : self
    {
        $this->options['messageDateAfter'] = $messageDateAfter;
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
        return '[Twilio.Api.V2010.ReadNotificationOptions ' . $options . ']';
    }
}
