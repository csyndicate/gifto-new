<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1;
class Accounts extends \ShopMagicTwilioVendor\Twilio\Rest\AccountsBase
{
    /**
     * @deprecated Use v1->authTokenPromotion instead
     */
    protected function getAuthTokenPromotion() : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\AuthTokenPromotionList
    {
        echo "authTokenPromotion is deprecated. Use v1->authTokenPromotion instead.";
        return $this->v1->authTokenPromotion;
    }
    /**
     * @deprecated Use v1->authTokenPromotion() instead.
     */
    protected function contextAuthTokenPromotion() : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\AuthTokenPromotionContext
    {
        echo "authTokenPromotion() is deprecated. Use v1->authTokenPromotion() instead.";
        return $this->v1->authTokenPromotion();
    }
    /**
     * @deprecated Use v1->credentials instead.
     */
    protected function getCredentials() : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\CredentialList
    {
        echo "credentials is deprecated. Use v1->credentials instead.";
        return $this->v1->credentials;
    }
    /**
     * @deprecated Use v1->secondaryAuthToken instead.
     */
    protected function getSecondaryAuthToken() : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\SecondaryAuthTokenList
    {
        echo "secondaryAuthToken is deprecated. Use v1->secondaryAuthToken instead.";
        return $this->v1->secondaryAuthToken;
    }
    /**
     * @deprecated Use v1->secondaryAuthToken() instead.
     */
    protected function contextSecondaryAuthToken() : \ShopMagicTwilioVendor\Twilio\Rest\Accounts\V1\SecondaryAuthTokenContext
    {
        echo "secondaryAuthToken() is deprecated. Use v1->secondaryAuthToken() instead.";
        return $this->v1->secondaryAuthToken();
    }
}
