<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\FlexApi;

use ShopMagicTwilioVendor\Twilio\Domain;
use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\AssessmentsList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsConversationsList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesCategoryList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSegmentsList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSessionList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSettingsAnswerSetsList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSettingsCommentList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsUserRolesList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InteractionList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ProvisioningStatusList;
use ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelList;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property AssessmentsList $assessments
 * @property ChannelList $channel
 * @property ConfigurationList $configuration
 * @property FlexFlowList $flexFlow
 * @property InsightsAssessmentsCommentList $insightsAssessmentsComment
 * @property InsightsConversationsList $insightsConversations
 * @property InsightsQuestionnairesList $insightsQuestionnaires
 * @property InsightsQuestionnairesCategoryList $insightsQuestionnairesCategory
 * @property InsightsQuestionnairesQuestionList $insightsQuestionnairesQuestion
 * @property InsightsSegmentsList $insightsSegments
 * @property InsightsSessionList $insightsSession
 * @property InsightsSettingsAnswerSetsList $insightsSettingsAnswerSets
 * @property InsightsSettingsCommentList $insightsSettingsComment
 * @property InsightsUserRolesList $insightsUserRoles
 * @property InteractionList $interaction
 * @property ProvisioningStatusList $provisioningStatus
 * @property WebChannelList $webChannel
 * @method \Twilio\Rest\FlexApi\V1\ChannelContext channel(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\FlexFlowContext flexFlow(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\AssessmentsContext assessments(string $assessmentSid)
 * @method \Twilio\Rest\FlexApi\V1\InsightsQuestionnairesContext insightsQuestionnaires(string $questionnaireSid)
 * @method \Twilio\Rest\FlexApi\V1\InsightsQuestionnairesCategoryContext insightsQuestionnairesCategory(string $categorySid)
 * @method \Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionContext insightsQuestionnairesQuestion(string $questionSid)
 * @method \Twilio\Rest\FlexApi\V1\InteractionContext interaction(string $sid)
 * @method \Twilio\Rest\FlexApi\V1\WebChannelContext webChannel(string $sid)
 */
class V1 extends \ShopMagicTwilioVendor\Twilio\Version
{
    protected $_assessments;
    protected $_channel;
    protected $_configuration;
    protected $_flexFlow;
    protected $_insightsAssessmentsComment;
    protected $_insightsConversations;
    protected $_insightsQuestionnaires;
    protected $_insightsQuestionnairesCategory;
    protected $_insightsQuestionnairesQuestion;
    protected $_insightsSegments;
    protected $_insightsSession;
    protected $_insightsSettingsAnswerSets;
    protected $_insightsSettingsComment;
    protected $_insightsUserRoles;
    protected $_interaction;
    protected $_provisioningStatus;
    protected $_webChannel;
    /**
     * Construct the V1 version of FlexApi
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    protected function getAssessments() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\AssessmentsList
    {
        if (!$this->_assessments) {
            $this->_assessments = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\AssessmentsList($this);
        }
        return $this->_assessments;
    }
    protected function getChannel() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelList
    {
        if (!$this->_channel) {
            $this->_channel = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ChannelList($this);
        }
        return $this->_channel;
    }
    protected function getConfiguration() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationList
    {
        if (!$this->_configuration) {
            $this->_configuration = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ConfigurationList($this);
        }
        return $this->_configuration;
    }
    protected function getFlexFlow() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowList
    {
        if (!$this->_flexFlow) {
            $this->_flexFlow = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\FlexFlowList($this);
        }
        return $this->_flexFlow;
    }
    protected function getInsightsAssessmentsComment() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentList
    {
        if (!$this->_insightsAssessmentsComment) {
            $this->_insightsAssessmentsComment = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsAssessmentsCommentList($this);
        }
        return $this->_insightsAssessmentsComment;
    }
    protected function getInsightsConversations() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsConversationsList
    {
        if (!$this->_insightsConversations) {
            $this->_insightsConversations = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsConversationsList($this);
        }
        return $this->_insightsConversations;
    }
    protected function getInsightsQuestionnaires() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesList
    {
        if (!$this->_insightsQuestionnaires) {
            $this->_insightsQuestionnaires = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesList($this);
        }
        return $this->_insightsQuestionnaires;
    }
    protected function getInsightsQuestionnairesCategory() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesCategoryList
    {
        if (!$this->_insightsQuestionnairesCategory) {
            $this->_insightsQuestionnairesCategory = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesCategoryList($this);
        }
        return $this->_insightsQuestionnairesCategory;
    }
    protected function getInsightsQuestionnairesQuestion() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionList
    {
        if (!$this->_insightsQuestionnairesQuestion) {
            $this->_insightsQuestionnairesQuestion = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionList($this);
        }
        return $this->_insightsQuestionnairesQuestion;
    }
    protected function getInsightsSegments() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSegmentsList
    {
        if (!$this->_insightsSegments) {
            $this->_insightsSegments = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSegmentsList($this);
        }
        return $this->_insightsSegments;
    }
    protected function getInsightsSession() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSessionList
    {
        if (!$this->_insightsSession) {
            $this->_insightsSession = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSessionList($this);
        }
        return $this->_insightsSession;
    }
    protected function getInsightsSettingsAnswerSets() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSettingsAnswerSetsList
    {
        if (!$this->_insightsSettingsAnswerSets) {
            $this->_insightsSettingsAnswerSets = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSettingsAnswerSetsList($this);
        }
        return $this->_insightsSettingsAnswerSets;
    }
    protected function getInsightsSettingsComment() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSettingsCommentList
    {
        if (!$this->_insightsSettingsComment) {
            $this->_insightsSettingsComment = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsSettingsCommentList($this);
        }
        return $this->_insightsSettingsComment;
    }
    protected function getInsightsUserRoles() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsUserRolesList
    {
        if (!$this->_insightsUserRoles) {
            $this->_insightsUserRoles = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsUserRolesList($this);
        }
        return $this->_insightsUserRoles;
    }
    protected function getInteraction() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InteractionList
    {
        if (!$this->_interaction) {
            $this->_interaction = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InteractionList($this);
        }
        return $this->_interaction;
    }
    protected function getProvisioningStatus() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ProvisioningStatusList
    {
        if (!$this->_provisioningStatus) {
            $this->_provisioningStatus = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\ProvisioningStatusList($this);
        }
        return $this->_provisioningStatus;
    }
    protected function getWebChannel() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelList
    {
        if (!$this->_webChannel) {
            $this->_webChannel = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\WebChannelList($this);
        }
        return $this->_webChannel;
    }
    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown resource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : \ShopMagicTwilioVendor\Twilio\InstanceContext
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Resource does not have a context');
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.FlexApi.V1]';
    }
}
