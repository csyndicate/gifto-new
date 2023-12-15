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
use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\InstanceContext;
use ShopMagicTwilioVendor\Twilio\Serialize;
class InsightsQuestionnairesQuestionContext extends \ShopMagicTwilioVendor\Twilio\InstanceContext
{
    /**
     * Initialize the InsightsQuestionnairesQuestionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $questionSid The SID of the question
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, $questionSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['questionSid' => $questionSid];
        $this->uri = '/Insights/QualityManagement/Questions/' . \rawurlencode($questionSid) . '';
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
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['Authorization' => $options['authorization']]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
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
        $options = new \ShopMagicTwilioVendor\Twilio\Values($options);
        $data = \ShopMagicTwilioVendor\Twilio\Values::of(['AllowNa' => \ShopMagicTwilioVendor\Twilio\Serialize::booleanToString($allowNa), 'CategorySid' => $options['categorySid'], 'Question' => $options['question'], 'Description' => $options['description'], 'AnswerSetId' => $options['answerSetId']]);
        $headers = \ShopMagicTwilioVendor\Twilio\Values::of(['Authorization' => $options['authorization']]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);
        return new \ShopMagicTwilioVendor\Twilio\Rest\FlexApi\V1\InsightsQuestionnairesQuestionInstance($this->version, $payload, $this->solution['questionSid']);
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
        return '[Twilio.FlexApi.V1.InsightsQuestionnairesQuestionContext ' . \implode(' ', $context) . ']';
    }
}