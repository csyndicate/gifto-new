<?php     
/*
Template Name: Recharge Thanku Page
*/
get_header();
//require_once('functions.php');
?> 

<style>

.page-template-thanks-recharge .page-title-bar-content {
	display: none;
}

.Thank_you {
	text-align: center;
	padding-top: 50px;
}
.Thank_you h2 {
	font-family: jost;
	font-weight: 700;
	font-size: 20px;
}

.process {
	display: flex;
	justify-content: space-between;
	width: 29%;
	margin: auto;
}


.Processing{
position: relative;
}

.Processing::after {
	content: '';
	top: 13px;
	left: -72px;
	background-color: black;
	width: 56px;
	height: 2px;
	position: absolute;
}



.Sent{
position: relative;
}

.Sent::after {
	content: '';
	top: 13px;
	left: -72px;
	background-color: black;
	width: 56px;
	height: 2px;
	position: absolute;
}

.process p{
	color: black;
}

.button_recharge{
    text-align:center;
}


.process {
	padding: 30px 0;
}


.button_recharge {
	margin-bottom: 60px;
	margin-top: 41px;
}

.button_recharge a {
	background: #cc3535;
	border: none;
	padding: 12px 10px;
	border-radius: 9px;
	color: white;
}

.Thank_you img {
    width: 350px;
}


</style>
<?php 



if (strpos($_SERVER['REQUEST_URI'], "status") !== false)
{
	
	 global $wpdb;
     //$table_update = $wpdb->prefix . 'topup_recharge';
	 $table_update = $wpdb->prefix . 'topup_recharge';
	 $result3 = $wpdb->get_results("SELECT user_email,user_name,friend_email,plan_name,mobile_number,convenience_fee,amount_currency,plan_sku_code,plan_amount,max_send_value,total_amountr FROM  $table_update ORDER BY ID DESC
     limit 1");
	 //$wpdb->query($result3);
	 //$wpdb->show_errors();
	 //echo $result3;
	  foreach ($result3 as $new =>$res) {
		 $uname = $res->user_name;
		  $planame = $res->plan_name;
		   $planamnt = $res->plan_amount;
		   $confee = $res->convenience_fee;
		   $amncurr = $res->amount_currency;
		   $ttlamnt = $res->total_amountr;
		 
       $umail = $res->user_email;
		//echo $umail;
		$fmail = $res->friend_email;
		//echo $fmail;
		$mo_number1 = $res->mobile_number;
		//echo $mo_number = '+'.$mo_number1;
		$skuc = $res->plan_sku_code;
		//echo $skuc;
		//echo "<br>";
		$maxval = $res->max_send_value;
		//echo $maxval;
	   }
	   
	   
	   $mobile_recharges_data = array(
								'user_name' => $uname,
								'user_email' => $umail,
								'friend_email' => $fmail,
								'mobile_number' => $mo_number1,
								'plan_name' => $planame,
								'plan_sku_code' => $skuc,
								'plan_amount' => $planamnt,
								'convenience_fee' => $confee,
								'total_amountr' => $ttlamnt,
								'amount_currency' => $amncurr
								
								); 
								//print_r( $mobile_recharges_data);
								$to = $umail;
								//php mailer variables
								$from = get_option('admin_email');
								$subject = "Mobile Recharge";
								$headers = 'From: E-gifty <'. $from . ">\r\n" .
								'Reply-To: ' . $from . "\r\n";
								
								
								ob_start();
								get_template_part('template-parts/search-mobile-plans/email/recharge-receipt', null, ['mobile_recharges_data' => $mobile_recharges_data]);
								$email_receipt = ob_get_contents();
								ob_end_clean(); 

								ob_start();
								get_template_part('template-parts/search-mobile-plans/email/admin-recharge-receipt', null, ['mobile_recharges_data' => $mobile_recharges_data]);
								$admin_receipt = ob_get_contents();
								ob_end_clean();  
			
								//Here put your Validation and send mail
								//$sent = wp_mail($to, $subject, strip_tags($message), $headers);
								$sent = wp_mail($to, $subject, $email_receipt, $headers);
														
								/* $admin_to = get_option('admin_email');
								$admin_from = get_option('admin_email');
								 */
								$admin_to = 'maddy@contenthq.co';    
								//$admin_to = 'testdeviser@gmail.com';   
								$admin_from = 'technodeviser01@gmail.com';
								
								$admin_subject = "Mobile Recharge";
								/* $admin_headers = 'From: '. $admin_from . "\r\n" .
								'Reply-To: ' . $admin_from . "\r\n"; */
								
								$admin_headers = 'From: E-gifty <'. $admin_from . ">\r\n" .
								'Reply-To: ' . $admin_to . "\r\n";
								
   
   
								/* $admin_headers = array('Content-Type: text/html; charset=UTF-8'); */
								$sent_to_admin_admin = wp_mail($admin_to, $admin_subject, $admin_receipt, $admin_headers);


								if(!empty($fmail)){
								ob_start();
								get_template_part('template-parts/search-mobile-plans/email/friend-recharge-receipt', null, ['mobile_recharges_data' => $mobile_recharges_data]);
								$friend_receipt = ob_get_contents();
								ob_end_clean();  
								
								$friend_email_to = $fmail;
								//Here put your Validation and send mail
								//$sent = wp_mail($to, $subject, strip_tags($message), $headers);
								$friend_sent = wp_mail($friend_email_to, $subject, $friend_receipt, $headers);
								}		
	  $recharge_result = send_transfer_recharge($mo_number1,$skuc,$maxval);
	  //print_r($recharge_result);
	  $recharge_result = json_decode($recharge_result); 
	  
	  
	 
     $table_update1 = $wpdb->prefix . 'topup_recharge';

     $sql = "UPDATE $table_update1
     SET status = 'complete'
     ORDER BY ID DESC
     limit 1";
     $wpdb->query($sql);
			
	
	
}
?>

<body class="recharge_page">


<div class="container">
    <div class="Thank_you">
        <img src="https://gifto.co/wp-content/uploads/2022/10/thank-you.jpeg" alt="thank you">
        <h2>Yay! The mobile number is topped up! Please check SMS of the number you topped up or its credit balance.<br>If you need a receipt & other info please check your email inbox</h2>
    </div>
    <!-- <div class="process">
        <p>Created</p>
        <p class="Processing">Processing</p>
        <p class="Sent">Sent</p>
    </div> -->
    <div class="button_recharge">
        <a href="<?php echo site_url(); ?>/datatalk/">Need to do another recharge?</a>
    </div>
</div>
</body>

<?php get_footer(); ?> 