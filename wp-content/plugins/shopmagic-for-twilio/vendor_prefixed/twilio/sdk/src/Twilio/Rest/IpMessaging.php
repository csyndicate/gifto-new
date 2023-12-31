<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2;
class IpMessaging extends \ShopMagicTwilioVendor\Twilio\Rest\IpMessagingBase
{
    /**
     * @deprecated Use v2->credentials instead.
     */
    protected function getCredentials() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\CredentialList
    {
        echo "credentials is deprecated. Use v2->credentials instead.";
        return $this->v2->credentials;
    }
    /**
     * @deprecated Use v2->credentials(\$sid) instead.
     * @param string $sid The sid
     */
    protected function contextCredentials(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\CredentialContext
    {
        echo "credentials(\$sid) is deprecated. Use v2->credentials(\$sid) instead.";
        return $this->v2->credentials($sid);
    }
    /**
     * @deprecated Use v2->services instead.
     */
    protected function getServices() : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\ServiceList
    {
        echo "services is deprecated. Use v2->services instead.";
        return $this->v2->services;
    }
    /**
     * @deprecated Use v2->services(\$sid) instead.
     * @param string $sid The sid
     */
    protected function contextServices(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\IpMessaging\V2\ServiceContext
    {
        echo "services({$sid}) is deprecated. Use v2->services(\$sid) instead.";
        return $this->v2->services($sid);
    }
}
