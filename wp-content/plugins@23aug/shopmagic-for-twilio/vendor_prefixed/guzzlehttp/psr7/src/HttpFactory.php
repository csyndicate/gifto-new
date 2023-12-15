<?php

declare (strict_types=1);
namespace ShopMagicTwilioVendor\GuzzleHttp\Psr7;

use ShopMagicTwilioVendor\Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use ShopMagicTwilioVendor\Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use ShopMagicTwilioVendor\Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use ShopMagicTwilioVendor\Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use ShopMagicTwilioVendor\Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;
use ShopMagicTwilioVendor\Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
/**
 * Implements all of the PSR-17 interfaces.
 *
 * Note: in consuming code it is recommended to require the implemented interfaces
 * and inject the instance of this class multiple times.
 */
final class HttpFactory implements \ShopMagicTwilioVendor\Psr\Http\Message\RequestFactoryInterface, \ShopMagicTwilioVendor\Psr\Http\Message\ResponseFactoryInterface, \ShopMagicTwilioVendor\Psr\Http\Message\ServerRequestFactoryInterface, \ShopMagicTwilioVendor\Psr\Http\Message\StreamFactoryInterface, \ShopMagicTwilioVendor\Psr\Http\Message\UploadedFileFactoryInterface, \ShopMagicTwilioVendor\Psr\Http\Message\UriFactoryInterface
{
    public function createUploadedFile(\Psr\Http\Message\StreamInterface $stream, int $size = null, int $error = \UPLOAD_ERR_OK, string $clientFilename = null, string $clientMediaType = null) : \Psr\Http\Message\UploadedFileInterface
    {
        if ($size === null) {
            $size = $stream->getSize();
        }
        return new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\UploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }
    public function createStream(string $content = '') : \Psr\Http\Message\StreamInterface
    {
        return \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Utils::streamFor($content);
    }
    public function createStreamFromFile(string $file, string $mode = 'r') : \Psr\Http\Message\StreamInterface
    {
        try {
            $resource = \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Utils::tryFopen($file, $mode);
        } catch (\RuntimeException $e) {
            if ('' === $mode || \false === \in_array($mode[0], ['r', 'w', 'a', 'x', 'c'], \true)) {
                throw new \InvalidArgumentException(\sprintf('Invalid file opening mode "%s"', $mode), 0, $e);
            }
            throw $e;
        }
        return \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Utils::streamFor($resource);
    }
    public function createStreamFromResource($resource) : \Psr\Http\Message\StreamInterface
    {
        return \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Utils::streamFor($resource);
    }
    public function createServerRequest(string $method, $uri, array $serverParams = []) : \Psr\Http\Message\ServerRequestInterface
    {
        if (empty($method)) {
            if (!empty($serverParams['REQUEST_METHOD'])) {
                $method = $serverParams['REQUEST_METHOD'];
            } else {
                throw new \InvalidArgumentException('Cannot determine HTTP method');
            }
        }
        return new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\ServerRequest($method, $uri, [], null, '1.1', $serverParams);
    }
    public function createResponse(int $code = 200, string $reasonPhrase = '') : \Psr\Http\Message\ResponseInterface
    {
        return new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Response($code, [], null, '1.1', $reasonPhrase);
    }
    public function createRequest(string $method, $uri) : \Psr\Http\Message\RequestInterface
    {
        return new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Request($method, $uri);
    }
    public function createUri(string $uri = '') : \Psr\Http\Message\UriInterface
    {
        return new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Uri($uri);
    }
}
