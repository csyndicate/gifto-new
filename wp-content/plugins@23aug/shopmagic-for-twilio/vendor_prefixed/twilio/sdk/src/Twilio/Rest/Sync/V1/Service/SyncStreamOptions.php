<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class SyncStreamOptions
{
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param int $ttl How long, in seconds, before the Stream expires and is
     *                 deleted
     * @return CreateSyncStreamOptions Options builder
     */
    public static function create($uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE, $ttl = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\CreateSyncStreamOptions($uniqueName, $ttl);
    }
    /**
     * @param int $ttl How long, in seconds, before the Stream expires and is
     *                 deleted
     * @return UpdateSyncStreamOptions Options builder
     */
    public static function update($ttl = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\UpdateSyncStreamOptions($ttl);
    }
}
class CreateSyncStreamOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @param int $ttl How long, in seconds, before the Stream expires and is
     *                 deleted
     */
    public function __construct($uniqueName = \ShopMagicTwilioVendor\Twilio\Values::NONE, $ttl = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['ttl'] = $ttl;
    }
    /**
     * An application-defined string that uniquely identifies the resource. This value must be unique within its Service and it can be up to 320 characters long. The `unique_name` value can be used as an alternative to the `sid` in the URL path to address the resource.
     *
     * @param string $uniqueName An application-defined string that uniquely
     *                           identifies the resource
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName)
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }
    /**
     * How long, in seconds, before the Stream expires and is deleted (time-to-live). Can be an integer from 0 to 31,536,000 (1 year). The default value is `0`, which means the Stream does not expire. The Stream will be deleted automatically after it expires, but there can be a delay between the expiration time and the resources's deletion.
     *
     * @param int $ttl How long, in seconds, before the Stream expires and is
     *                 deleted
     * @return $this Fluent Builder
     */
    public function setTtl($ttl)
    {
        $this->options['ttl'] = $ttl;
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
        return '[Twilio.Sync.V1.CreateSyncStreamOptions ' . \implode(' ', $options) . ']';
    }
}
class UpdateSyncStreamOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param int $ttl How long, in seconds, before the Stream expires and is
     *                 deleted
     */
    public function __construct($ttl = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['ttl'] = $ttl;
    }
    /**
     * How long, in seconds, before the Stream expires and is deleted (time-to-live). Can be an integer from 0 to 31,536,000 (1 year). The default value is `0`, which means the Stream does not expire. The Stream will be deleted automatically after it expires, but there can be a delay between the expiration time and the resources's deletion.
     *
     * @param int $ttl How long, in seconds, before the Stream expires and is
     *                 deleted
     * @return $this Fluent Builder
     */
    public function setTtl($ttl)
    {
        $this->options['ttl'] = $ttl;
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
        return '[Twilio.Sync.V1.UpdateSyncStreamOptions ' . \implode(' ', $options) . ']';
    }
}
