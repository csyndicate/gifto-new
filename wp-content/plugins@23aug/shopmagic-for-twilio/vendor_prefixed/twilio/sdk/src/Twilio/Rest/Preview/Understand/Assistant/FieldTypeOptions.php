<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class FieldTypeOptions
{
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @return CreateFieldTypeOptions Options builder
     */
    public static function create($friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\CreateFieldTypeOptions($friendlyName);
    }
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long.
     * @return UpdateFieldTypeOptions Options builder
     */
    public static function update($friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\UpdateFieldTypeOptions($friendlyName, $uniqueName);
    }
}
class CreateFieldTypeOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     */
    public function __construct($friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
    }
    /**
     * A user-provided string that identifies this resource. It is non-unique and can up to 255 characters long.
     *
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Preview.Understand.CreateFieldTypeOptions ' . \implode(' ', $options) . ']';
    }
}
class UpdateFieldTypeOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long.
     */
    public function __construct($friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, $uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['uniqueName'] = $uniqueName;
    }
    /**
     * A user-provided string that identifies this resource. It is non-unique and can up to 255 characters long.
     *
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource. It is non-unique and can up to 255
     *                             characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long.
     *
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long.
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName)
    {
        $this->options['uniqueName'] = $uniqueName;
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
        return '[Twilio.Preview.Understand.UpdateFieldTypeOptions ' . \implode(' ', $options) . ']';
    }
}
