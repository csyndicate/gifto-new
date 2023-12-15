<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class WebhookOptions
{
    /**
     * @param string $webhookMethod The HTTP method to use when sending a webhook
     *                              request
     * @param string $webhookFilters The list of webhook event triggers that are
     *                               enabled for the Service
     * @param string $preWebhookUrl The absolute URL of the pre-event webhook
     * @param string $postWebhookUrl The absolute URL of the post-event webhook
     * @param int $preWebhookRetryCount The number of times to try the pre-event
     *                                  webhook request if the first attempt fails
     * @param int $postWebhookRetryCount The number of times to try the post-event
     *                                   webhook request if the first attempt fails
     * @param string $target The routing target of the webhook
     * @return UpdateWebhookOptions Options builder
     */
    public static function update($webhookMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, $webhookFilters = \ShopMagicTwilioVendor\Twilio\Values::NONE, $preWebhookUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, $postWebhookUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, $preWebhookRetryCount = \ShopMagicTwilioVendor\Twilio\Values::NONE, $postWebhookRetryCount = \ShopMagicTwilioVendor\Twilio\Values::NONE, $target = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Messaging\V1\UpdateWebhookOptions($webhookMethod, $webhookFilters, $preWebhookUrl, $postWebhookUrl, $preWebhookRetryCount, $postWebhookRetryCount, $target);
    }
}
class UpdateWebhookOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $webhookMethod The HTTP method to use when sending a webhook
     *                              request
     * @param string $webhookFilters The list of webhook event triggers that are
     *                               enabled for the Service
     * @param string $preWebhookUrl The absolute URL of the pre-event webhook
     * @param string $postWebhookUrl The absolute URL of the post-event webhook
     * @param int $preWebhookRetryCount The number of times to try the pre-event
     *                                  webhook request if the first attempt fails
     * @param int $postWebhookRetryCount The number of times to try the post-event
     *                                   webhook request if the first attempt fails
     * @param string $target The routing target of the webhook
     */
    public function __construct($webhookMethod = \ShopMagicTwilioVendor\Twilio\Values::NONE, $webhookFilters = \ShopMagicTwilioVendor\Twilio\Values::NONE, $preWebhookUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, $postWebhookUrl = \ShopMagicTwilioVendor\Twilio\Values::NONE, $preWebhookRetryCount = \ShopMagicTwilioVendor\Twilio\Values::NONE, $postWebhookRetryCount = \ShopMagicTwilioVendor\Twilio\Values::NONE, $target = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['webhookMethod'] = $webhookMethod;
        $this->options['webhookFilters'] = $webhookFilters;
        $this->options['preWebhookUrl'] = $preWebhookUrl;
        $this->options['postWebhookUrl'] = $postWebhookUrl;
        $this->options['preWebhookRetryCount'] = $preWebhookRetryCount;
        $this->options['postWebhookRetryCount'] = $postWebhookRetryCount;
        $this->options['target'] = $target;
    }
    /**
     * The HTTP method to use when sending a webhook request.
     *
     * @param string $webhookMethod The HTTP method to use when sending a webhook
     *                              request
     * @return $this Fluent Builder
     */
    public function setWebhookMethod($webhookMethod)
    {
        $this->options['webhookMethod'] = $webhookMethod;
        return $this;
    }
    /**
     * The list of webhook event triggers that are enabled for the Service.
     *
     * @param string $webhookFilters The list of webhook event triggers that are
     *                               enabled for the Service
     * @return $this Fluent Builder
     */
    public function setWebhookFilters($webhookFilters)
    {
        $this->options['webhookFilters'] = $webhookFilters;
        return $this;
    }
    /**
     * The absolute URL of the pre-event webhook.
     *
     * @param string $preWebhookUrl The absolute URL of the pre-event webhook
     * @return $this Fluent Builder
     */
    public function setPreWebhookUrl($preWebhookUrl)
    {
        $this->options['preWebhookUrl'] = $preWebhookUrl;
        return $this;
    }
    /**
     * The absolute URL of the post-event webhook.
     *
     * @param string $postWebhookUrl The absolute URL of the post-event webhook
     * @return $this Fluent Builder
     */
    public function setPostWebhookUrl($postWebhookUrl)
    {
        $this->options['postWebhookUrl'] = $postWebhookUrl;
        return $this;
    }
    /**
     * The number of times to try the pre-event webhook request if the first attempt fails. Can be up to 3 and the default is 0.
     *
     * @param int $preWebhookRetryCount The number of times to try the pre-event
     *                                  webhook request if the first attempt fails
     * @return $this Fluent Builder
     */
    public function setPreWebhookRetryCount($preWebhookRetryCount)
    {
        $this->options['preWebhookRetryCount'] = $preWebhookRetryCount;
        return $this;
    }
    /**
     * The number of times to try the post-event webhook request if the first attempt fails. Can be up to 3 and the default is 0.
     *
     * @param int $postWebhookRetryCount The number of times to try the post-event
     *                                   webhook request if the first attempt fails
     * @return $this Fluent Builder
     */
    public function setPostWebhookRetryCount($postWebhookRetryCount)
    {
        $this->options['postWebhookRetryCount'] = $postWebhookRetryCount;
        return $this;
    }
    /**
     * The routing target of the webhook. Can be ordinary or routed internally to Flex
     *
     * @param string $target The routing target of the webhook
     * @return $this Fluent Builder
     */
    public function setTarget($target)
    {
        $this->options['target'] = $target;
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
        return '[Twilio.Messaging.V1.UpdateWebhookOptions ' . \implode(' ', $options) . ']';
    }
}
