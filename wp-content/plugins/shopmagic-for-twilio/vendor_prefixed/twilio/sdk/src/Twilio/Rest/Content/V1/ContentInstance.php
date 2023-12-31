<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Content
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Content\V1;

use ShopMagicTwilioVendor\Twilio\Exceptions\TwilioException;
use ShopMagicTwilioVendor\Twilio\InstanceResource;
use ShopMagicTwilioVendor\Twilio\Values;
use ShopMagicTwilioVendor\Twilio\Version;
use ShopMagicTwilioVendor\Twilio\Deserialize;
use ShopMagicTwilioVendor\Twilio\Rest\Content\V1\Content\ApprovalFetchList;
/**
 * @property \DateTime|null $dateCreated
 * @property \DateTime|null $dateUpdated
 * @property string|null $sid
 * @property string|null $accountSid
 * @property string|null $friendlyName
 * @property string|null $language
 * @property array|null $variables
 * @property array|null $types
 * @property string|null $url
 * @property array|null $links
 */
class ContentInstance extends \ShopMagicTwilioVendor\Twilio\InstanceResource
{
    protected $_approvalFetch;
    /**
     * Initialize the ContentInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The Twilio-provided string that uniquely identifies the Content resource to fetch.
     */
    public function __construct(\ShopMagicTwilioVendor\Twilio\Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['dateCreated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_created')), 'dateUpdated' => \ShopMagicTwilioVendor\Twilio\Deserialize::dateTime(\ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'date_updated')), 'sid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'sid'), 'accountSid' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'account_sid'), 'friendlyName' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'friendly_name'), 'language' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'language'), 'variables' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'variables'), 'types' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'types'), 'url' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'url'), 'links' => \ShopMagicTwilioVendor\Twilio\Values::array_get($payload, 'links')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ContentContext Context for this ContentInstance
     */
    protected function proxy() : \ShopMagicTwilioVendor\Twilio\Rest\Content\V1\ContentContext
    {
        if (!$this->context) {
            $this->context = new \ShopMagicTwilioVendor\Twilio\Rest\Content\V1\ContentContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Delete the ContentInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the ContentInstance
     *
     * @return ContentInstance Fetched ContentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : \ShopMagicTwilioVendor\Twilio\Rest\Content\V1\ContentInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Access the approvalFetch
     */
    protected function getApprovalFetch() : \ShopMagicTwilioVendor\Twilio\Rest\Content\V1\Content\ApprovalFetchList
    {
        return $this->proxy()->approvalFetch;
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
        return '[Twilio.Content.V1.ContentInstance ' . \implode(' ', $context) . ']';
    }
}
