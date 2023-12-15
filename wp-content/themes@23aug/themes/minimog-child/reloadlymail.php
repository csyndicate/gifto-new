<?php
/**
* Template Name: testapi
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty One  1.0
*/

get_header(); ?>


<?php

	


	global $wpdb;
	$result2 = $wpdb->get_results('SELECT payment_status FROM transaction_status');
    $result = $wpdb->get_results('SELECT transaction_id,product_name,price,currency,receivedmail FROM transaction_status where mail_status = "pending"');

    foreach ($result2 as $key => $value) {
        $data = $value->payment_status;
		
    }
	foreach ($result as $key => $tranid) {
        echo   $ids = $tranid->transaction_id;
		echo $name = $tranid->product_name;
		echo $price = $tranid->price;
		echo  $crrncy = $tranid->currency;
		echo $mail3 = $tranid->receivedmail;
		
    

if($data)
{
	//echo "new";
	
	$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/orders/transactions/$ids/cards";
//echo $gapi_url;
//$curl = curl_init();	
curl_setopt_array($curl, array(
  CURLOPT_URL => $gapi_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
  'Content-Type: application/json',
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;	

$result_data2 = json_decode($response,true);
//print_r($result_data2);
foreach ($result_data2 as $new1){
	$newcod = $new1['cardNumber'];
	$newpin = $new1['pinCode'];
	$prov = "Reloadly";
	$status = "successful";
}
 global $wpdb;
					
					$sql = "INSERT INTO vouchercards (transaction_id, api_name, redeem_pin,redeem_code, status) VALUES ('12345','reloadly','344545','','sucess')"; 

                    $wpdb->query($sql);
	//echo $newcod;
	//echo $newpin;
	if($newpin)
	{
	$to = $mail3; //sendto@example.com
					$subject = "Gift Card Details";
					$message = '<table border="0" cellpadding="0" cellspacing="0" width="600"
        style="background-color:transparent;border-radius:3px; margin:auto;" bgcolor="#fff;">
        <tbody>
            <tr>
                <td><div>
                <p style="margin-top:0; text-align: center; padding:10px 0;"><img src="https://gifto.co/wp-content/uploads/2022/11/gifto-200x198.png" width="20%" alt="Gifto: Gifting made better" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;max-width:100%;margin-left:0;margin-right:0" border="0" class="CToWUd" data-bit="iit"></p>						</div>
                </td>
            </tr>
                <tr>
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                        style="background-color:#7f54b3;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0"
                        bgcolor="#7f54b3">
                        <tbody>
                            <tr>
                                <td style="padding:36px 48px;display:block">
                                    <h1 style="font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align: center;color:#fff;background-color:inherit"
                                        bgcolor="inherit">Gifto Send you giftcard</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="border-right:1px solid #dedede; border-left: 1px solid #dedede; border-bottom: 1px solid #dedede; display: block;">
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="600">
                        <tbody>
                            <tr>
                                <td valign="top" style="background-color:#fff" bgcolor="#fff">

                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:48px 48px 32px">
                                                    <div style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left"
                                                        align="left">

                                                        <div style="margin-bottom:40px">
                                                            <table cellspacing="0" cellpadding="6" width="100%">
                                                                <tfoot>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:2px"
                                                                            align="left">Product Name</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:2px"
                                                                            align="left"><span>'.$name.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Amount</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span>'.$price.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Currency</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span>'.$crrncy.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Redeem Code</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span style="word-break:break-all;">'.$newcod.' </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Pin</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span style="word-break:break-all;">'.$newpin.'</span>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </td>
            </tr>
        </tbody>
    </table>
    <div style="max-width: 602px;margin: auto;padding: 20px 0px;">
        <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0 0 0 0;margin:0;" >
            *Terms & Conditions apply . Please check <a href="http://www.gifto.co"> http://www.gifto.co </a>for the respective gift card/brand voucher for usage terms and policies.
        </p>
        <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0;margin:0;" >
            Gifto: Gifting made better
        </p>
    </div>

</body>
';
         $headers = array('Content-Type: text/html; charset=UTF-8');
       wp_mail( $to, $subject, $message, $headers );
     $wpdb->query($wpdb->prepare("UPDATE transaction_status SET mail_status='done' WHERE transaction_id=$ids"));	   
	}
	elseif($newcod)
	{
	$to = $mail3; //sendto@example.com
					$subject = "Gift Card Details";
					$message = '<table border="0" cellpadding="0" cellspacing="0" width="600"
        style="background-color:transparent;border-radius:3px; margin:auto;" bgcolor="#fff;">
        <tbody>
            <tr>
                <td><div>
                <p style="margin-top:0; text-align: center; padding:10px 0;"><img src="https://gifto.co/wp-content/uploads/2022/11/gifto-200x198.png" alt="Gifto: Gifting made better" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;max-width:100%;margin-left:0;margin-right:0" border="0" class="CToWUd" data-bit="iit"></p>						</div>
                </td>
            </tr>
                <tr>
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                        style="background-color:#7f54b3;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0"
                        bgcolor="#7f54b3">
                        <tbody>
                            <tr>
                                <td style="padding:36px 48px;display:block">
                                    <h1 style="font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align: center;color:#fff;background-color:inherit"
                                        bgcolor="inherit">Gifto Send you giftcard</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="border-right:1px solid #dedede; border-left: 1px solid #dedede; border-bottom: 1px solid #dedede; display: block;">
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="600">
                        <tbody>
                            <tr>
                                <td valign="top" style="background-color:#fff" bgcolor="#fff">

                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:48px 48px 32px">
                                                    <div style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left"
                                                        align="left">

                                                        <div style="margin-bottom:40px">
                                                            <table cellspacing="0" cellpadding="6" width="100%">
                                                                <tfoot>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:2px"
                                                                            align="left">Product Name</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:2px"
                                                                            align="left"><span>'.$name.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Amount</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span>'.$price.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Currency</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span>'.$crrncy.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Redeem Code</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span style="word-break:break-all;">'.$newcod.' </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Pin</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span style="word-break:break-all;">'.$newpin.'</span>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </td>
            </tr>
        </tbody>
    </table>
    <div style="max-width: 602px;margin: auto;padding: 20px 0px;">
        <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0 0 0 0;margin:0;" >
            *Terms & Conditions apply . Please check <a href="http://www.gifto.co"> http://www.gifto.co </a>for the respective gift card/brand voucher for usage terms and policies.
        </p>
        <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0;margin:0;" >
            Gifto: Gifting made better
        </p>
    </div>

</body>';
         $headers = array('Content-Type: text/html; charset=UTF-8');
       wp_mail( $to, $subject, $message, $headers );
     $wpdb->query($wpdb->prepare("UPDATE transaction_status SET mail_status='done' WHERE transaction_id=$ids"));	   
	}
	elseif($newcod && $newpin )
		{
	$to = $mail3; //sendto@example.com
					$subject = "Gift Card Details";
					$message = '<table border="0" cellpadding="0" cellspacing="0" width="600"
        style="background-color:transparent;border-radius:3px; margin:auto;" bgcolor="#fff;">
        <tbody>
            <tr>
                <td><div>
                <p style="margin-top:0; text-align: center; padding:10px 0;"><img src="https://gifto.co/wp-content/uploads/2022/11/gifto-200x198.png" alt="Gifto: Gifting made better" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;max-width:100%;margin-left:0;margin-right:0" border="0" class="CToWUd" data-bit="iit"></p>						</div>
                </td>
            </tr>
                <tr>
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                        style="background-color:#7f54b3;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0"
                        bgcolor="#7f54b3">
                        <tbody>
                            <tr>
                                <td style="padding:36px 48px;display:block">
                                    <h1 style="font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align: center;color:#fff;background-color:inherit"
                                        bgcolor="inherit">Gifto Send you giftcard</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="border-right:1px solid #dedede; border-left: 1px solid #dedede; border-bottom: 1px solid #dedede; display: block;">
                <td align="center" valign="top">

                    <table border="0" cellpadding="0" cellspacing="0" width="600">
                        <tbody>
                            <tr>
                                <td valign="top" style="background-color:#fff" bgcolor="#fff">

                                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:48px 48px 32px">
                                                    <div style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left"
                                                        align="left">

                                                        <div style="margin-bottom:40px">
                                                            <table cellspacing="0" cellpadding="6" width="100%">
                                                                <tfoot>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:2px"
                                                                            align="left">Product Name</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:2px"
                                                                            align="left"><span>'.$name.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Amount</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span>'.$price.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Currency</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span>'.$crrncy.'</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Redeem Code</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span style="word-break:break-all;">'.$newcod.' </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2"
                                                                            style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">Pin</th>
                                                                        <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"
                                                                            align="left">
                                                                            <span style="word-break:break-all;">'.$newpin.'</span>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </td>
            </tr>
        </tbody>
    </table>
    <div style="max-width: 602px;margin: auto;padding: 20px 0px;">
        <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0 0 0 0;margin:0;" >
            *Terms & Conditions apply . Please check <a href="http://www.gifto.co"> http://www.gifto.co </a>for the respective gift card/brand voucher for usage terms and policies.
        </p>
        <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0;margin:0;" >
            Gifto: Gifting made better
        </p>
    </div>

</body>';
         $headers = array('Content-Type: text/html; charset=UTF-8');
       wp_mail( $to, $subject, $message, $headers );
     $wpdb->query($wpdb->prepare("UPDATE transaction_status SET mail_status='done' WHERE transaction_id=$ids"));	   
	}
	
	
}

}
//$cardnum = $result_data2['cardNumber'];
//echo $cardnum;
?>
<?php get_footer(); ?>