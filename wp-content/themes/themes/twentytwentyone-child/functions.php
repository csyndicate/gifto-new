<?php
require_once(ABSPATH . 'wp-config.php'); 
require_once(ABSPATH . 'wp-includes/wp-db.php'); 
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 

//files for media_sideload_image
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
	$parenthandle = 'twentytwenty-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), 
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version')
    );
    wp_enqueue_style('fontawsome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css' );

    wp_enqueue_style('customcss', get_stylesheet_directory_uri(). '/customcss.css' );
    
    
    // wp_enqueue_script('jqcustomlib', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', 'jQuery', '', true);
    wp_enqueue_script('customjs', get_stylesheet_directory_uri(). '/customjs.js', 'jQuery', '', true);
}

// Only show products in the front-end search results
add_filter('pre_get_posts','search_filter_pages');
function search_filter_pages($query) {
    // Frontend search only
    if ( ! is_admin() && $query->is_search() ) {
        $query->set('post_type', 'product');
        $query->set( 'wc_query', 'product_query' );
    }elseif( is_shop() ){
    	if(isset($_GET['country_filter']) && $_GET['country_filter']!="" && $_GET['country_filter']!="all_cnt"){
    		// My criteria
    		if($_GET['country_filter']=="global"){
    // 			$category_ids = array(
				// 				    array(
				// 				        'taxonomy' => 'product_cat',
				// 				        'terms' => array('paypal','visa_card'),
				// 				        'field' => 'slug',
				// 				        'include_children' => true,
				// 				        'operator' => 'IN'
				// 				    )
				// 				);
				// $query->set( 'tax_query', $category_ids );
				$query->set( 'p', 5400 );
    		}else{
    			$meta_query[] = array(
	                'key'     => 'rwd_product_country',
	                'value'   => $_GET['country_filter'],
	                'compare' => '=',
	        	); 

	        	// Set the meta query to the complete, altered query
	        	$query->set('meta_query',$meta_query); 
    		}
    	}

    	//categories are commented now
    	// if(isset($_GET['category_filter']) && $_GET['category_filter']){
    	// 	$query->set('product_cat',$_GET['category_filter']);
    	// }
    }
    return $query;
}

//Change the 'Billing details' checkout label to 'Contact Information'
function wc_billing_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Billing details' :
		$translated_text = __( 'Please Enter Your Billing details', 'woocommerce' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );\

//for checkout fields
add_filter( 'woocommerce_checkout_fields', 'misha_remove_fields', 9999 );
function misha_remove_fields( $woo_checkout_fields_array ) {
	
	// she wanted me to leave these fields in checkout
	// unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
	// unset( $woo_checkout_fields_array['billing']['billing_phone'] );
	// unset( $woo_checkout_fields_array['billing']['billing_email'] );
	// unset( $woo_checkout_fields_array['order']['order_comments'] ); // remove order notes
	
	// and to remove the billing fields below
	// unset( $woo_checkout_fields_array['billing']['billing_country']['required'] );
	unset( $woo_checkout_fields_array['billing']['billing_address_1']['required'] );
	unset( $woo_checkout_fields_array['billing']['billing_city']['required'] );
	unset( $woo_checkout_fields_array['billing']['billing_state']['required'] ); // remove state field
	unset( $woo_checkout_fields_array['billing']['billing_postcode']['required'] ); // remove zip code field

	return $woo_checkout_fields_array;
}



//short code for carticon
add_shortcode ('woo_cart_but', 'woo_cart_but' );
function woo_cart_but() {
	ob_start();
 
    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL ?>

    <div class="cart-icon-global">
    	<a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
    		<i class="fas fa-shopping-cart"></i>
		    <?php if ( $cart_count > 0 ){ ?>
		        <span class="cart-contents-count" id="mini-cart-count"><?php echo $cart_count; ?></span>
		    <?php } ?>
	    </a>
	</div>
    <?php
	        
    return ob_get_clean(); 
}
// update cart count on ajax like on cart page update
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
	<span class="cart-contents-count" id="mini-cart-count"><?php echo $items_count ? $items_count : ''; ?></span>		    
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

//for removing the sortbyprice options from product listing page
add_filter( 'woocommerce_catalog_orderby', '_remove_default_sorting_options' );
function _remove_default_sorting_options( $options ){
	// unset( $options[ 'popularity' ] );
	//unset( $options[ 'menu_order' ] );
	//unset( $options[ 'rating' ] );
	//unset( $options[ 'date' ] );
	unset( $options[ 'price' ] );
	unset( $options[ 'price-desc' ] );
	return $options;

}

//customize the no products found message
add_action( 'woocommerce_no_products_found', function(){
    remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );

    // HERE change your message below
    $message = __( 'Sorry, none available. Please check & use our global gift cards for this country. *T&C apply', 'woocommerce' );
    echo '<p class="woocommerce-info">' . $message .'</p>';
}, 9 );


