<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Media
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Media\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamer\PlaybackGrantList;
/**
 * @property PlaybackGrantList $playbackGrant
 * @method \Twilio\Rest\Media\V1\PlayerStreamer\PlaybackGrantContext playbackGrant()
 */
class PlayerStreamerContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_playbackGrant;
    /**
     * Initialize the PlayerStreamerContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID of the PlayerStreamer resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
        $this->uri = '/PlayerStreamers/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the PlayerStreamerInstance
     *
     * @return PlayerStreamerInstance Fetched PlayerStreamerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Update the PlayerStreamerInstance
     *
     * @param string $status
     * @return PlayerStreamerInstance Updated PlayerStreamerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status) : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerInstance
    {
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['Status' => $status]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Access the playbackGrant
     */
    protected function getPlaybackGrant() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamer\PlaybackGrantList
    {
        if (!$this->_playbackGrant) {
            $this->_playbackGrant = new \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamer\PlaybackGrantList($this->version, $this->solution['sid']);
        }
        return $this->_playbackGrant;
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
        return '[Twilio.Media.V1.PlayerStreamerContext ' . \implode(' ', $context) . ']';
    }
}
