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
namespace ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
/**
 * @property string|null $accountSid
 * @property string|null $questionSid
 * @property string|null $question
 * @property string|null $description
 * @property array|null $category
 * @property string|null $answerSetId
 * @property bool|null $allowNa
 * @property int|null $usage
 * @property array|null $answerSet
 * @property string|null $url
 */
class InsightsQuestionnairesQuestionInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    /**
     * Initialize the InsightsQuestionnairesQuestionInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $questionSid The SID of the question
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $questionSid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'questionSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'question_sid'), 'question' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'question'), 'description' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'description'), 'category' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'category'), 'answerSetId' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'answer_set_id'), 'allowNa' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'allow_na'), 'usage' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'usage'), 'answerSet' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'answer_set'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url')];
        $this->solution = ['questionSid' => $questionSid ?: $this->properties['questionSid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return InsightsQuestionnairesQuestionContext Context for this InsightsQuestionnairesQuestionInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionContext($this->version, $this->solution['questionSid']);
        }
        return $this->context;
    }
    /**
     * Delete the InsightsQuestionnairesQuestionInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []) : bool
    {
        return $this->proxy()->delete($options);
    }
    /**
     * Update the InsightsQuestionnairesQuestionInstance
     *
     * @param bool $allowNa The flag to enable for disable NA for answer.
     * @param array|Options $options Optional Arguments
     * @return InsightsQuestionnairesQuestionInstance Updated InsightsQuestionnairesQuestionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(bool $allowNa, array $options = []) : \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionInstance
    {
        return $this->proxy()->update($allowNa, $options);
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
        return '[Twilio.FlexApi.V1.InsightsQuestionnairesQuestionInstance ' . \implode(' ', $context) . ']';
    }
}
