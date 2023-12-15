<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class Sip extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * Sip constructor.
     *
     * @param string $sipUrl SIP URL
     * @param array $attributes Optional attributes
     */
    public function __construct($sipUrl, $attributes = [])
    {
        parent::__construct('Sip', $sipUrl, $attributes);
    }
    /**
     * Add Username attribute.
     *
     * @param string $username SIP Username
     */
    public function setUsername($username) : self
    {
        return $this->setAttribute('username', $username);
    }
    /**
     * Add Password attribute.
     *
     * @param string $password SIP Password
     */
    public function setPassword($password) : self
    {
        return $this->setAttribute('password', $password);
    }
    /**
     * Add Url attribute.
     *
     * @param string $url Action URL
     */
    public function setUrl($url) : self
    {
        return $this->setAttribute('url', $url);
    }
    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     */
    public function setMethod($method) : self
    {
        return $this->setAttribute('method', $method);
    }
    /**
     * Add StatusCallbackEvent attribute.
     *
     * @param string[] $statusCallbackEvent Status callback events
     */
    public function setStatusCallbackEvent($statusCallbackEvent) : self
    {
        return $this->setAttribute('statusCallbackEvent', $statusCallbackEvent);
    }
    /**
     * Add StatusCallback attribute.
     *
     * @param string $statusCallback Status callback URL
     */
    public function setStatusCallback($statusCallback) : self
    {
        return $this->setAttribute('statusCallback', $statusCallback);
    }
    /**
     * Add StatusCallbackMethod attribute.
     *
     * @param string $statusCallbackMethod Status callback URL method
     */
    public function setStatusCallbackMethod($statusCallbackMethod) : self
    {
        return $this->setAttribute('statusCallbackMethod', $statusCallbackMethod);
    }
    /**
     * Add MachineDetection attribute.
     *
     * @param string $machineDetection Enable machine detection or end of greeting
     *                                 detection
     */
    public function setMachineDetection($machineDetection) : self
    {
        return $this->setAttribute('machineDetection', $machineDetection);
    }
    /**
     * Add AmdStatusCallbackMethod attribute.
     *
     * @param string $amdStatusCallbackMethod HTTP Method to use with
     *                                        amd_status_callback
     */
    public function setAmdStatusCallbackMethod($amdStatusCallbackMethod) : self
    {
        return $this->setAttribute('amdStatusCallbackMethod', $amdStatusCallbackMethod);
    }
    /**
     * Add AmdStatusCallback attribute.
     *
     * @param string $amdStatusCallback The URL we should call to send amd status
     *                                  information to your application
     */
    public function setAmdStatusCallback($amdStatusCallback) : self
    {
        return $this->setAttribute('amdStatusCallback', $amdStatusCallback);
    }
    /**
     * Add MachineDetectionTimeout attribute.
     *
     * @param int $machineDetectionTimeout Number of seconds to wait for machine
     *                                     detection
     */
    public function setMachineDetectionTimeout($machineDetectionTimeout) : self
    {
        return $this->setAttribute('machineDetectionTimeout', $machineDetectionTimeout);
    }
    /**
     * Add MachineDetectionSpeechThreshold attribute.
     *
     * @param int $machineDetectionSpeechThreshold Number of milliseconds for
     *                                             measuring stick for the length
     *                                             of the speech activity
     */
    public function setMachineDetectionSpeechThreshold($machineDetectionSpeechThreshold) : self
    {
        return $this->setAttribute('machineDetectionSpeechThreshold', $machineDetectionSpeechThreshold);
    }
    /**
     * Add MachineDetectionSpeechEndThreshold attribute.
     *
     * @param int $machineDetectionSpeechEndThreshold Number of milliseconds of
     *                                                silence after speech activity
     */
    public function setMachineDetectionSpeechEndThreshold($machineDetectionSpeechEndThreshold) : self
    {
        return $this->setAttribute('machineDetectionSpeechEndThreshold', $machineDetectionSpeechEndThreshold);
    }
    /**
     * Add MachineDetectionSilenceTimeout attribute.
     *
     * @param int $machineDetectionSilenceTimeout Number of milliseconds of initial
     *                                            silence
     */
    public function setMachineDetectionSilenceTimeout($machineDetectionSilenceTimeout) : self
    {
        return $this->setAttribute('machineDetectionSilenceTimeout', $machineDetectionSilenceTimeout);
    }
}
