<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Lookups\V1;
class Lookups extends \ShopMagicTwilioVendor\Twilio\Rest\LookupsBase
{
    /**
     * @deprecated Use v1->phoneNumbers instead.
     */
    protected function getPhoneNumbers() : \ShopMagicTwilioVendor\Twilio\Rest\Lookups\V1\PhoneNumberList
    {
        echo "phoneNumbers is deprecated. Use v1->phoneNumbers instead.";
        return $this->v1->phoneNumbers;
    }
    /**
     * @deprecated Use v1->phoneNumbers(\$phoneNumber) instead.
     * @param string $phoneNumber The phone number to fetch in E.164 format
     */
    protected function contextPhoneNumbers(string $phoneNumber) : \ShopMagicTwilioVendor\Twilio\Rest\Lookups\V1\PhoneNumberContext
    {
        echo "phoneNumbers(\$phoneNumber) is deprecated. Use v1->phoneNumbers(\$phoneNumber) instead.";
        return $this->v1->phoneNumbers($phoneNumber);
    }
}
