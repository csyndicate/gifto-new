<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Sync
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Sync\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncListList;
use ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStreamList;
use ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\DocumentList;
use ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncMapList;
/**
 * @property string|null $sid
 * @property string|null $uniqueName
 * @property string|null $accountSid
 * @property string|null $friendlyName
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $url
 * @property string|null $webhookUrl
 * @property bool|null $webhooksFromRestEnabled
 * @property bool|null $reachabilityWebhooksEnabled
 * @property bool|null $aclEnabled
 * @property bool|null $reachabilityDebouncingEnabled
 * @property int|null $reachabilityDebouncingWindow
 * @property array|null $links
 */
class ServiceInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_syncLists;
    protected $_syncStreams;
    protected $_documents;
    protected $_syncMaps;
    /**
     * Initialize the ServiceInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the Service resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'webhookUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'webhook_url'), 'webhooksFromRestEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'webhooks_from_rest_enabled'), 'reachabilityWebhooksEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reachability_webhooks_enabled'), 'aclEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'acl_enabled'), 'reachabilityDebouncingEnabled' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reachability_debouncing_enabled'), 'reachabilityDebouncingWindow' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'reachability_debouncing_window'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ServiceContext Context for this ServiceInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\ServiceContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\ServiceContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the ServiceInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\ServiceInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\ServiceInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the syncLists
     */
    protected function getSyncLists() : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncListList
    {
        return $this->proxy()->syncLists;
    }
    /**
     * Access the syncStreams
     */
    protected function getSyncStreams() : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncStreamList
    {
        return $this->proxy()->syncStreams;
    }
    /**
     * Access the documents
     */
    protected function getDocuments() : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\DocumentList
    {
        return $this->proxy()->documents;
    }
    /**
     * Access the syncMaps
     */
    protected function getSyncMaps() : \ShopMagicTwilioVendor\Twilio\Rest\Sync\V1\Service\SyncMapList
    {
        return $this->proxy()->syncMaps;
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown property: ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Sync.V1.ServiceInstance ' . \implode(' ', $context) . ']';
    }
}
