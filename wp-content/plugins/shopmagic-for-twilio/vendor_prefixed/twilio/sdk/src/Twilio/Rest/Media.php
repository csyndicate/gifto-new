<?php

namespace ShopMagicTwilioVendor\Twilio\Rest;

use ShopMagicTwilioVendor\Twilio\Rest\Media\V1;
class Media extends \ShopMagicTwilioVendor\Twilio\Rest\MediaBase
{
    /**
     * @deprecated Use v1->mediaProcessor instead.
     */
    protected function getMediaProcessor() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaProcessorList
    {
        echo "mediaProcessor is deprecated. Use v1->mediaProcessor instead.";
        return $this->v1->mediaProcessor;
    }
    /**
     * @deprecated Use v1->mediaProcessor(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextMediaProcessor(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaProcessorContext
    {
        echo "mediaProcessor(\$sid) is deprecated. Use v1->mediaProcessor(\$sid) instead.";
        return $this->v1->mediaProcessor($sid);
    }
    /**
     * @deprecated Use v1->mediaRecording instead.
     */
    protected function getMediaRecording() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaRecordingList
    {
        echo "mediaRecording is deprecated. Use v1->mediaRecording instead.";
        return $this->v1->mediaRecording;
    }
    /**
     * @deprecated Use v1->mediaRecording(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextMediaRecording(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\MediaRecordingContext
    {
        echo "mediaRecording(\$sid) is deprecated. Use v1->mediaRecording(\$sid) instead.";
        return $this->v1->mediaRecording($sid);
    }
    /**
     * @deprecated Use v1->playerStreamer instead.
     */
    protected function getPlayerStreamer() : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerList
    {
        echo "playerStreamer is deprecated. Use v1->playerStreamer instead.";
        return $this->v1->playerStreamer;
    }
    /**
     * @deprecated Use v1->playerStreamer(\$sid) instead.
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextPlayerStreamer(string $sid) : \ShopMagicTwilioVendor\Twilio\Rest\Media\V1\PlayerStreamerContext
    {
        echo "playerStreamer(\$sid) is deprecated. Use v1->playerStreamer(\$sid) instead.";
        return $this->v1->playerStreamer($sid);
    }
}
