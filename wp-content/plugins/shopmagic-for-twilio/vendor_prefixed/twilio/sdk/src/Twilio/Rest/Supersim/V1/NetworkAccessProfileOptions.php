<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Supersim
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class NetworkAccessProfileOptions
{
    /**
     * @param string $uniqueName An application-defined string that uniquely identifies the resource. It can be used in place of the resource's `sid` in the URL to address the resource.
     * @param string[] $networks List of Network SIDs that this Network Access Profile will allow connections to.
     * @return CreateNetworkAccessProfileOptions Options builder
     */
    public static function create(string $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE, array $networks = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\CreateNetworkAccessProfileOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\CreateNetworkAccessProfileOptions($uniqueName, $networks);
    }
    /**
     * @param string $uniqueName The new unique name of the Network Access Profile.
     * @return UpdateNetworkAccessProfileOptions Options builder
     */
    public static function update(string $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\UpdateNetworkAccessProfileOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\UpdateNetworkAccessProfileOptions($uniqueName);
    }
}
class CreateNetworkAccessProfileOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $uniqueName An application-defined string that uniquely identifies the resource. It can be used in place of the resource's `sid` in the URL to address the resource.
     * @param string[] $networks List of Network SIDs that this Network Access Profile will allow connections to.
     */
    public function __construct(string $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE, array $networks = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['networks'] = $networks;
    }
    /**
     * An application-defined string that uniquely identifies the resource. It can be used in place of the resource's `sid` in the URL to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely identifies the resource. It can be used in place of the resource's `sid` in the URL to address the resource.
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName) : self
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }
    /**
     * List of Network SIDs that this Network Access Profile will allow connections to.
     *
     * @param string[] $networks List of Network SIDs that this Network Access Profile will allow connections to.
     * @return $this Fluent Builder
     */
    public function setNetworks(array $networks) : self
    {
        $this->options['networks'] = $networks;
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
        return '[Twilio.Supersim.V1.CreateNetworkAccessProfileOptions ' . $options . ']';
    }
}
class UpdateNetworkAccessProfileOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $uniqueName The new unique name of the Network Access Profile.
     */
    public function __construct(string $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['uniqueName'] = $uniqueName;
    }
    /**
     * The new unique name of the Network Access Profile.
     *
     * @param string $uniqueName The new unique name of the Network Access Profile.
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName) : self
    {
        $this->options['uniqueName'] = $uniqueName;
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
        return '[Twilio.Supersim.V1.UpdateNetworkAccessProfileOptions ' . $options . ']';
    }
}