<?php
if(!empty($args)){
$mobile_recharges_data = $args['mobile_recharges_data'];
 
?>

<html>
<head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');
</style>
<style type="text/css">
		.apple_id{position: relative;}.apple_id:after {content: '';position: absolute;background: #fff;width: 294px;height: 3px;bottom: 0;left: -2px;}.date{position: relative;}.date:after {content: '';position: absolute;background: #fff;width: 294px;height: 3px;bottom: 0;left: -2px;}.total{position: relative;}.total:after {content: '';position: absolute;background: #8585850f;width: 2px;height: 37px;bottom: -8px;right: 42px;} 	
		
			@media (max-width: 575px) {#mobile_recharge_details{width:100%!important;}#logo_ico_bottom{width: 53px !important;}p#taltime_amount {font-size: 14px !important;}#amount_mobile {padding-left:20px;min-width: 60% !important;width: 60% !important;max-width: 60%;} p#Subtotal_mobile {font-size: 13px!important;} p#Convenience_mobile{font-size: 13px!important;} #total_amount_mobile_new{text-align:right;width:40% !important; max-width:40% !important;}p#total_amount_mobile {font-size: 11px !important;}#apple_id_mobile{padding:0 !important;} #mail_id_mobile{padding:0px !important;}#date_mobile{padding:0px !important;}#date_id_mobile{padding:0px !important;} #order_id_mobile{padding:0px !important;} #order_id_mobile_main{padding:0px !important;} #document_id_mobile{padding:0px !important;} #document_no_mobile{padding:0px !important;}.amount_mobile{
				width:90% !important;
			} 
			}
			
			@media only screen and (min-device-width: 320px) 
                   and (max-device-width: 600px) 
                   and (orientation: landscape) {#mobile_recharge_details{width:100%!important;}#logo_ico_bottom{width: 53px !important;}p#taltime_amount {font-size: 14px !important;}#amount_mobile {padding-left:20px; min-width: 91% !important;width: 91% !important;max-width: 91%;} p#Subtotal_mobile {font-size: 10px!important;} p#Convenience_mobile{font-size: 10px!important;} #total_amount_mobile_new{text-align:right;width:30% !important; max-width:30% !important;}p#total_amount_mobile {font-size: 11px !important;}#apple_id_mobile{padding:0 !important;} #mail_id_mobile{padding:0px !important;}#date_mobile{padding:0px !important;}#date_id_mobile{padding:0px !important;} #order_id_mobile{padding:0px !important;} #order_id_mobile_main{padding:0px !important;} #document_id_mobile{padding:0px !important;} #document_no_mobile{padding:0px !important;} 
			}
</style>

</head>

	<body style="margin:0;background-color: #ffffff;box-sizing: border-box;padding:0;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px auto;width:600px;max-width: 100%;font-family: 'Jost';">
			<tbody>
				<tr>
					<td>
						<!-- header table start -->
						<table class="header-email" style="width: 100%;padding: 25px 0px;background:#ffffff;border-spacing:0px;">
							<tbody>
								<tr>
									<td align="left" style="width: 20%;">
										<a style="color: #fff;display: inline-table;vertical-align: middle;" href="https://gifto.co/" target="_blank">
											<img width="100px" style=" display: table-cell;vertical-align: middle;object-fit:contain;" src="https://gifto.co/wp-content/uploads/2022/11/gifto-200x198.png">
										</a>
									</td>
									<td align="center" style="width: 70%;">
										<a style="font-size: 22px;line-height:19px;color:#000000;padding: 10px 0px;display:inline-table;text-decoration:none;font-family:'Jost';font-weight: 500;" href="{{order.abandoned_checkout_url}}"
										target="_blank">E-Receipt</a>
										<p style="font-family:'Jost';font-size:17px;font-weight: 600;">This is an automated receipt. Please do not reply. For any help contact us online!</p>
									</td>
									
								</tr>
							</tbody>
						</table>
						<!-- header table end -->

						<table id="mobile_recharge_details" style="width: 100%;">
							<tbody>
								<tr>
									<td style="width: 50%;background: #fafafa; vertical-align:top;">
										<table>
											<tr class="apple_id">
												<td style="width: 58%; padding:0 0 0 15px;">
													<p id="apple_id_mobile" style="text-transform: capitalize;font-family:'Jost';font-weight: 600;margin: 10px 0 0 0;color: #000000;font-size: 17px;">Email ID</p>
													<p id="mail_id_mobile"  style="color: #000000; margin: 0 0 10px 0;font-family:'Jost';font-weight:600;font-size: 17px; word-break: break-all;"><?php echo $mobile_recharges_data['user_email']; ?></p>
												</td>
											</tr>
											<tr class="date">
												<td style="padding:0 0 0 15px;">
													<p id="date_mobile"  style="text-transform: capitalize;font-family:'Jost';font-weight: 600;margin: 10px 0 0 0;color: #000000;font-size: 17px;">date</p>
													<p id="date_id_mobile" style="font-family:'Jost';font-weight: 600;margin: 0 0 10px 0;color: #000000;font-size: 17px;"><?php echo date("d-m-Y");  ?></p>
												</td>
											</tr>
											<tr class="order_id">
												<td style="width: 62%; padding:0 0 0 15px;">
													<p id="order_id_mobile"  style="text-transform: capitalize;font-family:'Jost';font-weight: 600;margin: 10px 0 0 0;color: #000000;font-size: 17px;;">SKU Code</p>
													<p id="order_id_mobile_main"  style="color: #000000;margin: 0 0 10px 0;font-family:'Jost';font-weight:600;font-size: 17px;"><?php echo $mobile_recharges_data['plan_sku_code']; ?></p>
												</td>
												<!---
												<td class="document_no">
													<p id="document_id_mobile" style="text-transform: capitalize;font-weight: 600;margin: 10px 0 0 0;color: #a1a1a1;font-size: 12px;padding-left: 15px;">document no.</p>
													<p id="document_no_mobile" style="font-weight: 600;margin: 0 0 10px 0;color: #525252;font-size: 12px;padding-left: 15px;">205587053755</p>
												</td>--->
											</tr>
										</table>
								</td>

								<td style="width: 50%;background: #fafafa;vertical-align:top;padding-top:10px;">
									<table>
										<tr>
											<td>
												<p style="text-transform: capitalize;font-family:'Jost';font-weight: 600;margin:0;color: #000000;font-size: 17px;padding-left: 15px;">Billed To</p>
												<p style="font-family:'Jost';font-weight: 600;margin: 5px 0 0 0;color: #000000;font-size: 17px;padding-left: 15px;"><?php echo $mobile_recharges_data['user_name']; ?></p>
												<p style="font-family:'Jost';font-weight: 600;margin: 5px 0 0 0;color: #000000;font-size: 17px;padding-left: 15px;">+<?php echo $mobile_recharges_data['mobile_number']; ?></p>
											
											</td>
										</tr>
									</table>
								</td>
							</tr>

							</tbody>
						</table>

						<table id="mobile_recharge_details" style="width: 100%;background:#fafafa;margin-top: 20px;margin-bottom:20px;">
							<tbody>
								<tr>
							<td><p style="margin: 0;font-size: 17px;font-family:'Jost';font-weight:600;padding-left: 20px;">Services</p></td>
							</tr>
							</tbody>
							</table>

							<table id="mobile_recharge_details" style="width:100%;">
								<tbody>
								<tr>
								<td id="amount_mobile" style="padding:0 0 0 20px; width: 85%;">
									<p id="taltime_amount" style="font-size: 17px;margin: 0px 0 0 0;font-weight: 500;"><?php echo $mobile_recharges_data['plan_name']; ?></p>
									<p id="Subtotal_mobile" style="color: #000000;font-size: 20px;margin: 0;font-weight: 500;">Subtotal - <?php echo $mobile_recharges_data['plan_amount'] . ' ' . $mobile_recharges_data['amount_currency']; ?></p>
									<p id="Convenience_mobile" style="color: #000000;font-size: 20px;margin: 0;font-weight: 500;">Convenience Fee - <?php echo $mobile_recharges_data['convenience_fee'] . ' ' . $mobile_recharges_data['amount_currency']; ?></p>
								</td>
								<td id="total_amount_mobile_new" style="width: 13%; padding:0 20px 0 0;">
									<p id="total_amount_mobile" style="font-family:'Jost';font-size: 17px;margin: 0px 0 0 0;font-weight: 700; text-align:right;"><?php echo $mobile_recharges_data['total_amountr'] . ' ' . $mobile_recharges_data['amount_currency']; ?></p>
								</td>
							</tr>	
							</tbody>
						</table>

						<table id="mobile_recharge_details" style="border-top: 2px solid #8585850f;border-bottom: 2px solid #8585850f;padding: 5px 0;margin-top: 18px;margin-bottom: 18px; width:100%;">
							<tr>
								<td class="total" style="width: 92%;text-align: right;padding-right: 64px;"><p style="text-transform: capitalize;font-weight: 600;margin: 0px 0 0 0;color: #000000;font-size: 17px;">Total</p></td>  
								<td style="font-size: 17px;margin: 0px 0 0 0; padding:0 20px 0 0; font-family:'Jost';font-weight: 700; "><?php echo $mobile_recharges_data['total_amountr'] ?></td>
							</tr>
						</table>

						<table id="mobile_recharge_details" style="width: 100%;">
							<tbody>
								<tr>
									<td><p class="get-touch" style="text-transform: capitalize;font-family:'Jost';font-weight: 600;margin:0;color: #000000;font-size: 17px;text-align: center;">Get in touch with <a href="https://gifto.co/">Gifto.co</a></p></td> 
								</tr>
								<tr> <td style="padding:24px 0px;"> <p style="border-radius: 6px;border: 0;color: #8a8a8a;font-size: 12px;line-height: 150%;text-align: center;margin: 0 0 16px;">*Terms & Conditions apply . Please check <a href="http://gifto.co" style="color: #15c;">http://www.gifto.co</a> for the respective gift card/brand voucher for usage terms and policies. <br>Gifto: Gifting made better</p> </td> </tr>
								<!--
								<tr>
									<td> <p style="text-transform: capitalize;font-weight: 600;margin: 5px 0 0 0;color: #a1a1a1;font-size: 12px;text-align: center;">Learn how to <a href=""> manage your password preferences </a>for iTunes, Apple Books, and App Store purchases.</p></td>
								</tr>
								<tr>
									<td> <p style="text-transform: capitalize;font-weight: 600;margin: 5px 0 0 0;color: #a1a1a1;font-size: 12px;text-align: center;">Place of supply: PB</p></td>
								</tr>
								---->
							</tbody>
						</table>

						
					</td>
				</tr>
			</tbody>
		</table>
		<!-- <table style="margin:0px auto;width:600px;max-width: 100%;font-family: 'Jost';"> 
		<tbody> 
			<tr> 
				<td style="padding:24px 0px;"> 
				<p style="border-radius: 6px;border: 0;color: #8a8a8a;font-size: 12px;line-height: 150%;text-align: center;margin: 0 0 16px;">*Terms & Conditions apply . Please check <a href="http://www.gifto.co" style="color: #15c;">http://www.gifto.co</a> for the respective gift card/brand voucher for usage terms and policies. <br>Gifto: Gifting made better</p> 
				</td> 
			</tr> 
		</tbody> 
	</table> -->
	</body>


</html>
<?php
}
?>