<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Studio\V2;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class FlowOptions
{
    /**
     * @param string $commitMessage Description of change made in the revision.
     * @return CreateFlowOptions Options builder
     */
    public static function create(string $commitMessage = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\CreateFlowOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\CreateFlowOptions($commitMessage);
    }
    /**
     * @param string $friendlyName The string that you assigned to describe the Flow.
     * @param array $definition JSON representation of flow definition.
     * @param string $commitMessage Description of change made in the revision.
     * @return UpdateFlowOptions Options builder
     */
    public static function update(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, array $definition = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, string $commitMessage = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\UpdateFlowOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Studio\V2\UpdateFlowOptions($friendlyName, $definition, $commitMessage);
    }
}
class CreateFlowOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $commitMessage Description of change made in the revision.
     */
    public function __construct(string $commitMessage = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['commitMessage'] = $commitMessage;
    }
    /**
     * Description of change made in the revision.
     *
     * @param string $commitMessage Description of change made in the revision.
     * @return $this Fluent Builder
     */
    public function setCommitMessage(string $commitMessage) : self
    {
        $this->options['commitMessage'] = $commitMessage;
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
        return '[Twilio.Studio.V2.CreateFlowOptions ' . $options . ']';
    }
}
class UpdateFlowOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName The string that you assigned to describe the Flow.
     * @param array $definition JSON representation of flow definition.
     * @param string $commitMessage Description of change made in the revision.
     */
    public function __construct(string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, array $definition = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE, string $commitMessage = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['definition'] = $definition;
        $this->options['commitMessage'] = $commitMessage;
    }
    /**
     * The string that you assigned to describe the Flow.
     *
     * @param string $friendlyName The string that you assigned to describe the Flow.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * JSON representation of flow definition.
     *
     * @param array $definition JSON representation of flow definition.
     * @return $this Fluent Builder
     */
    public function setDefinition(array $definition) : self
    {
        $this->options['definition'] = $definition;
        return $this;
    }
    /**
     * Description of change made in the revision.
     *
     * @param string $commitMessage Description of change made in the revision.
     * @return $this Fluent Builder
     */
    public function setCommitMessage(string $commitMessage) : self
    {
        $this->options['commitMessage'] = $commitMessage;
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
        return '[Twilio.Studio.V2.UpdateFlowOptions ' . $options . ']';
    }
}
