<?php

namespace ShopMagicTwilioVendor\GuzzleHttp;

use Psr\Http\Message\MessageInterface;
interface BodySummarizerInterface
{
    /**
     * Returns a summarized message body.
     */
    public function summarize(\Psr\Http\Message\MessageInterface $message) : ?string;
}
