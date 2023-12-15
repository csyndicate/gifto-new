<?php

namespace ShopMagicTwilioVendor\Twilio\Http;

use ShopMagicTwilioVendor\GuzzleHttp\ClientInterface;
use ShopMagicTwilioVendor\GuzzleHttp\Exception\BadResponseException;
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
    public function request($method, $url, $params = [], $data = [], $headers = [], $user = null, $password = null, $timeout = null)
    {
        try {
            $response = $this->client->send(new \ShopMagicTwilioVendor\GuzzleHttp\Psr7\Request($method, $url, $headers), ['timeout' => $timeout, 'auth' => [$user, $password], 'query' => $params, 'form_params' => $data]);
        } catch (\ShopMagicTwilioVendor\GuzzleHttp\Exception\BadResponseException $exception) {
            $response = $exception->getResponse();
        } catch (\Exception $exception) {
            throw new \ShopMagicTwilioVendor\Twilio\Exceptions\HttpException('Unable to complete the HTTP request', 0, $exception);
        }
        // Casting the body (stream) to a string performs a rewind, ensuring we return the entire response.
        // See https://stackoverflow.com/a/30549372/86696
        return new \ShopMagicTwilioVendor\Twilio\Http\Response($response->getStatusCode(), (string) $response->getBody(), $response->getHeaders());
    }
}
