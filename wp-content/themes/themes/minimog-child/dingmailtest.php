<?php 
/**
* Template Name: dingmail
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty One  1.0
*/
get_header();
echo "mailsent";

$to = "testdeviser@gmail.com"; //sendto@example.com
					$subject = 'Gifto:Gifting made better-Your reward code is here';
					$message =' <body style="margin:0;background-color: #f7f7f7;box-sizing: border-box;padding:0;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px auto;width:640px;max-width: 100%;font-family:Montserrat, sans-serif;">
			<tr>
                <td style="text-align: center;">
                <img src="https://gifto.co/wp-content/uploads/2023/01/gifto_mail_logo.png" style="text-align:center;">
            </td>
            </tr>
                <tbody>
				<tr>
					<td>
						<!-- header table start -->
                        <table class="header-email" style="width: 100%;padding:0px;background:#ffffff;border-spacing:0px;margin: 25px 0 0;border: 1px solid #dfdfdf;">
                            <tbody>
                                <tr>
                                    <td align="left" style="width: 100%;width: 100%;background: #8054b3;text-align: left;padding: 30px;">
                                        <h1 style="color: #fff;font-size: 28px;font-weight: 400; text-align: center;">your voucher code here</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="width: 100%;width: 100%;background: #fff;text-align: left;padding: 30px;">
                                        <p>Hi there!</p>
                                        <p>Thanks for ordering. Please find below your unique code for redemption.
                                            We hope you will enjoy using it or share it with those who wish to gift it.</p>
                                        <p class="code_class" style ="color:red;"><strong>Your voucher Code:</strong> '.$pin.' </p>
                                        <p>Please check our FAQs, Help section online, or the terms & conditions of usage for this voucher. </p>
                                        <p>If you have any feedback, we would love to hear from you.</p>
                                        <p>Our friendly team is here to help. Reach out via email or chat or by filling in the contact form on our site.</p>
                                        <p>Best!</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <div style="max-width: 602px;margin: auto;padding: 5px 0px 20px 0;">
                            <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0 0 0 0;margin:0;" >
                                *Terms & Conditions apply . Please check <a href="http://www.gifto.co"> http://www.gifto.co </a>for the respective gift card/brand voucher for usage terms and policies.
                            </p>
                            <p style=" text-align:center; border-radius:6px;border:0;color:#8a8a8a;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:0;margin:0;" >
                                Gifto: Gifting made better
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>';
					
					$headers = array('Content-Type: text/html; charset=UTF-8');

				   
				   
					wp_mail( $to, $subject, $message, $headers );
					
					
					
					/*$root = ABSPATH;
					$inserted_rwd_products_logs = fopen($root."testfiles.txt", "a+");
					//die('hello');
					print_r($inserted_rwd_products_logs);
					
					*/
					
					
					get_footer();
					?>