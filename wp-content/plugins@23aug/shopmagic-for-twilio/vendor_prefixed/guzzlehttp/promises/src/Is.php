<?php

namespace ShopMagicTwilioVendor\GuzzleHttp\Promise;

final class Is
{
    /**
     * Returns true if a promise is pending.
     *
     * @return bool
     */
    public static function pending(\ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() === \ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface::PENDING;
    }
    /**
     * Returns true if a promise is fulfilled or rejected.
     *
     * @return bool
     */
    public static function settled(\ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() !== \ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface::PENDING;
    }
    /**
     * Returns true if a promise is fulfilled.
     *
     * @return bool
     */
    public static function fulfilled(\ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() === \ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface::FULFILLED;
    }
    /**
     * Returns true if a promise is rejected.
     *
     * @return bool
     */
    public static function rejected(\ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() === \ShopMagicTwilioVendor\GuzzleHttp\Promise\PromiseInterface::REJECTED;
    }
}
