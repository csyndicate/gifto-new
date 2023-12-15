<?php 
function custom_ding_apis_urls($ding_api_method){
		
	$curl = curl_init();
	// api urls   get mehods results
	/* $countries ="GetCountries";
	$promotions = "GetPromotions?SendCurrencyIso=AED";
	$des_promo='GetPromotionDescriptions?localizationKey=73c0a38a-f04e-4002-99d9-a4f9cdec235e';
	$provider ='GetProviders/?regionCodes=LK'; */
  	curl_setopt_array($curl, array(
  	CURLOPT_URL => 'https://api.dingconnect.com/api/V1/'.$ding_api_method,
  	CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_ENCODING => '',
  	CURLOPT_MAXREDIRS => 10,
  	CURLOPT_TIMEOUT => 0,
  	CURLOPT_FOLLOWLOCATION => true,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_CUSTOMREQUEST => 'GET',
  	CURLOPT_HTTPHEADER => array(
		'api_key: AZnjZ0PMheJ6VoPTSG8hxf'
		  ),
	));

	$response = curl_exec($curl);
	$response = json_decode($response, true);
	$err = curl_error($curl);
	curl_close($curl);

  	if( $err ){
		  return array( 'success'=>'0', 'error'=>'curl_error: '.$err );
  	}else{
  		if( empty( $response ) || !empty( $response[ 'ErrorCodes' ] ) ){
  			$response_error_string = implode( ",", $response[ 'ErrorCodes' ] );

  			$api_error = ( !empty( $response[ 'ErrorCodes' ] ) ) ? $response_error_string : 'empty_result';

  			return array( 'success' => '0', 'error' => 'api_error: '.$api_error );
  		}else{
  			return array( 'success' => '1', 'countries' => $response[ 'Items' ] );
  		}
  		
  	}
}

add_action("wp_ajax_get_country_data", "get_country_data");
add_action("wp_ajax_nopriv_get_country_datae", "get_country_data");
function get_country_data() {
	global $wpdb;
	$country_code = $_POST['data']['inputffild']; 
	
	
	$table_name = $wpdb->prefix."counrtry_table";

	$cntry_results = $wpdb->get_results( "SELECT * FROM `$table_name` WHERE prefix LIKE '$country_code%' " );

	$sel_country = (object) $cntry_results[0];
	
	
	$region = $sel_country->countryiso;
	$cname = $sel_country->countryname;
	$ccode = $sel_country->prefix;
	
	 $filename = get_site_url()."/wp-content/themes/minimog-child/flagsandlogos/flags/".$region.".png";
						 
	if (@getimagesize($filename)) {
		$cntry_flag = get_site_url().'/wp-content/themes/minimog-child/flagsandlogos/flags/'.$region.'.png';
		} else {
		 $cntry_flag = get_site_url().'/wp-content/themes/minimog-child/flagsandlogos/flags/US.png';
	}
	
	if ($sel_country){
		$html = '<div class="inner_sel_country"><p class="sel_count_heading">Who would you like to top-up?</p><div class="sel_count sel_data">Country: </div><div class="sel_flag sel_data"><img src="'.$cntry_flag.'" style="width:20px;"></div><div class="sel_country sel_data">'.$cname.'</div><div class="edit_country sel_data"><a href="javascript:void(0)"> Edit</a></div></div>';	
		
	} else {
		$html = '<div class="c_not_found"><p> Country Not matched</p></div>';
	}
	
	$return = array(
        'input_code' => $_POST['data']['inputffild'],
		'country_res' => $html,
		'country_code' => $ccode,
		
		
        );
        wp_send_json_success($return); 
	
}

////add gidt card  API




?>