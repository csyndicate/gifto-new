<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Workflow;

use ShopMagicTwilioVendor\Twilio\ListResource;
use ShopMagicTwilioVendor\Twilio\Version;
class WorkflowStatisticsList extends \ShopMagicTwilioVendor\Twilio\ListResource
{
    /**
     * Construct the WorkflowStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             Workflow
     * @param string $workflowSid Returns the list of Tasks that are being
     *                            controlled by the Workflow with the specified SID
     *                            value
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowStatisticsList
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $workspaceSid, $workflowSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, 'workflowSid' => $workflowSid);
    }
    /**
     * Constructs a WorkflowStatisticsContext
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowStatisticsContext
     */
    public function getContext()
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Taskrouter\V1\Workspace\Workflow\WorkflowStatisticsContext($this->version, $this->solution['workspaceSid'], $this->solution['workflowSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        return '[Twilio.Taskrouter.V1.WorkflowStatisticsList]';
    }
}
