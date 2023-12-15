<?php

namespace ShopMagicTwilioVendor\Psr\Log;

/**
 * Describes a logger-aware instance.
 */
interface LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(\ShopMagicTwilioVendor\Psr\Log\LoggerInterface $logger);
}