// START to show product tabs of discription or disclosure
if (class_exists('acf') && class_exists('WooCommerce')) {
	add_filter('woocommerce_product_tabs', function($tabs) {
		global $post, $product;  // Access to the current product or post
		$prd_disclosure = get_field('product_disclosure', $post->ID);
		// if(!isset($prd_disclosure) || $prd_disclosure==""){
		// 	return;
		// }
		
		if(isset($prd_disclosure) && $prd_disclosure!=""){
			$custom_tab_title = "Disclosure";
	 
			if (!empty($custom_tab_title)) {
				$tabs['awp-' . sanitize_title($custom_tab_title)] = [
					'title' => $custom_tab_title,
					'callback' => 'awp_custom_woocommerce_tabs',
					'priority' => 10
				];
			}
		}
		return $tabs;
	});
 
	function awp_custom_woocommerce_tabs($key, $tab) {
		global $post;
  
		$custom_tab_contents = get_field('product_disclosure', $post->ID);
		echo $custom_tab_contents;
	}
}
// END to show product tabs of discription or disclosure

function addRewardProduct($prd_info_array){
	// check if the rwdProduct already exixts
		$rwd_product_exists = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'product',
			'meta_key'		=> 'rwd_product_api_id',
			'meta_value'	=> $prd_info_array['productId'],
			'fields' => 'ids',
		));

		if($rwd_product_exists){

			update_reward_prd($rwd_product_exists[0], $prd_info_array);
			$ret_array = array(
							"code"=>"2",
							"message"=>"Product Already Exists",
							"productId"=>$rwd_product_exists[0],
						);
			return $ret_array;
		}
	//


	//adding the rewardproduct with API returned ID
	$rwd_desc = $prd_info_array['description'];
	if($rwd_desc==""){
		$rwd_desc = " ";
	}

	$rwd_prd_post = array(
		'post_type'=> 'product',
		'post_status'=> 'publish',
		'post_title'=> $prd_info_array['name'],
		'post_content'=> $prd_info_array['description'],
	);
	$inserted_post_id = wp_insert_post($rwd_prd_post, true);

	if(is_wp_error($inserted_post_id)){
	  	$ret_array = array(
						"code"=>"3",
						"message"=>"Product not inserted ".$inserted_post_id,
					);
		return $ret_array;
	}else{
		//create common category for order API
		$cat_exists_cmn = term_exists('Reward Product API', 'product_cat');
		if(!$cat_exists_cmn){
			$insert_cmn_cat = wp_insert_term(
			  	'Reward Product API', // the term 
			  	'product_cat', // the taxonomy
			  	array(
			    	'description'=> 'Common Reward Tremendous API Product Category',
			  	)
			);	
			$cmn_cat_id = $insert_cmn_cat['term_id'];
		}else{
			$cmn_cat_id = $cat_exists_cmn['term_id'];
		}

		//create category if not present and assign or added reward API product to it.
		$api_products_catgs = explode(",", $prd_info_array['categories']);
		$catgs_to_add = array();
		$catgs_exixts = array();
		
		foreach($api_products_catgs as $api_products_catgs_val){
			$cat_exists = term_exists($api_products_catgs_val, 'product_cat');

			if($cat_exists){
				$catgs_exixts[] = (int)$cat_exists['term_id'];
			}else{
				$inserted_cat = wp_insert_term(
				  $api_products_catgs_val, // the term 
				  'product_cat', // the taxonomy
				  array(
				    'description'=> 'Reward Product Form Xoxo API',
				  )
				);

				$catgs_to_add[] = (int)$inserted_cat['term_id'];
			}
		}

		$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
		$assign_catgs[] = (int)$cmn_cat_id;
		wp_set_object_terms( $inserted_post_id, $assign_catgs, 'product_cat' );



		// *******************OLDOLDOLD***************************
		// $cat_exists = term_exists($prd_info_array['categories'], 'product_cat');

		// if($cat_exists){	
		// 	$cats_array = array((int)$cmn_cat_id, (int)$cat_exists['term_id']);
		// 	wp_set_object_terms( $inserted_post_id, $cats_array, 'product_cat' );			
		// }else{
		// 	$inserted_cat = wp_insert_term(
		// 	  $prd_info_array['category'], // the term 
		// 	  'product_cat', // the taxonomy
		// 	  array(
		// 	    'description'=> 'Reward Product Form Tremendous API',
		// 	  )
		// 	);

		// 	$cats_array = array((int)$cmn_cat_id, (int)$inserted_cat['term_id']);
		// 	wp_set_object_terms( $inserted_post_id, $cats_array, 'product_cat' );	
		// }
		//END create category if not present and assign or added reward API product to it.

		//when product added, update the meta_data
		wp_set_object_terms($inserted_post_id, 'simple', 'product_type');
		update_post_meta($inserted_post_id, '_virtual', 'yes');
		update_post_meta($inserted_post_id, '_regular_price', '1');
		update_post_meta($inserted_post_id, '_price', '1');
		update_field('rwd_product_api_id', $prd_info_array['productId'], $inserted_post_id);
		update_field('rwd_product_api_image', $prd_info_array['imageUrl'], $inserted_post_id);
		update_field('rwd_product_currency', $prd_info_array['currencyCode'], $inserted_post_id);
		update_field('rwd_product_country', $prd_info_array['countryCode'], $inserted_post_id);
		update_field('product_disclosure', $prd_info_array['termsAndConditionsInstructions'], $inserted_post_id);
		update_field('delivery_type', $prd_info_array['deliveryType'], $inserted_post_id);
		update_field('deliverytime', $prd_info_array['tatInDays'], $inserted_post_id);

		if(isset($prd_info_array['description']) && $prd_info_array['description']!=""){
			$update_post_cont = array(
			      'ID'           => $inserted_post_id,
			      'post_content' => $prd_info_array['description']
		  	);		 
			// Update the post into the database
	  		wp_update_post( $update_post_cont );
	  	}


	  	if($prd_info_array['valueType']=='fixed_denomination'){
	  		$denominations_array = explode(",", $prd_info_array['valueDenominations']);

	  		foreach($denominations_array as $key_sku => $value_sku){
				$row = array(
				    'min_sku' => $denominations_array[$key_sku],
				    'max_sku' => $denominations_array[$key_sku]
				);
				add_row('skus', $row, $inserted_post_id);
			}

	  	}elseif($prd_info_array['valueType']=='open_value'){
	  		$row = array(
			    'min_sku' => $prd_info_array['minValue'],
			    'max_sku' => $prd_info_array['maxValue']
			);
			add_row('skus', $row, $inserted_post_id);
	  	}
		// foreach($prd_info_array['skus'] as $key_sku => $value_sku){
		// 	$row = array(
		// 	    'min_sku' => $prd_info_array['skus'][$key_sku]['min'],
		// 	    'max_sku' => $prd_info_array['skus'][$key_sku]['max']
		// 	);
		// 	add_row('skus', $row, $inserted_post_id);
		// }

		
		//uploading and adding the feature image to the post
		$image = media_sideload_image( $prd_info_array['imageUrl'], $inserted_post_id, $prd_info_array['name'], 'id' );
		set_post_thumbnail( $inserted_post_id, $image );
		$ret_array = array(
						"code"=>"1",
						"message"=>"Product added successfully. Product ID: ".$inserted_post_id,
					);
		return $ret_array;
	}

}

