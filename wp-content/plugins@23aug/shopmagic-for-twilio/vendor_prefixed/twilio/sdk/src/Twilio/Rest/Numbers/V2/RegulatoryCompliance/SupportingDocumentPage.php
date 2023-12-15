<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use ShopMagicTwilioVendor\Twilio\Page;
class SupportingDocumentPage extends \ShopMagicTwilioVendor\Twilio\Page
{
    public function __construct($version, $response, $solution)
    {
        parent::__construct($version, $response);
        // Path Solution
        $this->solution = $solution;
    }
    public function buildInstance(array $payload)
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance\SupportingDocumentInstance($this->version, $payload);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Numbers.V2.SupportingDocumentPage]';
    }
}
