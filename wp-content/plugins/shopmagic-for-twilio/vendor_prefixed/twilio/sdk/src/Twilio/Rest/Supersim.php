<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1;
class Supersim extends \ShopMagicTwilioVendor\Twilio\Rest\SupersimBase
{
    /**
     * @deprecated Use v1->esimProfiles instead.
     */
    protected function getEsimProfiles() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\EsimProfileList
    {
        echo "esimProfiles is deprecated. Use v1->esimProfiles instead.";
        return $this->v1->esimProfiles;
    }
    /**
     * @deprecated Use v1->esimProfiles(\$sid) instead.
     * @param string $sid The SID of the eSIM Profile resource to fetch
     */
    protected function contextEsimProfiles(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\EsimProfileContext
    {
        echo "esimProfiles(\$sid) is deprecated. Use v1->esimProfiles(\$sid) instead.";
        return $this->v1->esimProfiles($sid);
    }
    /**
     * @deprecated Use v1->fleets instead.
     */
    protected function getFleets() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\FleetList
    {
        echo "fleets is deprecated. Use v1->fleets instead.";
        return $this->v1->fleets;
    }
    /**
     * @deprecated Use v1->fleets(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextFleets(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\FleetContext
    {
        echo "fleets(\$sid) is deprecated. Use v1->fleets(\$sid) instead.";
        return $this->v1->fleets($sid);
    }
    /**
     * @deprecated Use v1->ipCommands instead.
     */
    protected function getIpCommands() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandList
    {
        echo "ipCommands is deprecated. Use v1->ipCommands instead.";
        return $this->v1->ipCommands;
    }
    /**
     * @deprecated Use v1->ipCommands(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextIpCommands(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\IpCommandContext
    {
        echo "ipCommands(\$sid) is deprecated. Use v1->ipCommands(\$sid) instead.";
        return $this->v1->ipCommands($sid);
    }
    /**
     * @deprecated Use v1->networks instead.
     */
    protected function getNetworks() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\NetworkList
    {
        echo "networks is deprecated. Use v1->networks instead.";
        return $this->v1->networks;
    }
    /**
     * @deprecated Use v1->networks(\$sid) instead.
     * @param string $sid The SID of the Network resource to fetch
     */
    protected function contextNetworks(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\NetworkContext
    {
        echo "networks(\$sid) is deprecated. Use v1->networks(\$sid) instead.";
        return $this->v1->networks($sid);
    }
    /**
     * @deprecated Use v1->networkAccessProfiles instead.
     */
    protected function getNetworkAccessProfiles() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\NetworkAccessProfileList
    {
        echo "networkAccessProfiles is deprecated. Use v1->networkAccessProfiles instead.";
        return $this->v1->networkAccessProfiles;
    }
    /**
     * @deprecated Use v1->networkAccessProfiles(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextNetworkAccessProfiles(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\NetworkAccessProfileContext
    {
        echo "networkAccessProfiles(\$sid) is deprecated. Use v1->networkAccessProfiles(\$sid) instead.";
        return $this->v1->networkAccessProfiles($sid);
    }
    /**
     * @deprecated Use v1->settingsUpdates instead.
     */
    protected function getSettingsUpdates() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SettingsUpdateList
    {
        echo "settingsUpdates is deprecated. Use v1->settingsUpdates instead.";
        return $this->v1->settingsUpdates;
    }
    /**
     * @deprecated Use v1->sims instead.
     */
    protected function getSims() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SimList
    {
        echo "sims is deprecated. Use v1->sims instead.";
        return $this->v1->sims;
    }
    /**
     * @deprecated Use v1->sims(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextSims(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SimContext
    {
        echo "sims(\$sid) is deprecated. Use v1->sims(\$sid) instead.";
        return $this->v1->sims($sid);
    }
    /**
     * @deprecated Use v1->smsCommands instead.
     */
    protected function getSmsCommands() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SmsCommandList
    {
        echo "smsCommands is deprecated. Use v1->smsCommands instead.";
        return $this->v1->smsCommands;
    }
    /**
     * @deprecated Use v1->smsCommands(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextSmsCommands(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\SmsCommandContext
    {
        echo "smsCommands(\$sid) is deprecated. Use v1->smsCommands(\$sid) instead.";
        return $this->v1->smsCommands($sid);
    }
    /**
     * @deprecated Use v1->usageRecords instead.
     */
    protected function getUsageRecords() : \ShopMagicTwilioVendor\Twilio\Rest\Supersim\V1\UsageRecordList
    {
        echo "usageRecords is deprecated. Use v1->usageRecords instead.";
        return $this->v1->usageRecords;
    }
}
