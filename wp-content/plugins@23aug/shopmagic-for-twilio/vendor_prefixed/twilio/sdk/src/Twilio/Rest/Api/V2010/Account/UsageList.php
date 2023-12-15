<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\RecordList;
use ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\TriggerList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\Api\V2010\Account\Usage\RecordList $records
 * @property \Twilio\Rest\Api\V2010\Account\Usage\TriggerList $triggers
 * @method \Twilio\Rest\Api\V2010\Account\Usage\TriggerContext triggers(string $sid)
 */
class UsageList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    protected $_records = null;
    protected $_triggers = null;
    /**
     * Construct the UsageList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return \Twilio\Rest\Api\V2010\Account\UsageList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $accountSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('accountSid' => $accountSid);
    }
    /**
     * Access the records
     */
    protected function getRecords()
    {
        if (!$this->_records) {
            $this->_records = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\RecordList($this->version, $this->solution['accountSid']);
        }
        return $this->_records;
    }
    /**
     * Access the triggers
     */
    protected function getTriggers()
    {
        if (!$this->_triggers) {
            $this->_triggers = new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Usage\TriggerList($this->version, $this->solution['accountSid']);
        }
        return $this->_triggers;
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
        return '[Twilio.Api.V2010.UsageList]';
    }
}
