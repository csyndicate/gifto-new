<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Record extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Record constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct('Record', null, $attributes);
    }
    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     * @return static $this.
     */
    public function setAction($action)
    {
        return $this->setAttribute('action', $action);
    }
    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method)
    {
        return $this->setAttribute('method', $method);
    }
    /**
     * Add Timeout attribute.
     *
     * @param int $timeout Timeout to begin recording
     * @return static $this.
     */
    public function setTimeout($timeout)
    {
        return $this->setAttribute('timeout', $timeout);
    }
    /**
     * Add FinishOnKey attribute.
     *
     * @param string $finishOnKey Finish recording on key
     * @return static $this.
     */
    public function setFinishOnKey($finishOnKey)
    {
        return $this->setAttribute('finishOnKey', $finishOnKey);
    }
    /**
     * Add MaxLength attribute.
     *
     * @param int $maxLength Max time to record in seconds
     * @return static $this.
     */
    public function setMaxLength($maxLength)
    {
        return $this->setAttribute('maxLength', $maxLength);
    }
    /**
     * Add PlayBeep attribute.
     *
     * @param bool $playBeep Play beep
     * @return static $this.
     */
    public function setPlayBeep($playBeep)
    {
        return $this->setAttribute('playBeep', $playBeep);
    }
    /**
     * Add Trim attribute.
     *
     * @param string $trim Trim the recording
     * @return static $this.
     */
    public function setTrim($trim)
    {
        return $this->setAttribute('trim', $trim);
    }
    /**
     * Add RecordingStatusCallback attribute.
     *
     * @param string $recordingStatusCallback Status callback URL
     * @return static $this.
     */
    public function setRecordingStatusCallback($recordingStatusCallback)
    {
        return $this->setAttribute('recordingStatusCallback', $recordingStatusCallback);
    }
    /**
     * Add RecordingStatusCallbackMethod attribute.
     *
     * @param string $recordingStatusCallbackMethod Status callback URL method
     * @return static $this.
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod)
    {
        return $this->setAttribute('recordingStatusCallbackMethod', $recordingStatusCallbackMethod);
    }
    /**
     * Add RecordingStatusCallbackEvent attribute.
     *
     * @param string $recordingStatusCallbackEvent Recording status callback events
     * @return static $this.
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent)
    {
        return $this->setAttribute('recordingStatusCallbackEvent', $recordingStatusCallbackEvent);
    }
    /**
     * Add Transcribe attribute.
     *
     * @param bool $transcribe Transcribe the recording
     * @return static $this.
     */
    public function setTranscribe($transcribe)
    {
        return $this->setAttribute('transcribe', $transcribe);
    }
    /**
     * Add TranscribeCallback attribute.
     *
     * @param string $transcribeCallback Transcribe callback URL
     * @return static $this.
     */
    public function setTranscribeCallback($transcribeCallback)
    {
        return $this->setAttribute('transcribeCallback', $transcribeCallback);
    }
}
