<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class SupportingDocumentOptions
{
    /**
     * @param array $attributes The set of parameters that are the attributes of the Supporting Documents resource which are derived Supporting Document Types.
     * @return CreateSupportingDocumentOptions Options builder
     */
    public static function create(array $attributes = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\CreateSupportingDocumentOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\CreateSupportingDocumentOptions($attributes);
    }
    /**
     * @param string $friendlyName The string that you assigned to describe the resource.
     * @param array $attributes The set of parameters that are the attributes of the Supporting Document resource which are derived Supporting Document Types.
     * @return UpdateSupportingDocumentOptions Options builder
     */
    public static function update(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, array $attributes = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\UpdateSupportingDocumentOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\UpdateSupportingDocumentOptions($friendlyName, $attributes);
    }
}
class CreateSupportingDocumentOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param array $attributes The set of parameters that are the attributes of the Supporting Documents resource which are derived Supporting Document Types.
     */
    public function __construct(array $attributes = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['attributes'] = $attributes;
    }
    /**
     * The set of parameters that are the attributes of the Supporting Documents resource which are derived Supporting Document Types.
     *
     * @param array $attributes The set of parameters that are the attributes of the Supporting Documents resource which are derived Supporting Document Types.
     * @return $this Fluent Builder
     */
    public function setAttributes(array $attributes) : self
    {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Numbers.V2.CreateSupportingDocumentOptions ' . $options . ']';
    }
}
class UpdateSupportingDocumentOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName The string that you assigned to describe the resource.
     * @param array $attributes The set of parameters that are the attributes of the Supporting Document resource which are derived Supporting Document Types.
     */
    public function __construct(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, array $attributes = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['attributes'] = $attributes;
    }
    /**
     * The string that you assigned to describe the resource.
     *
     * @param string $friendlyName The string that you assigned to describe the resource.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The set of parameters that are the attributes of the Supporting Document resource which are derived Supporting Document Types.
     *
     * @param array $attributes The set of parameters that are the attributes of the Supporting Document resource which are derived Supporting Document Types.
     * @return $this Fluent Builder
     */
    public function setAttributes(array $attributes) : self
    {
        $this->options['attributes'] = $attributes;
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
        return '[Twilio.Numbers.V2.UpdateSupportingDocumentOptions ' . $options . ']';
    }
}