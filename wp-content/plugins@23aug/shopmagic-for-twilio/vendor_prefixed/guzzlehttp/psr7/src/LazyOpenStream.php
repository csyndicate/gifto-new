<?php

declare (strict_types=1);
namespace ShopMagicTwilioVendor\GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;
/**
 * Lazily reads or writes to a file that is opened only after an IO operation
 * take place on the stream.
 */
#[\AllowDynamicProperties]
final class LazyOpenStream implements \Psr\Http\Message\StreamInterface
{
    use StreamDecoratorTrait;
    /** @var string */
    private $filename;
    /** @var string */
    private $mode;
    /**
     * @param string $filename File to lazily open
     * @param string $mode     fopen mode to use when opening the stream
     */
    public function __construct(string $filename, string $mode)
    {
        $this->filename = $filename;
        $this->mode = $mode;
    }
    /**
     * Creates the underlying stream lazily when required.
     */
    protected function createStream() : \Psr\Http\Message\StreamInterface
    {
        return \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Utils::streamFor(\ShopMagicTwilioVendor\GuzzleHttp\Psr7\Utils::tryFopen($this->filename, $this->mode));
    }
}
