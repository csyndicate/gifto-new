<?php

namespace ShopMagicTwilioVendor\Twilio;

class InstanceContext
{
    protected $version;
    protected $solution = array();
    protected $uri;
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version)
    {
        $this->version = $version;
    }
    public function __toString()
    {
        return '[InstanceContext]';
    }
}
