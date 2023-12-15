<?php

namespace ShopMagicTwilioVendor\GuzzleHttp;

use Psr\Http\Message\MessageInterface;
final class BodySummarizer implements \ShopMagicTwilioVendor\GuzzleHttp\BodySummarizerInterface
{
    /**
     * @var int|null
     */
    private $truncateAt;
    public function __construct(int $truncateAt = null)
    {
        $this->truncateAt = $truncateAt;
    }
    /**
     * Returns a summarized message body.
     */
    public function summarize(\Psr\Http\Message\MessageInterface $message) : ?string
    {
        return $this->truncateAt === null ? \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Message::bodySummary($message) : \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Message::bodySummary($message, $this->truncateAt);
    }
}
