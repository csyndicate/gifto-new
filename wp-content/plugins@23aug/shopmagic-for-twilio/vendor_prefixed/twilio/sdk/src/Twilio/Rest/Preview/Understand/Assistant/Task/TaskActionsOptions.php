<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\Task;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class TaskActionsOptions
{
    /**
     * @param array $actions The JSON actions that instruct the Assistant how to
     *                       perform this task.
     * @return UpdateTaskActionsOptions Options builder
     */
    public static function update($actions = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\Task\UpdateTaskActionsOptions($actions);
    }
}
class UpdateTaskActionsOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param array $actions The JSON actions that instruct the Assistant how to
     *                       perform this task.
     */
    public function __construct($actions = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['actions'] = $actions;
    }
    /**
     * The JSON actions that instruct the Assistant how to perform this task.
     *
     * @param array $actions The JSON actions that instruct the Assistant how to
     *                       perform this task.
     * @return $this Fluent Builder
     */
    public function setActions($actions)
    {
        $this->options['actions'] = $actions;
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
        return '[Twilio.Preview.Understand.UpdateTaskActionsOptions ' . \implode(' ', $options) . ']';
    }
}
