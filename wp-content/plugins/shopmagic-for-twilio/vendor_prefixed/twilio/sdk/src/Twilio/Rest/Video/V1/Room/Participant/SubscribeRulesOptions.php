<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Video
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class SubscribeRulesOptions
{
    /**
     * @param array $rules A JSON-encoded array of subscribe rules. See the [Specifying Subscribe Rules](https://www.twilio.com/docs/video/api/track-subscriptions#specifying-sr) section for further information.
     * @return UpdateSubscribeRulesOptions Options builder
     */
    public static function update(array $rules = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant\UpdateSubscribeRulesOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Video\V1\Room\Participant\UpdateSubscribeRulesOptions($rules);
    }
}
class UpdateSubscribeRulesOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param array $rules A JSON-encoded array of subscribe rules. See the [Specifying Subscribe Rules](https://www.twilio.com/docs/video/api/track-subscriptions#specifying-sr) section for further information.
     */
    public function __construct(array $rules = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['rules'] = $rules;
    }
    /**
     * A JSON-encoded array of subscribe rules. See the [Specifying Subscribe Rules](https://www.twilio.com/docs/video/api/track-subscriptions#specifying-sr) section for further information.
     *
     * @param array $rules A JSON-encoded array of subscribe rules. See the [Specifying Subscribe Rules](https://www.twilio.com/docs/video/api/track-subscriptions#specifying-sr) section for further information.
     * @return $this Fluent Builder
     */
    public function setRules(array $rules) : self
    {
        $this->options['rules'] = $rules;
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
        return '[Twilio.Video.V1.UpdateSubscribeRulesOptions ' . $options . ']';
    }
}