function update_reward_prd( $product_id, $prd_info_array) { 

	//removing existing categories
	$terms = get_the_terms($product_id, 'product_cat');
	foreach($terms as $term){
	    wp_remove_object_terms($product_id, $term->term_id, 'product_cat');
	}
	//END removing existing categories

	//create common category for order API
	$cat_exists_cmn = term_exists('Reward Product API', 'product_cat');
	if(!$cat_exists_cmn){
		$insert_cmn_cat = wp_insert_term(
		  	'Reward Product API', // the term 
		  	'product_cat', // the taxonomy
		  	array(
		    	'description'=> 'Common Reward Tremendous API Product Category',
		  	)
		);	
		$cmn_cat_id = $insert_cmn_cat['term_id'];
	}else{
		$cmn_cat_id = $cat_exists_cmn['term_id'];
	}

	//create category if not present and assign or added reward API product to it.
	$api_products_catgs = explode(",", $prd_info_array['categories']);
	$catgs_to_add = array();
	$catgs_exixts = array();
	
	foreach($api_products_catgs as $api_products_catgs_val){
		$cat_exists = term_exists($api_products_catgs_val, 'product_cat');

		if($cat_exists){
			$catgs_exixts[] = (int)$cat_exists['term_id'];
		}else{
			$inserted_cat = wp_insert_term(
			  $api_products_catgs_val, // the term 
			  'product_cat', // the taxonomy
			  array(
			    'description'=> 'Reward Product Form Xoxo API',
			  )
			);

			$catgs_to_add[] = (int)$inserted_cat['term_id'];
		}
	}

	$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
	$assign_catgs[] = (int)$cmn_cat_id;
	wp_set_object_terms( $product_id, $assign_catgs, 'product_cat' );

	//when product added, update the meta_data
		wp_set_object_terms($product_id, 'simple', 'product_type');
		update_post_meta($product_id, '_virtual', 'yes');
		update_post_meta($product_id, '_regular_price', '1');
		update_post_meta($product_id, '_price', '1');
		update_field('rwd_product_api_id', $prd_info_array['productId'], $product_id);
		update_field('rwd_product_api_image', $prd_info_array['imageUrl'], $product_id);
		update_field('rwd_product_currency', $prd_info_array['currencyCode'], $product_id);
		update_field('rwd_product_country', $prd_info_array['countryCode'], $product_id);
		update_field('product_disclosure', $prd_info_array['termsAndConditionsInstructions'], $product_id);
		update_field('delivery_type', $prd_info_array['deliveryType'], $product_id);
		update_field('deliverytime', $prd_info_array['tatInDays'], $product_id);

		if(isset($prd_info_array['description']) && $prd_info_array['description']!=""){
			$update_post_cont = array(
			      'ID'           => $product_id,
			      'post_content' => $prd_info_array['description']
		  	);		 
			// Update the post into the database
	  		wp_update_post( $update_post_cont );
	  	}

	  	//deleting current rows
	  	$images = get_field('skus', $product_id);
		if (!empty($images)) {
		  $count = count($images);
		  for ($index=1; $index<=$count; $index++) {
		    delete_row('images', $index, $product_id);
		  }
		}
	  	//END deleting current rows

	  	if($prd_info_array['valueType']=='fixed_denomination'){
	  		$denominations_array = explode(",", $prd_info_array['valueDenominations']);

	  		foreach($denominations_array as $key_sku => $value_sku){
				$row = array(
				    'min_sku' => $denominations_array[$key_sku],
				    'max_sku' => $denominations_array[$key_sku]
				);
				add_row('skus', $row, $product_id);
			}

	  	}elseif($prd_info_array['valueType']=='open_value'){
	  		$row = array(
			    'min_sku' => $prd_info_array['minValue'],
			    'max_sku' => $prd_info_array['maxValue']
			);
			add_row('skus', $row, $product_id);
	  	}

	  	$image = media_sideload_image( $prd_info_array['imageUrl'], $product_id, $prd_info_array['name'], 'id' );
		set_post_thumbnail( $product_id, $image );
}


