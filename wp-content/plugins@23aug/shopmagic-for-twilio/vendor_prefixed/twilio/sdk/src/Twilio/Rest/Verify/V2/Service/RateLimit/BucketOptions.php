<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class BucketOptions
{
    /**
     * @param int $max Max number of requests.
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     * @return UpdateBucketOptions Options builder
     */
    public static function update($max = \ShopMagicTwilioVendor\Twilio\Values::NONE, $interval = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Verify\V2\Service\RateLimit\UpdateBucketOptions($max, $interval);
    }
}
class UpdateBucketOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param int $max Max number of requests.
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     */
    public function __construct($max = \ShopMagicTwilioVendor\Twilio\Values::NONE, $interval = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['max'] = $max;
        $this->options['interval'] = $interval;
    }
    /**
     * Maximum number of requests permitted in during the interval.
     *
     * @param int $max Max number of requests.
     * @return $this Fluent Builder
     */
    public function setMax($max)
    {
        $this->options['max'] = $max;
        return $this;
    }
    /**
     * Number of seconds that the rate limit will be enforced over.
     *
     * @param int $interval Number of seconds that the rate limit will be enforced
     *                      over.
     * @return $this Fluent Builder
     */
    public function setInterval($interval)
    {
        $this->options['interval'] = $interval;
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
        return '[Twilio.Verify.V2.UpdateBucketOptions ' . \implode(' ', $options) . ']';
    }
}
