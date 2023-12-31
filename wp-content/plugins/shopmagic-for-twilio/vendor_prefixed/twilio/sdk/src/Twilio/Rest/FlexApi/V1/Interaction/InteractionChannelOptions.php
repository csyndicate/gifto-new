<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\Interaction;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class InteractionChannelOptions
{
    /**
     * @param array $routing It changes the state of associated tasks. Routing status is required, When the channel status is set to `inactive`. Allowed Value for routing status is `closed`. Otherwise Optional, if not specified, all tasks will be set to `wrapping`.
     * @return UpdateInteractionChannelOptions Options builder
     */
    public static function update(array $routing = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\Interaction\UpdateInteractionChannelOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\Interaction\UpdateInteractionChannelOptions($routing);
    }
}
class UpdateInteractionChannelOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param array $routing It changes the state of associated tasks. Routing status is required, When the channel status is set to `inactive`. Allowed Value for routing status is `closed`. Otherwise Optional, if not specified, all tasks will be set to `wrapping`.
     */
    public function __construct(array $routing = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['routing'] = $routing;
    }
    /**
     * It changes the state of associated tasks. Routing status is required, When the channel status is set to `inactive`. Allowed Value for routing status is `closed`. Otherwise Optional, if not specified, all tasks will be set to `wrapping`.
     *
     * @param array $routing It changes the state of associated tasks. Routing status is required, When the channel status is set to `inactive`. Allowed Value for routing status is `closed`. Otherwise Optional, if not specified, all tasks will be set to `wrapping`.
     * @return $this Fluent Builder
     */
    public function setRouting(array $routing) : self
    {
        $this->options['routing'] = $routing;
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
        return '[Twilio.FlexApi.V1.UpdateInteractionChannelOptions ' . $options . ']';
    }
}
