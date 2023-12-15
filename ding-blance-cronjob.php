<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

		$ding_amount = get_field('ding_amount','option');
		$ding_amnt = get_field('ding1','option');
		//print_r ($ding_amount);
		
require($_SERVER['DOCUMENT_ROOT'].'/wp-blog-header.php'); 
global $wpdb;

$admin_email = get_option( 'admin_email' ); 
$mailsend_mk = get_field('email_send_low_blnce','option');
$recipients = array(
  $admin_email.','.$mailsend_mk
  // more emails
);
$email_to = implode(',', $recipients);
//$email_to = "testdeviser@gmail.com";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetBalance',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'api_key: KJIE4QYvKk95YVUTqCzl9v',
    'Cookie: visid_incap_1694192=/GFjcyk9QCOLEPJazG6zavnZz2IAAAAAQUIPAAAAAADIZLCa+SmmK+YX1cP7z8uY; __cf_bm=QHtWe7XjalJ5STBsUNf1eM05i3mt707nu.ADUYM3kxc-1661840486-0-AbcaFoDdIybPeAgnFelBo+8qXelhFyAqOW6DARhLxnLfYSXz1ZsorRfFLrQavMWyWuDT7C8vNfzlAJCEFmK09jc='
  ),
));

$response = curl_exec($curl);

curl_close($curl);



		$result_data = json_decode($response, true);
		update_field('ding_amount', $result_data['Balance'], 'option' );
		/* echo "<pre>";
		print_r ($result_data);
		echo "</pre>"; */ 
		//echo $response;

		 $ding_wallet_rs = $result_data['Balance'];
		//echo $wallet_rs;

		if ($ding_wallet_rs<$ding_amnt){
			require_once("wp-load.php");
				ini_set( 'display_errors', 1 );
				error_reporting( E_ALL );
				$from = "hello@gifto.co";
				$to = $email_to;
				$subject = "Ding wallet Balance is low";
				$message = "Hi, Your Ding balance amount is less than threshold amount. Please recharge."."\r\n"."";
				$message .= "Your current balance is (" . $ding_wallet_rs.")";
				$headers = "From:" . $from;
				if(wp_mail($to,$subject,$message,$headers)) {
					echo "The email message was sent.";
				} else {
					echo "The email message was not sent.";
				}
				
		} 
?>		