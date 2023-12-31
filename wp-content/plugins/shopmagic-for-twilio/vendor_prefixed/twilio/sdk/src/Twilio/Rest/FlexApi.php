<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V2;
class FlexApi extends \ShopMagicTwilioVendor\Twilio\Rest\FlexApiBase
{
    /**
     * @deprecated Use v1->assessments instead.
     */
    protected function getAssessments() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\AssessmentsList
    {
        echo "assessments is deprecated. Use v1->assessments instead.";
        return $this->v1->assessments;
    }
    /**
     * @deprecated Use v1->assessments() instead.
     */
    protected function contextAssessments() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\AssessmentsContext
    {
        echo "assessments() is deprecated. Use v1->assessments() instead.";
        return $this->v1->assessments();
    }
    /**
     * @deprecated Use v1->channel instead.
     */
    protected function getChannel() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelList
    {
        echo "channel is deprecated. Use v1->channel instead.";
        return $this->v1->channel;
    }
    /**
     * @deprecated Use v1->channel(\$sid) instead.
     * @param string $sid The SID that identifies the Flex chat channel resource to
     *                    fetch
     */
    protected function contextChannel(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelContext
    {
        echo "channel(\$sid) is deprecated. Use v1->channel(\$sid) instead.";
        return $this->v1->channel($sid);
    }
    /**
     * @deprecated Use v1->configuration instead.
     */
    protected function getConfiguration() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationList
    {
        echo "configuration is deprecated. Use v1->configuration instead.";
        return $this->v1->configuration;
    }
    /**
     * @deprecated Use v1->configuration() instead.
     */
    protected function contextConfiguration() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationContext
    {
        echo "configuration() is deprecated. Use v1->configuration() instead.";
        return $this->v1->configuration();
    }
    /**
     * @deprecated Use v1->flexFlow instead.
     */
    protected function getFlexFlow() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowList
    {
        echo "flexFlow is deprecated. Use v1->flexFlow instead.";
        return $this->v1->flexFlow;
    }
    /**
     * @deprecated Use v1->flexFlow(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextFlexFlow(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowContext
    {
        echo "flexFlow(\$sid) is deprecated. Use v1->flexFlow(\$sid) instead.";
        return $this->v1->flexFlow($sid);
    }
    /**
     * @deprecated Use v1->interaction instead.
     */
    protected function getInteraction() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InteractionList
    {
        echo "interaction is deprecated. Use v1->interaction instead.";
        return $this->v1->interaction;
    }
    /**
     * @deprecated Use v1->interaction(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextInteraction(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InteractionContext
    {
        echo "interaction(\$sid) is deprecated. Use v1->interaction(\$sid) instead.";
        return $this->v1->interaction($sid);
    }
    /**
     * @deprecated Use v1->webChannel instead.
     */
    protected function getWebChannel() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelList
    {
        echo "webChannel is deprecated. Use v1->webChannel instead.";
        return $this->v1->webChannel;
    }
    /**
     * @deprecated Use v1->webChannel(\$sid) instead.
     * @param string $sid The SID of the WebChannel resource to fetch
     */
    protected function contextWebChannel(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelContext
    {
        echo "webChannel(\$sid) is deprecated. Use v1->webChannel(\$sid) instead.";
        return $this->v1->webChannel($sid);
    }
    /**
     * @deprecated Use v2->webChannels instead.
     */
    protected function getWebChannels() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V2\WebChannelsList
    {
        echo "webChannels is deprecated. Use v2->webChannels instead.";
        return $this->v2->webChannels;
    }
}
