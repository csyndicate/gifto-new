===  WPSMS For WooCommerce ===
Contributors: mohsinoffline & spartac, freemius
Tags: twilio, sms, text message, woocommerce sms,wp sms
Donate link: https://themebound.com/contact-us/send-payment/
Requires at least: 4.8
Tested up to: 5.0
Requires PHP: 5.6
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Woocommerce SMS plugin will allow you to send SMS to your Woocommerce store's customers to notify them about their orders' statuses.

== Description ==
The Woocommerce SMS for Twilio plugin will allow you to send SMS Your customers on your store powered by the Woocommerce plugin. The plugin integrates the SMS service from Twilio, which is reasonably priced with an excellent API, via our WP Twilio Core plugin on the WordPress.org repository.


#### Woocommerce SMS Features

-   Send notifications by SMS as per the orders statuses.

- Customize the sms for each status (Pending,On hold,Completed, Shipped,Failed,Cancelled,Refunded)

- Customer profile details shortcodes to customize the sms (%shop_name%, %order_id%, %order_count%, %order_amount%, %order_status%, %billing_name%, %shipping_name%, %shipping_method%. )
Opt-in Checkbox Label and  Opt-in Checkbox Option.

-  Leverage the excellent Twilio API via our WP Twilio Core pluginSend instant SMS to your event registrants/attendees when there is less than a set number of days/hours left to start of the event
-   Select the field ID (question) in the registration form that you created to store mobile numbers
-   Leverage the excellent Twilio API via our WP Twilio Core plugin

#### WP Twilio Core Features

-   Optionally shorten URLs using Bit.ly or Google URL Shortener API
-   Basic logging capability to keep track of up to 100 entries
-   Directly send a text message to any permissible number from the admin panel for testing

#### Pre-Purchase Checklist

Since Twilio API is a paid service, we suggest you make sure it will work for you before you purchase the plugin. Here’s how to do it:

1.  **Sign up for Twilio’s  [Free Trial](https://www.twilio.com/help/faq/twilio-basics/how-does-twilios-free-trial-work).**  
    Yes you can! They give a few dollars worth of credit to all trial accounts, and you can use your credit to make sure it works in your country or target market. You can choose an SMS enabled Twilio number for a start. Be mindful of the fact that trial accounts have extra restrictions, for example, you may not have a local number available in your country for yourself (but you can send global SMS anyway), you will need to verify every number you send an SMS to beforehand and the message will be prefixed with a statement saying it’s a Twilio trial account. Of course, these restrictions will be lifted when you have a paid subscription, and do not apply to the excellent dev tools you can use to send SMS or access message history for debugging or testing.
2.  **Install  [WP Twilio Core](https://wordpress.org/plugins/wp-twilio-core/).**  
    WP Twilio core is a simple plugin to add SMS capability to your WordPress website using the Twilio API. It’s available for free from WordPress.org. We have created this plugin so developers like us can extend it and integrate Twilio with a WordPress website of any niche/type. What it will allow you to do at this point is send messages directly from your admin panel to any permissible (verified for trial accounts, remember?) number. The Event Espresso SMS Reminder plugin also depends on this plugin, so best to familiarise yourself with it before you make your purchase.
3.  **Read the  [Twilio SMS FAQs](https://www.twilio.com/help/faq/sms).**  
    This is another important point, especially if the above steps aren’t working for you. If you are already sending messages to your verified mobile numbers but somehow not having them delivered to you, then you may find your answer on Twilio’s SMS FAQs. Make sure your target country/market and all their network providers are supported. They have pretty much made it clear who CANNOT receive a message. In India for instance, any number on the “National Do Not Call Regsitry” will not receive SMS via Twilio.

#### Requirements

There are a couple of requirements in order to use the Event Espresso SMS Reminder extension:

1.  You must have a verified [Twilio](https://www.twilio.com/) account (free trial or paid subscription).
2.  You must have the  [WP Twilio Core WordPress plugin](https://wordpress.org/plugins/wp-twilio-core/)  (free) installed (1.2.0+).
3.  You must be using the Woocommerce plugin.
4.  You must have created a Mobile Number question (text field) and made sure it appears on the registration forms.

== Installation ==
1.  Install the  [WP Twilio Core WordPress plugin](https://wordpress.org/plugins/wp-twilio-core/) from WordPress.org.
2.  Download the Plugin zip file  **ee-sms.zip**.
3.  Open  **WP Admin dashboard → Plugins → Add new → Upload**  
    Upload and activate the Plugin from Plugins page.
4.  Go to  **Settings** → **Twilio** →  **Settings tab**.
5.  Enter API credentials and Twilio number.
6.  Make sure you already have a Mobile Number question in your registration forms.
7.  Go to  **Settings** → **Twilio** →  **Woocommerce tab**.
8.  Select the question that your users are leaving their mobile numbers against.
9. Set the  notification of the orders' statuses and the message content using the available shortcodes.

== Frequently Asked Questions ==
Please make sure you read through the  [SMS FAQs](https://www.twilio.com/help/faq/sms)  on the Twilio website first.

As mentioned in the description, you can make sure Twilio works for you as a service before spending anything. Just sign up for a free trial, choose an SMS enabled Twilio number, verify destination numbers, and start sending messages from either [API explorer](https://www.twilio.com/user/account/developer-tools/api-explorer/message-list) or use the free  [WP Twilio Core](https://wordpress.org/plugins/wp-twilio-core/)  plugin.

** Is this service chargeable?**

Yes, you will need to signup on  [Twilio](https://www.twilio.com/), and obtain a number with SMS capability. However, they have trial accounts available which should have enough credit for you to try out the plugin!

**Do I need to verify recipient numbers?**

Only if you have a trial account. Once you get a paid subscription, you can send message to any number without restrictions from Twilio’s side.

**The plugin appears to have sent the message successfully, why did it not get delivered?**

There can be many reasons for that. Twilio has this great thing called  [API explorer](https://www.twilio.com/user/account/developer-tools/api-explorer/message-list)  that you can use to check what went on with your message. If that does not help, you can always submit a support request with them, supply them with your  [message SID](https://www.twilio.com/help/faq/sms/what-is-an-sms-message-sid) and they should look in for you.

== Changelog ==
**1.0.0** (05/02/2020)
Stable version

**1.0.1** (04/01/2017)
Issue with cron not initiating

**1.0.0** (15/10/2015)
Initial release version