// define the woocommerce_thankyou callback 
function action_woocommerce_thankyou( $order_get_id ) { 
	$order = wc_get_order( $order_get_id );
	

	//check if API already run for the order
	// $api_run = get_field( "reward_api_run", $order_get_id );
	// if($api_run){
	// 	return;
	// }

	$reward_products = array();
	// The loop to get the order items which are WC_Order_Item_Product objects since WC 3+
	$order_itr = 1;
	$pending = 0;
	$api_statuses = array();
	$delivery_statuses = array();
	$po_numbers = array();



	$log_file_content = "";
	$root_path = ABSPATH;
	$created_reward_order = fopen($root_path."reward_API_order_logs.txt", "a+");

	$log_file_content .= "\n";
	$log_file_content .= "\n";
	$log_file_content .= "Order ID: ".$order_get_id;
	$log_file_content .= "\n";
	$log_file_content .= "Total Reward Products/Orders: ". count($order->get_items());
	$log_file_content .= "\n";
	$log_file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
	$log_file_content .= "\n";
	$log_file_content .= date("Y-m-d h:i:sa");
	$log_file_content .= "\n";



	foreach( $order->get_items() as $item_id => $item ){

		$product_id = $item->get_product_id();
		
		if (has_term( 'Reward Product API', 'product_cat', $product_id )){

			$prdids_api = get_field('rwd_product_api_id', $product_id);
			$prd_quantity = $item->get_quantity();
			// $order_phone = $reward_products[$rp_key]['prdphone'];
			$ro_ponumber = $order_get_id.'-'.$order_itr;
			$ro_email = $item->get_meta('_tchknwdev_rwdemail');

			$denom_evaluate = explode("_",$item->get_meta('_tchknwdev_rwdprice'));
			$ro_denomination = $denom_evaluate[0];

			$xoxo_access_token = get_field('access_token', 'option');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://stagingaccount.xoxoday.com/chef/v1/oauth/api',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
				"query": "plumProAPI.mutation.placeOrder",
				"tag": "plumProAPI",
				"variables": {
					"data":{
						"productId":"'.$prdids_api.'",
				        "quantity": "'.$prd_quantity.'",
				        "denomination": "'.$ro_denomination.'", 
				        "email":"'.$ro_email.'",
				        "tag":"XOXO",
			            "notifyReceiverEmail":"1",
				        "poNumber":"'.$ro_ponumber.'"
			                
					}
				}
			}',
			  CURLOPT_HTTPHEADER => array(
			    'Content-Type: application/json',
			    'Authorization: Bearer '.$xoxo_access_token.' '
			  ),
			));

			$response = curl_exec($curl);
			$response = json_decode($response);

			curl_close($curl);

			update_field( 'reward_api_run', 'yes', $order_get_id );
			if($response->code){
				$er_message_apireturn = $response->errorInfo." - ".$response->error;

				$api_statuses[] = "error: ".$er_message_apireturn;
				$delivery_statuses[] = "api Error";
				$po_numbers[] = "api Error";
			}else{
				$delv_status = $response->data->placeOrder->data->deliveryStatus;
				$api_statuses[] = "success";
				$delivery_statuses[] = $delv_status;
				$po_numbers[] = $ro_ponumber;
				wc_update_order_item_meta($item_id, '_tchknwdev_deliverystatus', $delv_status);
				if($delv_status=="pending"){
					$pending = 1;
				}
			}

			//content for log files
			$order_log_message = array("Reward Order Status", $response);
			$log_file_content .= print_r($order_log_message, TRUE);
			$log_file_content .= '{
				"query": "plumProAPI.mutation.placeOrder",
				"tag": "plumProAPI",
				"variables": {
					"data":{
						"productId":"'.$prdids_api.'",
				        "quantity": "'.$prd_quantity.'",
				        "denomination": "'.$ro_denomination.'", 
				        "email":"'.$ro_email.'",
				        "tag":"XOXO",
			            "notifyReceiverEmail":"1",
				        "poNumber":"'.$ro_ponumber.'"
			                
					}
				}
			}';
			$log_file_content .= "________________________________________________________";

		}
		$order_itr++;
	}

	if($pending){
		update_field( 'delayed_product', 'yes', $order_get_id );
	}
	$api_statuses_str = implode( ",", $api_statuses );
	update_field( 'reward_api_status', $api_statuses_str, $order_get_id );

	$delivery_statuses_str = implode( ",", $delivery_statuses );
	update_field( 'order_delivery_status', $delivery_statuses_str, $order_get_id );

	$po_numbers_str = implode( ",", $po_numbers );
	update_field( 'order_po_number', $po_numbers_str, $order_get_id );


	fwrite( $created_reward_order, $log_file_content );
	fclose( $created_reward_order );

	
}; 
add_action( 'woocommerce_thankyou', 'action_woocommerce_thankyou', 10, 1 );


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//for csutom price of reward products
// Step 1: Adding Custom Field for Product
add_action('woocommerce_before_add_to_cart_button','tchknwdev_add_custom_fields');
function tchknwdev_add_custom_fields()
{
    global $product;
    ob_start();
    

	global $product; 
	?>
	<?php
		$deliverytype = get_field('delivery_type', $product->id);
		if($deliverytype=='delayed'){ ?>
			<div class="delivery-type">
				<p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field('deliverytime', $product->id) ?> Days of purchasing.</p>
			</div>
			<br>
		<?php }
	?>
	<div class="custom-price-buttons"> 
		<p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
			<?php 
				$prd_curr = get_field('rwd_product_currency', $product->id);
				if($prd_curr!="USD"): ?>
					The Prices will get converted to <strong>USD</strong> when you Add this product to your cart.
				<?php endif; ?>
		</p>
		<br>
		<p>Please select one of the below prices for your reward.</p>
		<p class="rwd-common-error rwd-error"></p>
		<?php   
	    if( have_rows('skus', $product->id) ):
		    // Loop through rows.
		    while( have_rows('skus', $product->id) ) : the_row();
		    	$min_sku = get_sub_field("min_sku");
		    	$max_sku = get_sub_field("max_sku");
		    	if($min_sku==$max_sku){ ?>
		    		<button data-range="0"><?php echo $min_sku ?></button>
		    	<?php }else{ ?>
		    		<button data-range="1"><?php echo $min_sku."-".$max_sku; ?></button>
		    	<?php }    	

		    endwhile;
		endif;
	    ?>
    </div>
        <div class="tchknwdev-custom-fields for-rwdprice" style="display: none;">
        	<label>Enter the selected price range</label>
            <input type="text" name="tchknwdev_rwdprice">
            <p class="rwd-range-error rwd-error"></p>
        </div>
        <div class="tchknwdev-custom-fields for-rwdemail">
        	<label>Enter the email you want the reward to sent:</label>
        	<p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail">
        </div>
		
		
        <div class="tchknwdev-custom-fields for-rwdorgcurrency">
            <input type="hidden" name="tchknwdev_rwdorgcurrency" value="<?php the_field('rwd_product_currency', $product->id) ?>">
        </div>
        <div class="clear"></div>

    <?php
    $content = ob_get_contents();
    ob_end_flush();
    return $content;
}

