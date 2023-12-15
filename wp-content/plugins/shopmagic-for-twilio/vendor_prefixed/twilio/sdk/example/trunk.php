<?php

namespace ShopMagicTwilioVendor;

require __DIR__ . '/../src/Twilio/autoload.php';
use ShopMagicTwilioVendor\Twilio\Rest\Client;
$sid = \getenv('TWILIO_ACCOUNT_SID');
$token = \getenv('TWILIO_AUTH_TOKEN');
$client = new \ShopMagicTwilioVendor\Twilio\Rest\Client($sid, $token);
// Create Trunk
$trunk = $client->trunking->v1->trunks->create(["friendlyName" => "shiny trunk", "secure" => \false]);
print "\n" . $trunk . "\n";
