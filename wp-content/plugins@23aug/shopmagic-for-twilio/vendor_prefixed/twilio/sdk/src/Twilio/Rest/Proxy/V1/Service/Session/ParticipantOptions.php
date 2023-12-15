<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class ParticipantOptions
{
    /**
     * @param string $friendlyName The string that you assigned to describe the
     *                             participant
     * @param string $proxyIdentifier The proxy phone number to use for the
     *                                Participant
     * @param string $proxyIdentifierSid The Proxy Identifier Sid
     * @return CreateParticipantOptions Options builder
     */
    public static function create($friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, $proxyIdentifier = \ShopMagicTwilioVendor\Twilio\Values::NONE, $proxyIdentifierSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Proxy\V1\Service\Session\CreateParticipantOptions($friendlyName, $proxyIdentifier, $proxyIdentifierSid);
    }
}
class CreateParticipantOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $friendlyName The string that you assigned to describe the
     *                             participant
     * @param string $proxyIdentifier The proxy phone number to use for the
     *                                Participant
     * @param string $proxyIdentifierSid The Proxy Identifier Sid
     */
    public function __construct($friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, $proxyIdentifier = \ShopMagicTwilioVendor\Twilio\Values::NONE, $proxyIdentifierSid = \ShopMagicTwilioVendor\Twilio\Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['proxyIdentifier'] = $proxyIdentifier;
        $this->options['proxyIdentifierSid'] = $proxyIdentifierSid;
    }
    /**
     * The string that you assigned to describe the participant. This value must be 255 characters or fewer. **This value should not have PII.**
     *
     * @param string $friendlyName The string that you assigned to describe the
     *                             participant
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName)
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The proxy phone number to use for the Participant. If not specified, Proxy will select a number from the pool.
     *
     * @param string $proxyIdentifier The proxy phone number to use for the
     *                                Participant
     * @return $this Fluent Builder
     */
    public function setProxyIdentifier($proxyIdentifier)
    {
        $this->options['proxyIdentifier'] = $proxyIdentifier;
        return $this;
    }
    /**
     * The SID of the Proxy Identifier to assign to the Participant.
     *
     * @param string $proxyIdentifierSid The Proxy Identifier Sid
     * @return $this Fluent Builder
     */
    public function setProxyIdentifierSid($proxyIdentifierSid)
    {
        $this->options['proxyIdentifierSid'] = $proxyIdentifierSid;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != \ShopMagicTwilioVendor\Twilio\Values::NONE) {
                $options[] = "{$key}={$value}";
            }
        }
        return '[Twilio.Proxy.V1.CreateParticipantOptions ' . \implode(' ', $options) . ']';
    }
}
