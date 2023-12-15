<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace ShopMagicTwilioVendor\Twilio\TwiML\Voice;

use ShopMagicTwilioVendor\Twilio\TwiML\TwiML;
class SsmlW extends \ShopMagicTwilioVendor\Twilio\TwiML\TwiML
{
    /**
     * SsmlW constructor.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = [])
    {
        parent::__construct('w', $words, $attributes);
    }
    /**
     * Add Break child.
     *
     * @param array $attributes Optional attributes
     * @return SsmlBreak Child element.
     */
    public function break_($attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlBreak
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlBreak($attributes));
    }
    /**
     * Add Emphasis child.
     *
     * @param string $words Words to emphasize
     * @param array $attributes Optional attributes
     * @return SsmlEmphasis Child element.
     */
    public function emphasis($words, $attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlEmphasis
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlEmphasis($words, $attributes));
    }
    /**
     * Add Phoneme child.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     * @return SsmlPhoneme Child element.
     */
    public function phoneme($words, $attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlPhoneme
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlPhoneme($words, $attributes));
    }
    /**
     * Add Prosody child.
     *
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     * @return SsmlProsody Child element.
     */
    public function prosody($words, $attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlProsody
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlProsody($words, $attributes));
    }
    /**
     * Add Say-As child.
     *
     * @param string $words Words to be interpreted
     * @param array $attributes Optional attributes
     * @return SsmlSayAs Child element.
     */
    public function say_As($words, $attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlSayAs
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlSayAs($words, $attributes));
    }
    /**
     * Add Sub child.
     *
     * @param string $words Words to be substituted
     * @param array $attributes Optional attributes
     * @return SsmlSub Child element.
     */
    public function sub($words, $attributes = []) : \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlSub
    {
        return $this->nest(new \ShopMagicTwilioVendor\Twilio\TwiML\Voice\SsmlSub($words, $attributes));
    }
    /**
     * Add Role attribute.
     *
     * @param string $role Customize the pronunciation of words by specifying the
     *                     word’s part of speech or alternate meaning
     */
    public function setRole($role) : self
    {
        return $this->setAttribute('role', $role);
    }
}