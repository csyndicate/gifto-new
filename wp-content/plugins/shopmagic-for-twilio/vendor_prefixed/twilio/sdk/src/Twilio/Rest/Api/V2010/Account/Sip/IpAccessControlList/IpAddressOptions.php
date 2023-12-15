<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */
namespace ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList;

use ShopMagicTwilioVendor\Twilio\Options;
use ShopMagicTwilioVendor\Twilio\Values;
abstract class IpAddressOptions
{
    /**
     * @param int $cidrPrefixLength An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     * @return CreateIpAddressOptions Options builder
     */
    public static function create(int $cidrPrefixLength = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\CreateIpAddressOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\CreateIpAddressOptions($cidrPrefixLength);
    }
    /**
     * @param string $ipAddress An IP address in dotted decimal notation from which you want to accept traffic. Any SIP requests from this IP address will be allowed by Twilio. IPv4 only supported today.
     * @param string $friendlyName A human readable descriptive text for this resource, up to 255 characters long.
     * @param int $cidrPrefixLength An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     * @return UpdateIpAddressOptions Options builder
     */
    public static function update(string $ipAddress = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, int $cidrPrefixLength = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE) : \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\UpdateIpAddressOptions
    {
        return new \ShopMagicTwilioVendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList\UpdateIpAddressOptions($ipAddress, $friendlyName, $cidrPrefixLength);
    }
}
class CreateIpAddressOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param int $cidrPrefixLength An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     */
    public function __construct(int $cidrPrefixLength = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE)
    {
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
    }
    /**
     * An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     *
     * @param int $cidrPrefixLength An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     * @return $this Fluent Builder
     */
    public function setCidrPrefixLength(int $cidrPrefixLength) : self
    {
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(\ShopMagicTwilioVendor\Twilio\Values::of($this->options), '', ' ');
        return '[Twilio.Api.V2010.CreateIpAddressOptions ' . $options . ']';
    }
}
class UpdateIpAddressOptions extends \ShopMagicTwilioVendor\Twilio\Options
{
    /**
     * @param string $ipAddress An IP address in dotted decimal notation from which you want to accept traffic. Any SIP requests from this IP address will be allowed by Twilio. IPv4 only supported today.
     * @param string $friendlyName A human readable descriptive text for this resource, up to 255 characters long.
     * @param int $cidrPrefixLength An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     */
    public function __construct(string $ipAddress = \ShopMagicTwilioVendor\Twilio\Values::NONE, string $friendlyName = \ShopMagicTwilioVendor\Twilio\Values::NONE, int $cidrPrefixLength = \ShopMagicTwilioVendor\Twilio\Values::INT_NONE)
    {
        $this->options['ipAddress'] = $ipAddress;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
    }
    /**
     * An IP address in dotted decimal notation from which you want to accept traffic. Any SIP requests from this IP address will be allowed by Twilio. IPv4 only supported today.
     *
     * @param string $ipAddress An IP address in dotted decimal notation from which you want to accept traffic. Any SIP requests from this IP address will be allowed by Twilio. IPv4 only supported today.
     * @return $this Fluent Builder
     */
    public function setIpAddress(string $ipAddress) : self
    {
        $this->options['ipAddress'] = $ipAddress;
        return $this;
    }
    /**
     * A human readable descriptive text for this resource, up to 255 characters long.
     *
     * @param string $friendlyName A human readable descriptive text for this resource, up to 255 characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     *
     * @param int $cidrPrefixLength An integer representing the length of the CIDR prefix to use with this IP address when accepting traffic. By default the entire IP address is used.
     * @return $this Fluent Builder
     */
    public function setCidrPrefixLength(int $cidrPrefixLength) : self
    {
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(\ShopMagicTwilioVendor\Twilio\Values::of($this->options), '', ' ');
        return '[Twilio.Api.V2010.UpdateIpAddressOptions ' . $options . ']';
    }
}
