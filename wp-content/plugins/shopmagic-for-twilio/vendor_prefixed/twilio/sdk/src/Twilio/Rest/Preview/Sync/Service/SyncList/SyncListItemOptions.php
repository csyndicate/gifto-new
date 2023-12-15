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
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class SyncListItemOptions
{
    /**
     * @param string $ifMatch The If-Match HTTP request header
     * @return DeleteSyncListItemOptions Options builder
     */
    public static function delete(string $ifMatch = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList\DeleteSyncListItemOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList\DeleteSyncListItemOptions($ifMatch);
    }
    /**
     * @param string $order 
     * @param string $from 
     * @param string $bounds 
     * @return ReadSyncListItemOptions Options builder
     */
    public static function read(string $order = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $from = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $bounds = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList\ReadSyncListItemOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList\ReadSyncListItemOptions($order, $from, $bounds);
    }
    /**
     * @param string $ifMatch The If-Match HTTP request header
     * @return UpdateSyncListItemOptions Options builder
     */
    public static function update(string $ifMatch = \ShopMagicTwilioVendor\Twilio\Values::NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList\UpdateSyncListItemOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncList\UpdateSyncListItemOptions($ifMatch);
    }
}
class DeleteSyncListItemOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $ifMatch The If-Match HTTP request header
     */
    public function __construct(string $ifMatch = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['ifMatch'] = $ifMatch;
    }
    /**
     * The If-Match HTTP request header
     *
     * @param string $ifMatch The If-Match HTTP request header
     * @return $this Fluent Builder
     */
    public function setIfMatch(string $ifMatch) : self
    {
        $this->options['ifMatch'] = $ifMatch;
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
        return '[Twilio.Preview.Sync.DeleteSyncListItemOptions ' . $options . ']';
    }
}
class ReadSyncListItemOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $order 
     * @param string $from 
     * @param string $bounds 
     */
    public function __construct(string $order = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $from = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $bounds = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['order'] = $order;
        $this->options['from'] = $from;
        $this->options['bounds'] = $bounds;
    }
    /**
     * 
     *
     * @param string $order 
     * @return $this Fluent Builder
     */
    public function setOrder(string $order) : self
    {
        $this->options['order'] = $order;
        return $this;
    }
    /**
     * 
     *
     * @param string $from 
     * @return $this Fluent Builder
     */
    public function setFrom(string $from) : self
    {
        $this->options['from'] = $from;
        return $this;
    }
    /**
     * 
     *
     * @param string $bounds 
     * @return $this Fluent Builder
     */
    public function setBounds(string $bounds) : self
    {
        $this->options['bounds'] = $bounds;
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
        return '[Twilio.Preview.Sync.ReadSyncListItemOptions ' . $options . ']';
    }
}
class UpdateSyncListItemOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $ifMatch The If-Match HTTP request header
     */
    public function __construct(string $ifMatch = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['ifMatch'] = $ifMatch;
    }
    /**
     * The If-Match HTTP request header
     *
     * @param string $ifMatch The If-Match HTTP request header
     * @return $this Fluent Builder
     */
    public function setIfMatch(string $ifMatch) : self
    {
        $this->options['ifMatch'] = $ifMatch;
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
        return '[Twilio.Preview.Sync.UpdateSyncListItemOptions ' . $options . ']';
    }
}