<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentList;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentList $itemAssignments
 * @method \Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentContext itemAssignments(string $sid)
 */
class BundleContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_itemAssignments = null;
    /**
     * Initialize the BundleContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource.
     * @return \Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('sid' => $sid);
        $this->uri = '/RegulatoryCompliance/Bundles/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a BundleInstance
     *
     * @return BundleInstance Fetched BundleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the BundleInstance
     *
     * @param array|Options $options Optional Arguments
     * @return BundleInstance Updated BundleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('Status' => $options['status'], 'StatusCallback' => $options['statusCallback'], 'FriendlyName' => $options['friendlyName'], 'Email' => $options['email']));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the itemAssignments
     *
     * @return \Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentList
     */
    protected function getItemAssignments()
    {
        if (!$this->_itemAssignments) {
            $this->_itemAssignments = new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentList($this->version, $this->solution['sid']);
        }
        return $this->_itemAssignments;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name)
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown subresource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments)
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Resource does not have a context');
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
        return '[Twilio.Numbers.V2.BundleContext ' . \implode(' ', $context) . ']';
    }
}
