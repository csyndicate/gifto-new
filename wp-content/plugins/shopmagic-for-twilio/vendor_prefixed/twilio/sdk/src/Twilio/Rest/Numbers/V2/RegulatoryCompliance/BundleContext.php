<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ReplaceItemsList;
use ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationList;
use ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\BundleCopyList;
use ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentList;
/**
 * @property ReplaceItemsList $replaceItems
 * @property EvaluationList $evaluations
 * @property BundleCopyList $bundleCopies
 * @property ItemAssignmentList $itemAssignments
 * @method \Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentContext itemAssignments(string $sid)
 * @method \Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationContext evaluations(string $sid)
 */
class BundleContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_replaceItems;
    protected $_evaluations;
    protected $_bundleCopies;
    protected $_itemAssignments;
    /**
     * Initialize the BundleContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The unique string that we created to identify the Bundle resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
        $this->uri = '/RegulatoryCompliance/Bundles/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the BundleInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the BundleInstance
     *
     * @return BundleInstance Fetched BundleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the BundleInstance
     *
     * @param array|Options $options Optional Arguments
     * @return BundleInstance Updated BundleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Status' => $options['status'], 'StatusCallback' => $options['statusCallback'], 'FriendlyName' => $options['friendlyName'], 'Email' => $options['email']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\BundleInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the replaceItems
     */
    protected function getReplaceItems() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ReplaceItemsList
    {
        if (!$this->_replaceItems) {
            $this->_replaceItems = new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ReplaceItemsList($this->version, $this->solution['sid']);
        }
        return $this->_replaceItems;
    }
    /**
     * Access the evaluations
     */
    protected function getEvaluations() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationList
    {
        if (!$this->_evaluations) {
            $this->_evaluations = new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationList($this->version, $this->solution['sid']);
        }
        return $this->_evaluations;
    }
    /**
     * Access the bundleCopies
     */
    protected function getBundleCopies() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\BundleCopyList
    {
        if (!$this->_bundleCopies) {
            $this->_bundleCopies = new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\BundleCopyList($this->version, $this->solution['sid']);
        }
        return $this->_bundleCopies;
    }
    /**
     * Access the itemAssignments
     */
    protected function getItemAssignments() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\ItemAssignmentList
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
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name) : \ShopMagicTwilioVendor\Twilio\ListResource
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
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : \ShopMagicTwilioVendor\Twilio\InstanceContext
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
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Numbers.V2.BundleContext ' . \implode(' ', $context) . ']';
    }
}
