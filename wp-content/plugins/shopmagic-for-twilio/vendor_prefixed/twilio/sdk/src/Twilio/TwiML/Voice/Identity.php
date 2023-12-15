<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Identity extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Identity constructor.
     *
     * @param string $clientIdentity Identity of the client to dial
     */
    public function __construct($clientIdentity)
    {
        parent::__construct('Identity', $clientIdentity);
    }
}
