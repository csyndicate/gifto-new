<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service;

use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $uniqueName
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $url
 * @property array $links
 * @property string $revision
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $createdBy
 */
class SyncMapInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_syncMapItems = null;
    protected $_syncMapPermissions = null;
    /**
     * Initialize the SyncMapInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The service_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMapInstance
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, $serviceSid, $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = array('sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'serviceSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'service_sid'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'), 'revision' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'revision'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'createdBy' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'created_by'));
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid']);
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMapContext Context for this
     *                                                          SyncMapInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Sync\Service\SyncMapContext($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch a SyncMapInstance
     *
     * @return SyncMapInstance Fetched SyncMapInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }
    /**
     * Deletes the SyncMapInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }
    /**
     * Access the syncMapItems
     *
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapItemList
     */
    protected function getSyncMapItems()
    {
        return $this->proxy()->syncMapItems;
    }
    /**
     * Access the syncMapPermissions
     *
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMap\SyncMapPermissionList
     */
    protected function getSyncMapPermissions()
    {
        return $this->proxy()->syncMapPermissions;
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
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
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Preview.Sync.SyncMapInstance ' . \implode(' ', $context) . ']';
    }
}
