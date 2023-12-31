<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Proxy
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\ParticipantList;
use ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\InteractionList;
/**
 * @property ParticipantList $participants
 * @property InteractionList $interactions
 * @method \Twilio\Rest\Proxy\V1\Service\Session\InteractionContext interactions(string $sid)
 * @method \Twilio\Rest\Proxy\V1\Service\Session\ParticipantContext participants(string $sid)
 */
class SessionContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    protected $_participants;
    protected $_interactions;
    /**
     * Initialize the SessionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the parent [Service](https://www.twilio.com/docs/proxy/api/service) resource.
     * @param string $sid The Twilio-provided string that uniquely identifies the Session resource to delete.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $serviceSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Sessions/' . \rawurlencode($sid) . '';
    }
    /**
     * Delete the SessionInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
    }
    /**
     * Fetch the SessionInstance
     *
     * @return SessionInstance Fetched SessionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['sid']);
    }
    /**
     * Update the SessionInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SessionInstance Updated SessionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionInstance
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['DateExpiry' => \ShopMagicTwilioVendor\Twilio\Serialize::iso8601DateTime($options['dateExpiry']), 'Ttl' => $options['ttl'], 'Status' => $options['status']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\SessionInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['sid']);
    }
    /**
     * Access the participants
     */
    protected function getParticipants() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\ParticipantList
    {
        if (!$this->_participants) {
            $this->_participants = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\ParticipantList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->_participants;
    }
    /**
     * Access the interactions
     */
    protected function getInteractions() : \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\InteractionList
    {
        if (!$this->_interactions) {
            $this->_interactions = new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\InteractionList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->_interactions;
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
        return '[Twilio.Proxy.V1.SessionContext ' . \implode(' ', $context) . ']';
    }
}
