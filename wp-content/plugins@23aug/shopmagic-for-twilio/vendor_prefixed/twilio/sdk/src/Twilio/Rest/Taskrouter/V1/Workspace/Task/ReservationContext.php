<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Task;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Serialize;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
class ReservationContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the ReservationContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the
     *                             TaskReservation resource to fetch
     * @param string $taskSid The SID of the reserved Task resource with the
     *                        TaskReservation resource to fetch
     * @param string $sid The SID of the TaskReservation resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationContext
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid, $taskSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'taskSid' => $taskSid, 'sid' => $sid);
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Tasks/' . \rawurlencode($taskSid) . '/Reservations/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch a ReservationInstance
     *
     * @return ReservationInstance Fetched ReservationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch()
    {
        $params = \ShopMagicTwilioVendor\Twilio\Values::of(array());
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['taskSid'], $this->solution['sid']);
    }
    /**
     * Update the ReservationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ReservationInstance Updated ReservationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array())
    {
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(array('ReservationStatus' => $options['reservationStatus'], 'WorkerActivitySid' => $options['workerActivitySid'], 'Instruction' => $options['instruction'], 'DequeuePostWorkActivitySid' => $options['dequeuePostWorkActivitySid'], 'DequeueFrom' => $options['dequeueFrom'], 'DequeueRecord' => $options['dequeueRecord'], 'DequeueTimeout' => $options['dequeueTimeout'], 'DequeueTo' => $options['dequeueTo'], 'DequeueStatusCallbackUrl' => $options['dequeueStatusCallbackUrl'], 'CallFrom' => $options['callFrom'], 'CallRecord' => $options['callRecord'], 'CallTimeout' => $options['callTimeout'], 'CallTo' => $options['callTo'], 'CallUrl' => $options['callUrl'], 'CallStatusCallbackUrl' => $options['callStatusCallbackUrl'], 'CallAccept' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['callAccept']), 'RedirectCallSid' => $options['redirectCallSid'], 'RedirectAccept' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['redirectAccept']), 'RedirectUrl' => $options['redirectUrl'], 'To' => $options['to'], 'From' => $options['from'], 'StatusCallback' => $options['statusCallback'], 'StatusCallbackMethod' => $options['statusCallbackMethod'], 'StatusCallbackEvent' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['statusCallbackEvent'], function ($e) {
            return $e;
        }), 'Timeout' => $options['timeout'], 'Record' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['record']), 'Muted' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['muted']), 'Beep' => $options['beep'], 'StartConferenceOnEnter' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['startConferenceOnEnter']), 'EndConferenceOnExit' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['endConferenceOnExit']), 'WaitUrl' => $options['waitUrl'], 'WaitMethod' => $options['waitMethod'], 'EarlyMedia' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['earlyMedia']), 'MaxParticipants' => $options['maxParticipants'], 'ConferenceStatusCallback' => $options['conferenceStatusCallback'], 'ConferenceStatusCallbackMethod' => $options['conferenceStatusCallbackMethod'], 'ConferenceStatusCallbackEvent' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['conferenceStatusCallbackEvent'], function ($e) {
            return $e;
        }), 'ConferenceRecord' => $options['conferenceRecord'], 'ConferenceTrim' => $options['conferenceTrim'], 'RecordingChannels' => $options['recordingChannels'], 'RecordingStatusCallback' => $options['recordingStatusCallback'], 'RecordingStatusCallbackMethod' => $options['recordingStatusCallbackMethod'], 'ConferenceRecordingStatusCallback' => $options['conferenceRecordingStatusCallback'], 'ConferenceRecordingStatusCallbackMethod' => $options['conferenceRecordingStatusCallbackMethod'], 'Region' => $options['region'], 'SipAuthUsername' => $options['sipAuthUsername'], 'SipAuthPassword' => $options['sipAuthPassword'], 'DequeueStatusCallbackEvent' => \ShopMagicTwilioVendor\Twilio\Serialize::map($options['dequeueStatusCallbackEvent'], function ($e) {
            return $e;
        }), 'PostWorkActivitySid' => $options['postWorkActivitySid'], 'SupervisorMode' => $options['supervisorMode'], 'Supervisor' => $options['supervisor'], 'EndConferenceOnCustomerExit' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['endConferenceOnCustomerExit']), 'BeepOnCustomerEntrance' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($options['beepOnCustomerEntrance'])));
        $payload = $this->version->update('POST', $this->uri, array(), $data);
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['taskSid'], $this->solution['sid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Taskrouter.V1.ReservationContext ' . \implode(' ', $context) . ']';
    }
}
