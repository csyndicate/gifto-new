<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\FrontlineApi\V1;
class FrontlineApi extends \ShopMagicTwilioVendor\Twilio\Rest\FrontlineApiBase
{
    /**
     * @deprecated Use v1->users instead.
     */
    protected function getUsers() : \ShopMagicTwilioVendor\Twilio\Rest\FrontlineApi\V1\UserList
    {
        echo "users is deprecated. Use v1->users instead.";
        return $this->v1->users;
    }
    /**
     * @deprecated Use v1->users(\$sid) instead.
     * @param string $sid The SID of the User resource to fetch
     */
    protected function contextUsers(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\FrontlineApi\V1\UserContext
    {
        echo "users(\$sid) is deprecated. Use v1->users(\$sid) instead.";
        return $this->v1->users($sid);
    }
}