// Step 2: Add Customer Data to WooCommerce Cart
add_filter('woocommerce_add_cart_item_data','tchknwdev_add_item_data',10,3);
function tchknwdev_add_item_data($cart_item_data, $product_id, $variation_id)
{
    if(isset($_REQUEST['tchknwdev_rwdprice']))
    {
        $cart_item_data['tchknwdev_rwdprice'] = sanitize_text_field($_REQUEST['tchknwdev_rwdprice']);
    }

    if(isset($_REQUEST['tchknwdev_rwdemail']))
    {
        $cart_item_data['tchknwdev_rwdemail'] = sanitize_text_field($_REQUEST['tchknwdev_rwdemail']);
    }

    if(isset($_REQUEST['tchknwdev_rwdorgcurrency']))
    {
        $cart_item_data['tchknwdev_rwdorgcurrency'] = sanitize_text_field($_REQUEST['tchknwdev_rwdorgcurrency']);
    }

    return $cart_item_data;
}

//Step Custom: Custom Step to update the price
function set_reward_product_price( $cart_object ) {
    if( !WC()->session->__isset( "reload_checkout" )) {
        /* Gift wrap price */
        foreach ( $cart_object->cart_contents as $key => $value ) {
            if( isset( $value["tchknwdev_rwdprice"] ) ) {
                $reward_price = $value["tchknwdev_rwdprice"];
                $org_currency = $value["tchknwdev_rwdorgcurrency"];
                

                $org_currency = explode(',', $org_currency);
				$user_currency_code =  getLocationInfoByIp();
				$user_currency_code = $user_currency_code['currencyCode'];
				if (!in_array($user_currency_code, $org_currency))
			  	{
			  		$user_currency_code = $org_currency[0];
			  	}

                $converted_price = convertCurrency($reward_price, $user_currency_code, 'USD');

                $value['data']->set_price($converted_price);
            }
        }
    }
}
add_action( 'woocommerce_before_calculate_totals', 'set_reward_product_price', 99 );

