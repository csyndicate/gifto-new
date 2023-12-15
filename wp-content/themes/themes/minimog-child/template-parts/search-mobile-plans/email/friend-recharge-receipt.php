<?php
if(!empty($args)){
$mobile_recharges_data = $args['mobile_recharges_data'];
 
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<style>
@media (max-width:575px){ 
	p#Cashback_Received {font-size: 20px !important;}
	p#Total_amount{font-size: 20px !important;}
	#Total_amount img {margin-bottom: -5px;}
	table#Cashback_Received {margin-top: 25px !important;margin-bottom: 25px !important;}
	td#For_text, #Person_name, #Transection_id{font-size: 12px;}
	td#Recharge_of_Airtel, #Person_name, #Transection_id_no{font-size: 14px !important;}
	p#Recharge_for_your_Love_once {font-size: 15px !important;}
	p#Recharge_for_your_Love_once img{width: 31px !important;margin-bottom: -8px !important;margin-left: 16px!important;margin-right: -16px!important;}
	#Click_here{padding: 6px 20px !important;font-size: 13px !important;}
	#m_-7528482282070291820Cashback_Received > tbody > tr > td p {font-size: 28px !important;}
}
</style>

</head>


<body style="margin:0;background-color: #ffffff;box-sizing: border-box;padding:0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px auto;width:600px;max-width: 100%;font-family: 'Montserrat', sans-serif; background-color:#fff;background-image: url(https://gifto.co/wp-content/uploads/2022/10/newdesign.png);background-size: 35%;background-position: top right;background-repeat: no-repeat;" >
        <tr>
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td align="left" style="width: 50%;">
                            <a style="color: #fff;display: inline-table;vertical-align: middle;" href="https://gifto.co/" target="_blank">
                                <img width="100px" style=" display: table-cell;vertical-align: middle;object-fit:contain;" src="https://gifto.co/wp-content/uploads/2022/11/gifto-200x198.png">
                            </a>
                        </td>

                        <td>
                        </td>
                    </tr>
                </table>

               <!-- <table id="Cashback_Received" style="width: 100%;margin-top: 45px; margin-bottom: 45px;">
                    <tr>
                        <td><p id ="Cashback_Received" style="font-size: 35px;font-weight: 700;margin: 0;">Recharge Received</p></td>
                    </tr>
                    <tr>
                        <td><p id="Total_amount" style="font-size: 35px;font-weight: 700;margin: 0;"><?php //echo $mobile_recharges_data['total_amount'] . ' ' . $mobile_recharges_data['amount_currency']; ?> <img src="https://43523f7b3b.nxcli.net/wp-content/uploads/2022/10/icon-green.png" alt="tick" style="width: 27px;"></p></td>
                    </tr>
                </table>-->

                <table id="Recharge_of" style="width: 100%;">
                    <tr><td id="For_text" style="color: grey;font-weight: 600;">For</td></tr>
                    <tr><td id="Recharge_of_Airtel" style="font-size: 20px;font-weight: 600;">"<?php echo $mobile_recharges_data['plan_name']; ?>"<br> +<?php echo $mobile_recharges_data['mobile_number']; ?></td></tr>
                </table>

                
                <table id="Person_name" style="width: 100%;margin-top: 30px;">
                    <tr><td id="From_text" style="color: grey;font-weight: 600;">From</td></tr>
                    <tr><td id="Person_name" style="font-size: 20px;font-weight: 600;"><?php echo $mobile_recharges_data['user_name']; ?></td></tr>
                </table>

                <table id="Transection_id" style="width: 100%;margin-top: 30px;">
                    <tr><td id="date_of_recharge" style="color: grey;font-weight: 600;"><?php echo date("d-m-Y");  ?></td></tr>
                    <tr><td id="Transection_id_no" style="font-size: 20px;font-weight: 600;">SKU Code :<?php echo $mobile_recharges_data['plan_sku_code']; ?></td></tr>
                </table>

                <table id="Recharge_for" style="text-align:center;width: 100%;margin-top: 30px;background-color: #8080803d;padding: 15px 0px;">
                    <tr>
                        <td style="width:80%;">
                            <p style="margin: 0; font-size: 21px; font-weight: 600;">Now you can also</p>
                            <p id="Recharge_for_your_Love_once" style="font-size: 21px;color: rgb(0, 0, 0);font-weight: 600;margin-bottom: 14px; margin-top: 0;">Recharge for your loved ones</p>
							<a id="Click_here" href="https://gifto.co/datatalk/" style="background: #ff2e3d;border: transparent;color: #fff;padding: 6px 30px;border-radius: 7px;font-weight: 500;font-size: 18px;text-decoration: none;">Click here!</a></td>
                        <td style="width:20%;"><img style="width: 73%;margin-left: 0;margin-top: 2px;margin-bottom: -3px;" src="https://gifto.co/wp-content/uploads/2022/10/gift.png" alt="gift"></td>
                    </tr>
                    
                </table>

            </td>
        </tr>
    </table>

        
    
</body>

        
    
</body>


</html>
<?php
}
?>