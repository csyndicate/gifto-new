<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Preview
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\FieldTypeList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\QueryList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\TaskList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\ModelBuildList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\StyleSheetList;
use ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\DialogueList;
/**
 * @property string|null $accountSid
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $friendlyName
 * @property string|null $latestModelBuildSid
 * @property array|null $links
 * @property bool|null $logQueries
 * @property string|null $sid
 * @property string|null $uniqueName
 * @property string|null $url
 * @property string|null $callbackUrl
 * @property string|null $callbackEvents
 */
class AssistantInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_fieldTypes;
    protected $_queries;
    protected $_tasks;
    protected $_modelBuilds;
    protected $_assistantFallbackActions;
    protected $_assistantInitiationActions;
    protected $_styleSheet;
    protected $_dialogues;
    /**
     * Initialize the AssistantInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid A 34 character string that uniquely identifies this resource.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'latestModelBuildSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'latest_model_build_sid'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links'), 'logQueries' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'log_queries'), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'uniqueName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'unique_name'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'callbackUrl' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'callback_url'), 'callbackEvents' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'callback_events')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return AssistantContext Context for this AssistantInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\AssistantContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\AssistantContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the AssistantInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the AssistantInstance
     *
     * @return AssistantInstance Fetched AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\AssistantInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the AssistantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return AssistantInstance Updated AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\AssistantInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the fieldTypes
     */
    protected function getFieldTypes() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\FieldTypeList
    {
        return $this->proxy()->fieldTypes;
    }
    /**
     * Access the queries
     */
    protected function getQueries() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\QueryList
    {
        return $this->proxy()->queries;
    }
    /**
     * Access the tasks
     */
    protected function getTasks() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\TaskList
    {
        return $this->proxy()->tasks;
    }
    /**
     * Access the modelBuilds
     */
    protected function getModelBuilds() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\ModelBuildList
    {
        return $this->proxy()->modelBuilds;
    }
    /**
     * Access the assistantFallbackActions
     */
    protected function getAssistantFallbackActions() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsList
    {
        return $this->proxy()->assistantFallbackActions;
    }
    /**
     * Access the assistantInitiationActions
     */
    protected function getAssistantInitiationActions() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsList
    {
        return $this->proxy()->assistantInitiationActions;
    }
    /**
     * Access the styleSheet
     */
    protected function getStyleSheet() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\StyleSheetList
    {
        return $this->proxy()->styleSheet;
    }
    /**
     * Access the dialogues
     */
    protected function getDialogues() : \ShopMagicTwilioVendor\Twilio\Rest\Preview\Understand\Assistant\DialogueList
    {
        return $this->proxy()->dialogues;
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new \ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException('Unknown property: ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Preview.Understand.AssistantInstance ' . \implode(' ', $context) . ']';
    }
}
