<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Notify\V1;
class Notify extends \ShopMagicTwilioVendor\Twilio\Rest\NotifyBase
{
    /**
     * @deprecated Use v1->credentials instead.
     */
    protected function getCredentials() : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\CredentialList
    {
        echo "credentials is deprecated. Use v1->credentials instead.";
        return $this->v1->credentials;
    }
    /**
     * @deprecated Use v1->credentials(\$sid) instead.
     * @param string $sid The unique string that identifies the resource
     */
    protected function contextCredentials(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\CredentialContext
    {
        echo "credentials(\$sid) is deprecated. Use v1->credentials(\$sid) instead.";
        return $this->v1->credentials($sid);
    }
    /**
     * @deprecated Use v1->services instead.
     */
    protected function getServices() : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceList
    {
        echo "services is deprecated. Use v1->services instead.";
        return $this->v1->services;
    }
    /**
     * @deprecated Use v1->services(\$sid) instead.
     * @param string $sid The unique string that identifies the resource
     */
    protected function contextServices(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Notify\V1\ServiceContext
    {
        echo "services(\$sid) is deprecated. Use v1->services(\$sid) instead.";
        return $this->v1->services($sid);
    }
}