// Step 3: Display Details as Meta in Cart
add_filter('woocommerce_get_item_data','wdm_add_item_meta',10,2);
function wdm_add_item_meta($item_data, $cart_item)
{
    if(array_key_exists('tchknwdev_rwdprice', $cart_item))
    {
        $custom_details = $cart_item['tchknwdev_rwdprice'];

        $ro_orgcurrency = explode(',', $cart_item['tchknwdev_rwdorgcurrency']);
		$user_currency_code =  getLocationInfoByIp();
		$user_currency_code = $user_currency_code['currencyCode'];
		if (!in_array($user_currency_code, $ro_orgcurrency))
		{
			$user_currency_code = $ro_orgcurrency[0];
		}

        $item_data[] = array(
            'key'   => 'Reward Price',
            'value' => $custom_details."_".$user_currency_code
        );
    }

    if(array_key_exists('tchknwdev_rwdemail', $cart_item))
    {
        $custom_details = $cart_item['tchknwdev_rwdemail'];

        $item_data[] = array(
            'key'   => 'Reward Sent to: ',
            'value' => $custom_details
        );
    }

    return $item_data;
}

//Step4: step 3 for displaying the data on cart page skipped
//  this step will add the data that is the meta data to the order
add_action( 'woocommerce_checkout_create_order_line_item', 'tchknwdev_add_custom_order_line_item_meta',10,4 );
function tchknwdev_add_custom_order_line_item_meta($item, $cart_item_key, $values, $order)
{
    if(array_key_exists('tchknwdev_rwdprice', $values))
    {
    	$ro_orgcurrency = explode(',', $values['tchknwdev_rwdorgcurrency']);
		$user_currency_code =  getLocationInfoByIp();
		$user_currency_code = $user_currency_code['currencyCode'];
		if (!in_array($user_currency_code, $ro_orgcurrency))
		{
			$user_currency_code = $ro_orgcurrency[0];
		}

        $item->add_meta_data('_tchknwdev_rwdprice',$values['tchknwdev_rwdprice']."_".$user_currency_code);
    }
    if(array_key_exists('tchknwdev_rwdemail', $values))
    {
        $item->add_meta_data('_tchknwdev_rwdemail',$values['tchknwdev_rwdemail']);
    }
    $item->add_meta_data('_tchknwdev_deliverystatus','default');
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


function convertCurrency($amount,$from_currency,$to_currency){
  $apikey = 'b855209fdc4cc5bee0d6';

  $from_Currency = urlencode($from_currency);
  $to_Currency = urlencode($to_currency);
  $query =  "{$from_Currency}_{$to_Currency}";

  // change to the free URL if you're using the free version
  $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
  $obj = json_decode($json, true);

  $val = floatval($obj["$query"]);


  $total = $val * $amount;
  return number_format($total, 2, '.', '');
}

//to get all the unique meta field with key
function _get_all_meta_values($key) {
    global $wpdb;
	$result = $wpdb->get_col( 
		$wpdb->prepare( "
			SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
			LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
			WHERE pm.meta_key = '%s' 
			AND p.post_status = 'publish'
			ORDER BY pm.meta_value", 
			$key
		) 
	);

	return $result;
}

function get_countries(){

	// $code = strtoupper($code);

	$countryList = array(
	    'AC' => 'Ascension Island',
	    'AF' => 'Afghanistan',
	    'AX' => 'Aland Islands',
	    'AL' => 'Albania',
	    'DZ' => 'Algeria',
	    'AS' => 'American Samoa',
	    'AD' => 'Andorra',
	    'AO' => 'Angola',
	    'AI' => 'Anguilla',
	    'AQ' => 'Antarctica',
	    'AG' => 'Antigua and Barbuda',
	    'AR' => 'Argentina',
	    'AM' => 'Armenia',
	    'AW' => 'Aruba',
	    'AU' => 'Australia',
	    'AT' => 'Austria',
	    'AZ' => 'Azerbaijan',
	    'BS' => 'Bahamas the',
	    'BH' => 'Bahrain',
	    'BD' => 'Bangladesh',
	    'BB' => 'Barbados',
	    'BY' => 'Belarus',
	    'BE' => 'Belgium',
	    'BZ' => 'Belize',
	    'BJ' => 'Benin',
	    'BM' => 'Bermuda',
	    'BT' => 'Bhutan',
	    'BO' => 'Bolivia',
	    'BA' => 'Bosnia and Herzegovina',
	    'BW' => 'Botswana',
	    'BV' => 'Bouvet Island (Bouvetoya)',
	    'BR' => 'Brazil',
	    'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
	    'VG' => 'British Virgin Islands',
	    'BN' => 'Brunei Darussalam',
	    'BG' => 'Bulgaria',
	    'BF' => 'Burkina Faso',
	    'BI' => 'Burundi',
	    'KH' => 'Cambodia',
	    'CM' => 'Cameroon',
	    'CA' => 'Canada',
	    'CV' => 'Cape Verde',
	    'KY' => 'Cayman Islands',
	    'CF' => 'Central African Republic',
	    'TD' => 'Chad',
	    'CL' => 'Chile',
	    'CN' => 'China',
	    'CX' => 'Christmas Island',
	    'CC' => 'Cocos (Keeling) Islands',
	    'CO' => 'Colombia',
	    'KM' => 'Comoros the',
	    'CD' => 'Congo',
	    'CG' => 'Congo the',
	    'CK' => 'Cook Islands',
	    'CR' => 'Costa Rica',
	    'CI' => 'Cote d\'Ivoire',
	    'HR' => 'Croatia',
	    'CU' => 'Cuba',
	    'CY' => 'Cyprus',
	    'CZ' => 'Czech Republic',
	    'DK' => 'Denmark',
	    'DJ' => 'Djibouti',
	    'DM' => 'Dominica',
	    'DO' => 'Dominican Republic',
	    'EC' => 'Ecuador',
	    'EG' => 'Egypt',
	    'SV' => 'El Salvador',
	    'GQ' => 'Equatorial Guinea',
	    'ER' => 'Eritrea',
	    'EE' => 'Estonia',
	    'ET' => 'Ethiopia',
	    'FO' => 'Faroe Islands',
	    'FK' => 'Falkland Islands (Malvinas)',
	    'FJ' => 'Fiji the Fiji Islands',
	    'FI' => 'Finland',
	    'FR' => 'France, French Republic',
	    'GF' => 'French Guiana',
	    'PF' => 'French Polynesia',
	    'TF' => 'French Southern Territories',
	    'GA' => 'Gabon',
	    'GM' => 'Gambia the',
	    'GE' => 'Georgia',
	    'DE' => 'Germany',
	    'GH' => 'Ghana',
	    'GI' => 'Gibraltar',
	    'GR' => 'Greece',
	    'GL' => 'Greenland',
	    'GD' => 'Grenada',
	    'GP' => 'Guadeloupe',
	    'GU' => 'Guam',
	    'GT' => 'Guatemala',
	    'GG' => 'Guernsey',
	    'GN' => 'Guinea',
	    'GW' => 'Guinea-Bissau',
	    'GY' => 'Guyana',
	    'HT' => 'Haiti',
	    'HM' => 'Heard Island and McDonald Islands',
	    'VA' => 'Holy See (Vatican City State)',
	    'HN' => 'Honduras',
	    'HK' => 'Hong Kong',
	    'HU' => 'Hungary',
	    'IS' => 'Iceland',
	    'IN' => 'India',
	    'ID' => 'Indonesia',
	    'IR' => 'Iran',
	    'IQ' => 'Iraq',
	    'IE' => 'Ireland',
	    'IM' => 'Isle of Man',
	    'IL' => 'Israel',
	    'IT' => 'Italy',
	    'JM' => 'Jamaica',
	    'JP' => 'Japan',
	    'JE' => 'Jersey',
	    'JO' => 'Jordan',
	    'KZ' => 'Kazakhstan',
	    'KE' => 'Kenya',
	    'KI' => 'Kiribati',
	    'KP' => 'Korea',
	    'KR' => 'Korea',
	    'KW' => 'Kuwait',
	    'KG' => 'Kyrgyz Republic',
	    'LA' => 'Lao',
	    'LV' => 'Latvia',
	    'LB' => 'Lebanon',
	    'LS' => 'Lesotho',
	    'LR' => 'Liberia',
	    'LY' => 'Libyan Arab Jamahiriya',
	    'LI' => 'Liechtenstein',
	    'LT' => 'Lithuania',
	    'LU' => 'Luxembourg',
	    'MO' => 'Macao',
	    'MK' => 'Macedonia',
	    'MG' => 'Madagascar',
	    'MW' => 'Malawi',
	    'MY' => 'Malaysia',
	    'MV' => 'Maldives',
	    'ML' => 'Mali',
	    'MT' => 'Malta',
	    'MH' => 'Marshall Islands',
	    'MQ' => 'Martinique',
	    'MR' => 'Mauritania',
	    'MU' => 'Mauritius',
	    'YT' => 'Mayotte',
	    'MX' => 'Mexico',
	    'FM' => 'Micronesia',
	    'MD' => 'Moldova',
	    'MC' => 'Monaco',
	    'MN' => 'Mongolia',
	    'ME' => 'Montenegro',
	    'MS' => 'Montserrat',
	    'MA' => 'Morocco',
	    'MZ' => 'Mozambique',
	    'MM' => 'Myanmar',
	    'NA' => 'Namibia',
	    'NR' => 'Nauru',
	    'NP' => 'Nepal',
	    'AN' => 'Netherlands Antilles',
	    'NL' => 'Netherlands the',
	    'NC' => 'New Caledonia',
	    'NZ' => 'New Zealand',
	    'NI' => 'Nicaragua',
	    'NE' => 'Niger',
	    'NG' => 'Nigeria',
	    'NU' => 'Niue',
	    'NF' => 'Norfolk Island',
	    'MP' => 'Northern Mariana Islands',
	    'NO' => 'Norway',
	    'OM' => 'Oman',
	    'PK' => 'Pakistan',
	    'PW' => 'Palau',
	    'PS' => 'Palestinian Territory',
	    'PA' => 'Panama',
	    'PG' => 'Papua New Guinea',
	    'PY' => 'Paraguay',
	    'PE' => 'Peru',
	    'PH' => 'Philippines',
	    'PN' => 'Pitcairn Islands',
	    'PL' => 'Poland',
	    'PT' => 'Portugal, Portuguese Republic',
	    'PR' => 'Puerto Rico',
	    'QA' => 'Qatar',
	    'RE' => 'Reunion',
	    'RO' => 'Romania',
	    'RU' => 'Russian Federation',
	    'RW' => 'Rwanda',
	    'BL' => 'Saint Barthelemy',
	    'SH' => 'Saint Helena',
	    'KN' => 'Saint Kitts and Nevis',
	    'LC' => 'Saint Lucia',
	    'MF' => 'Saint Martin',
	    'PM' => 'Saint Pierre and Miquelon',
	    'VC' => 'Saint Vincent and the Grenadines',
	    'WS' => 'Samoa',
	    'SM' => 'San Marino',
	    'ST' => 'Sao Tome and Principe',
	    'SA' => 'Saudi Arabia',
	    'SN' => 'Senegal',
	    'RS' => 'Serbia',
	    'SC' => 'Seychelles',
	    'SL' => 'Sierra Leone',
	    'SG' => 'Singapore',
	    'SK' => 'Slovakia (Slovak Republic)',
	    'SI' => 'Slovenia',
	    'SB' => 'Solomon Islands',
	    'SO' => 'Somalia, Somali Republic',
	    'ZA' => 'South Africa',
	    'GS' => 'South Georgia and the South Sandwich Islands',
	    'ES' => 'Spain',
	    'LK' => 'Sri Lanka',
	    'SD' => 'Sudan',
	    'SR' => 'Suriname',
	    'SJ' => 'Svalbard & Jan Mayen Islands',
	    'SZ' => 'Swaziland',
	    'SE' => 'Sweden',
	    'CH' => 'Switzerland, Swiss Confederation',
	    'SY' => 'Syrian Arab Republic',
	    'TW' => 'Taiwan',
	    'TJ' => 'Tajikistan',
	    'TZ' => 'Tanzania',
	    'TH' => 'Thailand',
	    'TL' => 'Timor-Leste',
	    'TG' => 'Togo',
	    'TK' => 'Tokelau',
	    'TO' => 'Tonga',
	    'TT' => 'Trinidad and Tobago',
	    'TN' => 'Tunisia',
	    'TR' => 'Turkey',
	    'TM' => 'Turkmenistan',
	    'TC' => 'Turks and Caicos Islands',
	    'TV' => 'Tuvalu',
	    'UG' => 'Uganda',
	    'UA' => 'Ukraine',
	    'AE' => 'United Arab Emirates',
	    'GB' => 'United Kingdom',
	    'US' => 'United States of America',
	    'UM' => 'United States Minor Outlying Islands',
	    'VI' => 'United States Virgin Islands',
	    'UY' => 'Uruguay, Eastern Republic of',
	    'UZ' => 'Uzbekistan',
	    'VU' => 'Vanuatu',
	    'VE' => 'Venezuela',
	    'VN' => 'Vietnam',
	    'WF' => 'Wallis and Futuna',
	    'EH' => 'Western Sahara',
	    'YE' => 'Yemen',
	    'ZM' => 'Zambia',
	    'ZW' => 'Zimbabwe'
	);

	return $countryList;

	// if ($countries_ret = "get_countries") {
	// 	return $countryList;
	// }elseif( !$countryList[$code] ) {
	// 	return $code;
	// }else{
 //    	return $countryList[$code];
	// }
}

function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));   
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryCode;
        $result['city'] = $ip_data->geoplugin_city;
        $result['currencyCode'] = $ip_data->geoplugin_currencyCode;
    }
    return $result;
}

function wpsites_register_woo_widget() {

 register_sidebar( array(
    'name' => 'Before Products Widget',
    'id' => 'before-products',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
) );
}

add_action( 'widgets_init', 'wpsites_register_woo_widget' );

add_filter( 'woocommerce_sidebar', 'before_products_widget', 25 );

function before_products_widget() {


        // if ( is_product() && is_active_sidebar( 'before-products' ) ) { 
        dynamic_sidebar('before-products', array(
    'before' => '<div class="before-products">',
        'after' => '</div>',
) );


    // }

}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('XOXO API Tokens'),
            'menu_title'    => __('XOXO API Tokens'),
            'menu_slug'     => 'xoxo-api-tokens',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}