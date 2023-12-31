<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Ip_messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class BindingOptions
{
    /**
     * @param string $bindingType 
     * @param string[] $identity 
     * @return ReadBindingOptions Options builder
     */
    public static function read(array $bindingType = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ReadBindingOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\Service\ReadBindingOptions($bindingType, $identity);
    }
}
class ReadBindingOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $bindingType 
     * @param string[] $identity 
     */
    public function __construct(array $bindingType = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, array $identity = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['bindingType'] = $bindingType;
        $this->options['identity'] = $identity;
    }
    /**
     * 
     *
     * @param string $bindingType 
     * @return $this Fluent Builder
     */
    public function setBindingType(array $bindingType) : self
    {
        $this->options['bindingType'] = $bindingType;
        return $this;
    }
    /**
     * 
     *
     * @param string[] $identity 
     * @return $this Fluent Builder
     */
    public function setIdentity(array $identity) : self
    {
        $this->options['identity'] = $identity;
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
        return '[Twilio.IpMessaging.V2.ReadBindingOptions ' . $options . ']';
    }
}
