<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Autopilot
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Autopilot;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\AssistantList;
use ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\RestoreAssistantList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property AssistantList $assistants
 * @property RestoreAssistantList $restoreAssistant
 * @method \Twilio\Rest\Autopilot\V1\AssistantContext assistants(string $sid)
 */
class V1 extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_assistants;
    protected $_restoreAssistant;
    /**
     * Construct the V1 version of Autopilot
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    protected function getAssistants() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\AssistantList
    {
        if (!$this->_assistants) {
            $this->_assistants = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\AssistantList($this);
        }
        return $this->_assistants;
    }
    protected function getRestoreAssistant() : \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\RestoreAssistantList
    {
        if (!$this->_restoreAssistant) {
            $this->_restoreAssistant = new \ShopMagicTwilioVendor\Twilio\Rest\Autopilot\V1\RestoreAssistantList($this);
        }
        return $this->_restoreAssistant;
    }
    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown resource ' . $name);
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
        return '[Twilio.Autopilot.V1]';
    }
}
