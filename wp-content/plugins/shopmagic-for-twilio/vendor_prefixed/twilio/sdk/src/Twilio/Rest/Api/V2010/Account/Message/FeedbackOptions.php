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
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class FeedbackOptions
{
    /**
     * @param string $outcome
     * @return CreateFeedbackOptions Options builder
     */
    public static function create(string $outcome = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message\CreateFeedbackOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Message\CreateFeedbackOptions($outcome);
    }
}
class CreateFeedbackOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $outcome
     */
    public function __construct(string $outcome = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['outcome'] = $outcome;
    }
    /**
     * @param string $outcome
     * @return $this Fluent Builder
     */
    public function setOutcome(string $outcome) : self
    {
        $this->options['outcome'] = $outcome;
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
        return '[Twilio.Api.V2010.CreateFeedbackOptions ' . $options . ']';
    }
}
