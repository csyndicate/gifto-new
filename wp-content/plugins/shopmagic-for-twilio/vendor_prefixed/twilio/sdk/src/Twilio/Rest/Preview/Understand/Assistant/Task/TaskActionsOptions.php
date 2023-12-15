<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Preview
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\Task;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class TaskActionsOptions
{
    /**
     * @param array $actions The JSON actions that instruct the Assistant how to perform this task.
     * @return UpdateTaskActionsOptions Options builder
     */
    public static function update(array $actions = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\Task\UpdateTaskActionsOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\Task\UpdateTaskActionsOptions($actions);
    }
}
class UpdateTaskActionsOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param array $actions The JSON actions that instruct the Assistant how to perform this task.
     */
    public function __construct(array $actions = \ShopMagicTwilioVendor\Twilio\Values::ARRAY_NONE)
    {
        $this->options['actions'] = $actions;
    }
    /**
     * The JSON actions that instruct the Assistant how to perform this task.
     *
     * @param array $actions The JSON actions that instruct the Assistant how to perform this task.
     * @return $this Fluent Builder
     */
    public function setActions(array $actions) : self
    {
        $this->options['actions'] = $actions;
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
        return '[Twilio.Preview.Understand.UpdateTaskActionsOptions ' . $options . ']';
    }
}
