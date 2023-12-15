<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\FlexApi;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property \Twilio\Rest\FlexApi\V1\ChannelList $channel
 * @property \Twilio\Rest\FlexApi\V1\ConfigurationList $configuration
 * @property \Twilio\Rest\FlexApi\V1\FlexFlowList $flexFlow
 * @property \Twilio\Rest\FlexApi\V1\WebChannelList $webChannel
 * @method \Twilio\Rest\FlexApi\V1\ChannelContext channel(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\FlexFlowContext flexFlow(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\WebChannelContext webChannel(string $sid)
 */
class V1 extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_channel = null;
    protected $_configuration = null;
    protected $_flexFlow = null;
    protected $_webChannel = null;
    /**
     * Construct the V1 version of FlexApi
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\FlexApi\V1 V1 version of FlexApi
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    /**
     * @return \Twilio\Rest\FlexApi\V1\ChannelList
     */
    protected function getChannel()
    {
        if (!$this->_channel) {
            $this->_channel = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelList($this);
        }
        return $this->_channel;
    }
    /**
     * @return \Twilio\Rest\FlexApi\V1\ConfigurationList
     */
    protected function getConfiguration()
    {
        if (!$this->_configuration) {
            $this->_configuration = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationList($this);
        }
        return $this->_configuration;
    }
    /**
     * @return \Twilio\Rest\FlexApi\V1\FlexFlowList
     */
    protected function getFlexFlow()
    {
        if (!$this->_flexFlow) {
            $this->_flexFlow = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowList($this);
        }
        return $this->_flexFlow;
    }
    /**
     * @return \Twilio\Rest\FlexApi\V1\WebChannelList
     */
    protected function getWebChannel()
    {
        if (!$this->_webChannel) {
            $this->_webChannel = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelList($this);
        }
        return $this->_webChannel;
    }
    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name)
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
        return '[Twilio.FlexApi.V1]';
    }
}
