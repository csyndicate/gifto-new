<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Insights\V1;
class Insights extends \ShopMagicTwilioVendor\Twilio\Rest\InsightsBase
{
    /**
     * @deprecated Use v1->settings instead.
     */
    protected function getSettings() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\SettingList
    {
        echo "settings is deprecated. Use v1->settings instead.";
        return $this->v1->settings;
    }
    /**
     * @deprecated Use v1->settings() instead.
     */
    protected function contextSettings() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\SettingContext
    {
        echo "settings() is deprecated. Use v1->settings() instead.";
        return $this->v1->settings();
    }
    /**
     * @deprecated Use v1->calls instead.
     */
    protected function getCalls() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallList
    {
        echo "calls is deprecated. Use v1->calls instead.";
        return $this->v1->calls;
    }
    /**
     * @deprecated Use v1->calls(\$sid) instead.
     * @param string $sid The sid
     */
    protected function contextCalls(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallContext
    {
        echo "calls(\$sid) is deprecated. Use v1->calls(\$sid) instead.";
        return $this->v1->calls($sid);
    }
    /**
     * @deprecated Use v1->callSummaries instead.
     */
    protected function getCallSummaries() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\CallSummariesList
    {
        echo "callSummaries is deprecated. Use v1->callSummaries instead.";
        return $this->v1->callSummaries;
    }
    /**
     * @deprecated Use v1->conferences instead.
     */
    protected function getConferences() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceList
    {
        echo "conferences is deprecated. Use v1->conferences instead.";
        return $this->v1->conferences;
    }
    /**
     * @deprecated Use v1->conferences(\$conferenceSid) instead.
     * @param string $conferenceSid Conference SID.
     */
    protected function contextConferences(string $conferenceSid) : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\ConferenceContext
    {
        echo "conferences(\$conferenceSid) is deprecated. Use v1->conferences(\$conferenceSid) instead.";
        return $this->v1->conferences($conferenceSid);
    }
    /**
     * @deprecated  Use v1->rooms instead.
     */
    protected function getRooms() : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomList
    {
        echo "rooms is deprecated. Use v1->rooms instead.";
        return $this->v1->rooms;
    }
    /**
     * @deprecated Use v1->rooms(\$roomSid) instead.
     * @param string $roomSid The SID of the Room resource.
     */
    protected function contextRooms(string $roomSid) : \ShopMagicTwilioVendor\Twilio\Rest\Insights\V1\RoomContext
    {
        echo "rooms(\$roomSid) is deprecated. Use v1->rooms(\$roomSid) instead.";
        return $this->v1->rooms($roomSid);
    }
}
