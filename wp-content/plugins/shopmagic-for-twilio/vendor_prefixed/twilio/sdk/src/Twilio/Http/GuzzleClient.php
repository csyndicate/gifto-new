<?php

namespace ShopMagicTwilioVendor\Twilio\Http;

use ShopMagicTwilioVendor\GuzzleHttp\ClientInterface;
use ShopMagicTwilioVendor\GuzzleHttp\Exception\BadResponseException;
use ShopMagicTwilioVendor\GuzzleHttp\Psr7\Query;
use ShopMagicTwilioVendor\GuzzleHttp\Psr7\Request;
use ShopMagicTwilioVendor\Twilio\Exceptions\HttpException;
final class GuzzleClient implements \ShopMagicTwilioVendor\Twilio\Http\Client
{
    /**
     * @var ClientInterface
     */
    private $client;
    public function __construct(\ShopMagicTwilioVendor\GuzzleHttp\ClientInterface $client)
    {
        $this->client = $client;
    }
    public function request(string $method, string $url, array $params = [], array $data = [], array $headers = [], string $user = null, string $password = null, int $timeout = null) : \ShopMagicTwilioVendor\Twilio\Http\Response
    {
        try {
            $options = ['timeout' => $timeout, 'auth' => [$user, $password], 'allow_redirects' => \false];
            if ($params) {
                $options['query'] = \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Query::build($params, \PHP_QUERY_RFC1738);
            }
            if ($method === 'POST') {
                if ($this->hasFile($data)) {
                    $options['multipart'] = $this->buildMultipartParam($data);
                } else {
                    $options['body'] = \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Query::build($data, \PHP_QUERY_RFC1738);
                    $headers['Content-Type'] = 'application/x-www-form-urlencoded';
                }
            }
            $response = $this->client->send(new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Request($method, $url, $headers), $options);
        } catch (\ShopMagicTwilioVendor\GuzzleHttp\Exception\BadResponseException $exception) {
            $response = $exception->getResponse();
        } catch (\Exception $exception) {
            throw new \ShopMagicTwilioVendor\Twilio\Exceptions\HttpException('Unable to complete the HTTP request', 0, $exception);
        }
        // Casting the body (stream) to a string performs a rewind, ensuring we return the entire response.
        // See https://stackoverflow.com/a/30549372/86696
        return new \ShopMagicTwilioVendor\Twilio\Http\Response($response->getStatusCode(), (string) $response->getBody(), $response->getHeaders());
    }
    private function hasFile(array $data) : bool
    {
        foreach ($data as $value) {
            if ($value instanceof \ShopMagicTwilioVendor\Twilio\Http\File) {
                return \true;
            }
        }
        return \false;
    }
    private function buildMultipartParam(array $data) : array
    {
        $multipart = [];
        foreach ($data as $key => $value) {
            if ($value instanceof \ShopMagicTwilioVendor\Twilio\Http\File) {
                $contents = $value->getContents();
                if ($contents === null) {
                    $contents = \fopen($value->getFileName(), 'rb');
                }
                $chunk = ['name' => $key, 'contents' => $contents, 'filename' => $value->getFileName()];
                if ($value->getContentType() !== null) {
                    $chunk['headers']['Content-Type'] = $value->getContentType();
                }
            } else {
                $chunk = ['name' => $key, 'contents' => $value];
            }
            $multipart[] = $chunk;
        }
        return $multipart;
    }
}
