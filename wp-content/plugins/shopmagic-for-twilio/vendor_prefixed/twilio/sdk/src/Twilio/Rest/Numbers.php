<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2;
class Numbers extends \ShopMagicTwilioVendor\Twilio\Rest\NumbersBase
{
    /**
     * @deprecated Use v2->regulatoryCompliance instead.
     */
    protected function getRegulatoryCompliance() : \ShopMagicTwilioVendor\Twilio\Rest\Numbers\V2\RegulatoryComplianceList
    {
        echo "regulatoryCompliance is deprecated. Use v2->regulatoryCompliance instead.";
        return $this->v2->regulatoryCompliance;
    }
}
