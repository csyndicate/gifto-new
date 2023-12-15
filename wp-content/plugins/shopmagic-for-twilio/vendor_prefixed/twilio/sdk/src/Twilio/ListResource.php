<?php

namespace ShopMagicTwilioVendor\Twilio;

class ListResource
{
    protected $version;
    protected $solution = [];
    protected $uri;
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        $this->version = $version;
    }
    public function __toString() : string
    {
        return '[ListResource]';
    }
}
