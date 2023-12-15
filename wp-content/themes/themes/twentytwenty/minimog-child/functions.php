<?php
require_once(ABSPATH . 'wp-config.php'); 
require_once(ABSPATH . 'wp-includes/wp-db.php'); 
require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 

require_once('stripe/vendor/autoload.php');

//files for media_sideload_image
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once('ding-functions/ding-functions.php');


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
    wp_enqueue_style('tooltip-main', 'https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/tooltipster.min.css' );
    wp_enqueue_style('tooltip-light-theme', 'https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/css/themes/tooltipster-light.min.css' );


    wp_enqueue_style('fontawsome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css' );

    wp_enqueue_style('select2css', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css' );
    wp_enqueue_style('customcss', get_stylesheet_directory_uri(). '/customcss.css' );
    
    
    // wp_enqueue_script('jqcustomlib', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', 'jQuery', '', true);
    wp_enqueue_script('customjs', get_stylesheet_directory_uri(). '/customjs.js', 'jQuery', '', true);
    wp_enqueue_script('slect2js', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js', 'jQuery', '', true);
    wp_enqueue_script('slect2js', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js', 'jQuery', '', true);
    wp_enqueue_script('wc-blockui', 'https://malsup.github.io/jquery.blockUI.js', array('jquery'), '0.01', true);
    wp_enqueue_script('tooltip', 'https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js', array('jquery'), '0.01', true);


}

// Only show products in the front-end search results

function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;

    if ( empty( $search ) )
        return $search; // skip processing - no search term in query

    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';

    $search =
    $searchand = '';

    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }

    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }

    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );

add_filter('pre_get_posts','search_filter_pages');
function search_filter_pages($query) {
    // Frontend search only
	
    if ( ! is_admin() && $query->is_search() && $query->is_main_query() ) {
		
        $query->set('post_type', 'product');
        $query->set( 'wc_query', 'product_query' );
    }else if( is_shop() && $query->is_main_query()){
		
    	if(isset($_GET['filterc_country']) && $_GET['filterc_country']!="" && $_GET['filterc_country']!="all_cnt"){
    		// My criteria
    		if($_GET['filterc_country']=="global"){
				
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
	                'value'   => $_GET['filterc_country'],
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
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );

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

//for showing discountpercentage in product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
function woocommerce_add_custom_text_before_product_title(){
	global $product;
	$product_id = $product->get_id();

	if(get_field('custom_discount', $product_id)){
		echo '<div class="entry-product-badges product-badges product-badges-label" bis_skin_checked="1"><div class="vi-sctv-sale-badge onsale" bis_skin_checked="1"><span>-'.get_field('custom_discount', $product_id).'%</span></div></div>';
	}elseif(get_field('product_discount', $product_id)){
		echo '<div class="entry-product-badges product-badges product-badges-label" bis_skin_checked="1"><div class="vi-sctv-sale-badge onsale" bis_skin_checked="1"><span>-'.get_field('product_discount', $product_id).'%</span></div></div>';
	}	

    the_title( '<h3 class="product_title entry-title">'.$custom_text, '</h3>' );

}
add_action( 'woocommerce_single_product_summary', 'woocommerce_add_custom_text_before_product_title', 5);



//END for showing discountpercentage in product page
function add_povider_des($provider){
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetProviders/?providerCodes='.$provider,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
    'Cookie: visid_incap_1694192=/GFjcyk9QCOLEPJazG6zavnZz2IAAAAAQUIPAAAAAADIZLCa+SmmK+YX1cP7z8uY; __cf_bm=ncFPbme8lA8iqD5r5X2t57mnzF6VS9G7e6ZLk9m3rTM-1661426745-0-AftF0L9Ne8tKw4fMqAdVo69UCe1gvDuCh+sEq/aa/db8NNdcW/0+bGQ8bB0djquERQYa7SNQN3Va9FnBxKBRqUk='
  ),
));

$response = curl_exec($curl);
$response=json_decode($response, true);
curl_close($curl);
/*  echo "<pre>";
print_r ($response);
echo "</pre>";  */
$product_name=$response['Items'][0]['Name'];
//echo $name;
$product_logo =$response['Items'][0]['LogoUrl'];
//echo $logo;

$return_array = array( $product_name, $product_logo );
return $return_array; 

}


function addDingProduct($prd_info_array){
	$provi_prd = add_povider_des($prd_info_array['ProviderCode']);
		//print_r($provi_prd);
		//echo $prd_info_array['ProviderCode'].'<br><br/>';
		//echo $prd_info_array['SkuCode'].'<br>';
	
	// echo $prd_info_array['productId']."<br><br>";
	// check if the rwdProduct already exixts
		$rwd_product_exists = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'product',
			'meta_key'		=> 'product_type',
			
			'meta_value'	=> $prd_info_array['SkuCode'],
			'fields' => 'ids',
		));

		if($rwd_product_exists){

			update_ding_prd($rwd_product_exists[0], $prd_info_array);
			$ret_array = array(
							"code"=>"2",
							"message"=>"Product Already Exists",
							"SkuCode"=>$rwd_product_exists[0],
						);
			return $ret_array;
		}
	//


	//adding the ADD Dingproduct with API returned ID
	$rwd_desc = $prd_info_array['DefaultDisplayText'];
	if($rwd_desc==""){
		$rwd_desc = " ";
	}
	
	

	$rwd_prd_post = array(
		'post_type'=> 'product',
		'post_status'=> 'publish',
		'post_title'=> $provi_prd[0],
		'post_content'=> $prd_info_array['DefaultDisplayText'],
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
		$cat_exists_cmn = term_exists('egifts-plus', 'product_cat');
		if(!$cat_exists_cmn){
			$insert_cmn_cat = wp_insert_term(
			  	'egifts-plus', // the term 
			  	'product_cat', // the taxonomy
			  	array(
			    	'description'=> 'Common Ding Gift Tremendous API Product Category',
			  	)
			);	
			$cmn_cat_id = $insert_cmn_cat['term_id'];
		}else{
			$cmn_cat_id = $cat_exists_cmn['term_id'];
		}

		//create category if not present and assign or added ding API product to it.
		if($prd_info_array['categories'] != ""){
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



					if(!is_wp_error($inserted_cat)){
						$catgs_to_add[] = (int)$inserted_cat['term_id'];
					}

					
				}
			}

			$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
			$assign_catgs[] = (int)$cmn_cat_id;
			wp_set_object_terms( $inserted_post_id, $assign_catgs, 'product_cat' );
		}
		
		//when product added, update the meta_data
		wp_set_object_terms($inserted_post_id, 'simple', 'product_type');
		wp_set_object_terms($inserted_post_id, 'egifts-plus', 'product_cat');
		wp_set_object_terms($inserted_post_id, 'realtime', 'product_tag');
		update_post_meta($inserted_post_id, '_virtual', 'yes');
		update_post_meta($inserted_post_id, '_regular_price', '1');
		update_post_meta($inserted_post_id, '_price', '1');
		update_field('fromproduct_type', 'Ding Api' , $inserted_post_id);
		update_field('rwd_product_api_id', $prd_info_array['SkuCode'], $inserted_post_id);
		update_field('rwd_product_api_image',$provi_prd[1], $inserted_post_id);
		update_field('rwd_product_currency', $prd_info_array['Minimum']['SendCurrencyIso'], $inserted_post_id);
		update_field('rwd_product_country', $prd_info_array['RegionCode'], $inserted_post_id);
		update_field('product_disclosure', $prd_info_array['termsAndConditionsInstructions'], $inserted_post_id);
		update_field('delivery_type', $prd_info_array['ProcessingMode'], $inserted_post_id);
		update_field('deliverytime', $prd_info_array['tatInDays'], $inserted_post_id);
		update_field('redemptionmechanism', $prd_info_array['RedemptionMechanism'], $inserted_post_id);

		if($prd_info_array['discount'] > 0){
			update_field('product_discount', $prd_info_array['discount'], $inserted_post_id);
		}

		if(isset($prd_info_array['description']) && $prd_info_array['description']!=""){
			$update_post_cont = array(
			      'ID'           => $inserted_post_id,
			      'post_content' => $prd_info_array['description']
		  	);		 
			// Update the post into the database
	  		wp_update_post( $update_post_cont );
	  	}

         
	  		$row = array(
			    'min_sku' => $prd_info_array['Minimum']['SendValue'],
			    'max_sku' => $prd_info_array['Maximum']['SendValue']
			);
			add_row('skus', $row, $inserted_post_id);
		
		
		//uploading and adding the feature image to the post
		$image = media_sideload_image( $provi_prd[1], $inserted_post_id, $provi_prd[0], 'id' );
		set_post_thumbnail( $inserted_post_id, $image );
		//$image = media_sideload_image( 'https://43523f7b3b.nxcli.net/wp-content/uploads/2022/08/images.png', $inserted_post_id, $prd_info_array['name'], 'id' );
		//set_post_thumbnail( $inserted_post_id, $image );
		$ret_array = array(
						"code"=>"1",
						"message"=>"Product added successfully. Product ID: ".$inserted_post_id,
					);
		return $ret_array;
	}

}


function update_ding_prd( $product_id, $prd_info_array) { 
$provi_prd = add_povider_des($prd_info_array['ProviderCode']);
		print_r($provi_prd);
		//echo $prd_info_array['ProviderCode'].'<br><br/>';
		//echo $prd_info_array['SkuCode'].'<br>';
	//removing existing categories
	$terms = get_the_terms($product_id, 'product_cat');
	foreach($terms as $term){
	    wp_remove_object_terms($product_id, $term->term_id, 'product_cat');
	}
	//END removing existing categories

	//create common category for order API
	$cat_exists_cmn = term_exists('egifts-plus', 'product_cat');
	if(!$cat_exists_cmn){
		$insert_cmn_cat = wp_insert_term(
		  	'egifts-plus', // the term 
		  	'product_cat', // the taxonomy
		  	array(
		    	'description'=> 'Common Ding Gift Tremendous API Product Category',
		  	)
		);	
		$cmn_cat_id = $insert_cmn_cat['term_id'];
	}else{
		$cmn_cat_id = $cat_exists_cmn['term_id'];
	}

	//create category if not present and assign or added reward API product to it.
	if($prd_info_array['categories'] != ""){
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
				  /* array(
				    'description'=> 'Reward Product Form Xoxo API',
				  ) */
				);

				$catgs_to_add[] = (int)$inserted_cat['term_id'];
			}
		}

		$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
		$assign_catgs[] = (int)$cmn_cat_id;
		wp_set_object_terms( $product_id, $assign_catgs, 'product_cat' );
	}

	//when product added, update the meta_data
	
	wp_set_object_terms($product_id, 'simple', 'product_type');
	wp_set_object_terms( $product_id, 'egifts-plus', 'product_cat' );
		wp_set_object_terms($product_id, 'realtime', 'product_tag');
		update_post_meta($product_id, '_virtual', 'yes');
		update_post_meta($product_id, '_regular_price', '1');
		update_post_meta($product_id, '_price', '1');
		update_field('fromproduct_type', 'Ding Api' , $product_id);
		update_field('rwd_product_api_id', $prd_info_array['SkuCode'], $product_id);
		update_field('rwd_product_api_image', $provi_prd[1], $product_id);
		update_field('rwd_product_currency', $prd_info_array['Minimum']['SendCurrencyIso'], $product_id);
		update_field('rwd_product_country', $prd_info_array['RegionCode'], $product_id);
		update_field('product_disclosure', $prd_info_array['termsAndConditionsInstructions'], $product_id);
		update_field('delivery_type', $prd_info_array['ProcessingMode'], $product_id);
		update_field('deliverytime', $prd_info_array['tatInDays'], $product_id);
		update_field('redemptionmechanism', $prd_info_array['RedemptionMechanism'], $product_id);

		if($prd_info_array['discount'] > 0){
			update_field('product_discount', $prd_info_array['discount'], $inserted_post_id);
		}

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
				add_row('skus', $row, $inserted_post_id);
			}

	  	}else if($prd_info_array['valueType']=='open_value'){
	  		$row = array(
			    'min_sku' => $prd_info_array['Minimum']['SendValue'],
			    'max_sku' => $prd_info_array['Maximum']['SendValue']
			);
			add_row('skus', $row, $inserted_post_id);
	  	}
		/* $row = array(
			    'min_sku' => $prd_info_array['Minimum']['SendValue'],
			    'max_sku' => $prd_info_array['Maximum']['SendValue']
			); */
			add_row('skus', $row, $inserted_post_id);

		//uploading and adding the feature image to the post
		$image = media_sideload_image( $provi_prd[1], $product_id, $provi_prd[0], 'id' );
		set_post_thumbnail( $product_id, $image );
		
}
          

function addRewardProduct($prd_info_array){
	// echo $prd_info_array['productId']."<br><br>";
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
		$cat_exists_cmn = term_exists('egifts', 'product_cat');
		if(!$cat_exists_cmn){
			$insert_cmn_cat = wp_insert_term(
			  	'reward-product-api', // the term 
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
		if($prd_info_array['categories'] != ""){
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



					if(!is_wp_error($inserted_cat)){
						$catgs_to_add[] = (int)$inserted_cat['term_id'];
					}

					
				}
			}

			$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
			$assign_catgs[] = (int)$cmn_cat_id;
			wp_set_object_terms( $inserted_post_id, $assign_catgs, 'product_cat' );
		}

            

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
		wp_set_object_terms($inserted_post_id, $prd_info_array['deliveryType'], 'product_tag');
		wp_set_object_terms($inserted_post_id, 'egifts', 'product_cat');
		update_post_meta($inserted_post_id, '_virtual', 'yes');
		update_post_meta($inserted_post_id, '_regular_price', '1');
		update_post_meta($inserted_post_id, '_price', '1');
		update_field('fromproduct_type', 'XOXO' , $inserted_post_id);
		update_field('rwd_product_api_id', $prd_info_array['productId'], $inserted_post_id);
		update_field('rwd_product_api_image', $prd_info_array['imageUrl'], $inserted_post_id);
		update_field('rwd_product_currency', $prd_info_array['currencyCode'], $inserted_post_id);
		update_field('rwd_product_country', $prd_info_array['countryCode'], $inserted_post_id);
		update_field('product_disclosure', $prd_info_array['termsAndConditionsInstructions'], $inserted_post_id);
		update_field('delivery_type', $prd_info_array['deliveryType'], $inserted_post_id);
		update_field('deliverytime', $prd_info_array['tatInDays'], $inserted_post_id);

		if($prd_info_array['discount'] > 0){
			update_field('product_discount', $prd_info_array['discount'], $inserted_post_id);
		}

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
		//set_post_thumbnail( $inserted_post_id, $image );
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
	$cat_exists_cmn = term_exists('egifts', 'product_cat');
	if(!$cat_exists_cmn){
		$insert_cmn_cat = wp_insert_term(
		  	'reward-product-api', // the term 
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
	if($prd_info_array['categories'] != ""){
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
	}

	//when product added, update the meta_data
		wp_set_object_terms($product_id, 'simple', 'product_type');
		wp_set_object_terms('product_tag' , $prd_info_array['deliveryType'], $product_id);
		wp_set_object_terms($inserted_post_id, 'egifts', 'product_cat');
		update_post_meta($product_id, '_regular_price', '1');
		update_post_meta($product_id, '_price', '1');
		update_field('fromproduct_type', 'XOXO' , $product_id);
		update_field('rwd_product_api_id', $prd_info_array['productId'], $product_id);
		update_field('rwd_product_api_image', $prd_info_array['imageUrl'], $product_id);
		update_field('rwd_product_currency', $prd_info_array['currencyCode'], $product_id);
		update_field('rwd_product_country', $prd_info_array['countryCode'], $product_id);
		update_field('product_disclosure', $prd_info_array['termsAndConditionsInstructions'], $product_id);
		update_field('delivery_type', $prd_info_array['deliveryType'], $product_id);
		update_field('deliverytime', $prd_info_array['tatInDays'], $product_id);
		if($prd_info_array['discount'] > 0){
			update_field('product_discount', $prd_info_array['discount'], $inserted_post_id);
		}

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
		//set_post_thumbnail( $product_id, $image );
}


  //////////////////////////////////ADD RELOADLY PRODUCTS//////////////////////////////////////

function addreloadlyProduct($prd_info_array){
	//$provi_prd = add_povider_des($prd_info_array['ProviderCode']);
	
	
	//echo $provi_prd;
		//print_r($provi_prd);
		//echo $prd_info_array['ProviderCode'].'<br><br/>';
		//echo $prd_info_array['SkuCode'].'<br>';
	
	// echo $prd_info_array['productId']."<br><br>";
	// check if the rwdProduct already exixts
		$rwd_product_exists = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'product',
			'meta_key'		=> 'rwd_product_api_id',
			'meta_value'	=> $prd_info_array['productId'],
			'fields' => 'ids',
		));
		
		if($rwd_product_exists){

			update_giftcard_prd($rwd_product_exists[0], $prd_info_array);
			$ret_array = array(
							"code"=>"2",
							"message"=>"Product Already Exists",
							"SkuCode"=>$rwd_product_exists[0],
						);
			return $ret_array;
		}
	//


	//adding the ADD Dingproduct with API returned ID
	$rwd_desc = $prd_info_array['redeemInstruction']['verbose'];
	if($rwd_desc==""){
		$rwd_desc = " ";
	}
	
	

	$rwd_prd_post = array(
		'post_type'=> 'product',
		'post_status'=> 'publish',
		'post_title'=> $prd_info_array['productName'],
		'post_content'=> $prd_info_array['redeemInstruction']['verbose'],
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
		$cat_exists_cmn = term_exists('gifto', 'product_cat');
		if(!$cat_exists_cmn){
			$insert_cmn_cat = wp_insert_term(
			  	'gifto', // the term 
			  	'product_cat', // the taxonomy
			  	array(
			    	'description'=> 'Common Reloadly Gift Tremendous API Product Category',
			  	)
			);	
			$cmn_cat_id = $insert_cmn_cat['term_id'];
		}else{
			$cmn_cat_id = $cat_exists_cmn['term_id'];
		}

		//create category if not present and assign or added ding API product to it.
		if($prd_info_array['categories'] != ""){
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
					    'description'=> 'Reward Product Form Relodly API',
					  )
					);



					if(!is_wp_error($inserted_cat)){
						$catgs_to_add[] = (int)$inserted_cat['term_id'];
					}

					
				}
			}

			$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
			$assign_catgs[] = (int)$cmn_cat_id;
			wp_set_object_terms( $inserted_post_id, $assign_catgs, 'product_cat' );
			
		}
		
		//when product added, update the meta_data
		wp_set_object_terms($inserted_post_id, 'simple', 'product_type');
		wp_set_object_terms($inserted_post_id, $prd_info_array['brand']['brandName'], 'product_tag ');
		wp_set_object_terms($inserted_post_id, 'gifto', 'product_cat');
		//wp_set_object_terms( $inserted_post_id, 'productId', '_sku' );
		
		//fixedRecipientToSenderDenominationsMap
		update_post_meta($inserted_post_id, '_virtual', 'yes');
	    update_post_meta($inserted_post_id, 'fixedRecipientDenominations', '1');
	     update_post_meta($inserted_post_id, '_price', '1');
		 update_post_meta($inserted_post_id, '_sku', $prd_info_array['productId'].'_R');
		
		
	   update_field('fromproduct_type', 'reloadly' , $inserted_post_id);
		update_field('rwd_product_api_id', $prd_info_array['productId'], $inserted_post_id);
		
		update_field('rwd_product_api_image',$prd_info_array['logoUrls'], $inserted_post_id);
		update_field('rwd_product_currency', $prd_info_array['recipientCurrencyCode'], $inserted_post_id);
		update_field('rwd_product_country', $prd_info_array['country']['isoName'], $inserted_post_id);
		//update_field('product_disclosure', $prd_info_array['redeemInstruction']['verbose'], $inserted_post_id);
		//update_field('delivery_type', $prd_info_array['ProcessingMode'], $inserted_post_id);
		//update_field('deliverytime', $prd_info_array['tatInDays'], $inserted_post_id);
		//update_field('redemptionmechanism', $prd_info_array['RedemptionMechanism'], $inserted_post_id);
        if($prd_info_array['discount'] > 0){
			update_field('product_discount', $prd_info_array['discount'], $inserted_post_id);
		}

		if(isset($prd_info_array['redeemInstruction']['verbose']) && $prd_info_array['redeemInstruction']['verbose']!=""){
			$update_post_cont = array(
			      'ID'           => $inserted_post_id,
			      'post_content' => $prd_info_array['redeemInstruction']['verbose']
		  	);		 
			// Update the post into the database
	  		wp_update_post( $update_post_cont );
	  	}

         	if($prd_info_array['denominationType']=='FIXED'){
	  		$denominations_array = $prd_info_array['fixedRecipientDenominations'];
          //print_r($denominations_array);
	  		foreach($denominations_array as $key_sku => $value_sku){
				$row = array(
				    'min_sku' => $denominations_array[$key_sku],
				    'max_sku' => $denominations_array[$key_sku]
				);
				add_row('skus', $row, $inserted_post_id);
			}

	  	}elseif($prd_info_array['denominationType']=='RANGE'){
	  		$row = array(
			    'min_sku' => $prd_info_array['minRecipientDenomination'],
			    'max_sku' => $prd_info_array['maxRecipientDenomination']
			);
			add_row('skus', $row, $inserted_post_id);
	  	}
	  	
		
		
		//uploading and adding the feature image to the post
		$image = media_sideload_image( $provi_prd[1], $inserted_post_id, $provi_prd[0], 'id' );
		set_post_thumbnail( $inserted_post_id, $image );
		//$image = media_sideload_image( 'https://43523f7b3b.nxcli.net/wp-content/uploads/2022/08/images.png', $inserted_post_id, $prd_info_array['name'], 'id' );
		//set_post_thumbnail( $inserted_post_id, $image );
		$ret_array = array(
						"code"=>"1",
						"message"=>"Product added successfully. Product ID: ".$inserted_post_id,
					);
		return $ret_array;
	}

}
//////End add reloady products///////
///////////////////////////////////////UPDATE RELOADLY PRODUCTS/////////////////////////////////////////////////



function update_giftcard_prd( $product_id, $prd_info_array) { 

	//$provi_prd = add_povider_des($prd_info_array['ProviderCode']);
		//print_r($provi_prd);
		//echo $prd_info_array['ProviderCode'].'<br><br/>';
		//echo $prd_info_array['SkuCode'].'<br>';
	//removing existing categories
	$terms = get_the_terms($product_id, 'product_cat');
	foreach($terms as $term){
	    wp_remove_object_terms($product_id, $term->term_id, 'product_cat');
	}
	//END removing existing categories

	//create common category for order API
	$cat_exists_cmn = term_exists('gifto', 'product_cat');
	if(!$cat_exists_cmn){
		$insert_cmn_cat = wp_insert_term(
		  	'gifto', // the term 
		  	'product_cat', // the taxonomy
		  	array(
		    	'description'=> 'Reloadly giftcard products',
		  	)
		);	
		$cmn_cat_id = $insert_cmn_cat['term_id'];
	}else{
		$cmn_cat_id = $cat_exists_cmn['term_id'];
	}

	//create category if not present and assign or added reward API product to it.
	if($prd_info_array['categories'] != ""){
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
				  'product_cat', // the taxonomyd
				  /* array(
				    'description'=> 'Reward Product Form Xoxo API',
				  ) */
				);

				$catgs_to_add[] = (int)$inserted_cat['term_id'];
			}
		}

		$assign_catgs = array_merge($catgs_to_add,$catgs_exixts);
		$assign_catgs[] = (int)$cmn_cat_id;
		wp_set_object_terms( $product_id, $assign_catgs, 'product_cat' );
		
	}

	//when product added, update the meta_data
	
	wp_set_object_terms($product_id, 'simple', 'product_type');
	wp_set_object_terms( $product_id, 'gifto', 'product_cat' );
	
		wp_set_object_terms( $product_id, $prd_info_array['brand']['brandName'], 'product_tag' );
		update_post_meta($product_id, '_virtual', 'yes');
		update_post_meta($product_id, '_regular_price', '1');
		update_post_meta($product_id, '_sku', $prd_info_array['productId'].'_R');
		
		
		update_post_meta($product_id, '_price', '1');
			//update_post_meta($product_id, 'sku', 'r');
	update_field('fromproduct_type', 'reloadly' , $inserted_post_id);
		update_field('rwd_product_api_id', $prd_info_array['productId'], $inserted_post_id);
		update_field('rwd_product_api_image',$prd_info_array['logoUrls'], $inserted_post_id);
		
		update_field('rwd_product_currency', $prd_info_array['recipientCurrencyCode'], $inserted_post_id);
		update_field('rwd_product_country', $prd_info_array['country']['isoName'], $inserted_post_id);
		//update_field('product_disclosure', $prd_info_array['redeemInstruction']['verbose'], $inserted_post_id);

		if($prd_info_array['discount'] > 0){
			update_field('product_discount', $prd_info_array['discount'], $inserted_post_id);
		}

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
		//set_post_thumbnail( $product_id, $image );
}



////end reloadly plugin//////

// define the woocommerce_thankyou callback 
function action_woocommerce_thankyou( $order_get_id ) { 

global $product;
    ob_start();
    

	global $product; 

	$order = wc_get_order( $order_get_id );
	
		
	// check if API already run for the order
	$api_run = get_field( "reward_api_run", $order_get_id );
	if($api_run){
		return;
	}

	$reward_products = array();
	// The loop to get the order items which are WC_Order_Item_Product objects since WC 3+
	$order_itr = 1;
	$pending = 0;
	$api_statuses = array();
	$delivery_statuses = array();
	$po_numbers = array();
    $ding_delivery_sts =array();
	$ding_prdct_err=array();
	$ding_type_prd = array();

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
		
		$product_type = get_field('fromproduct_type',$product_id ,'Product Type');
		//echo $product_type;
	if($product_type == 'XOXO'){ 
	   //echo "1";
			if (has_term( 'reward-product-api', 'product_cat', $product_id )){
				//echo "s";
				$prdids_api = get_field('rwd_product_api_id', $product_id);
				$prd_quantity = $item->get_quantity();
				// $order_phone = $reward_products[$rp_key]['prdphone'];
				$ro_ponumber = $order_get_id.'-'.$order_itr;
				$ro_email = $item->get_meta('_tchknwdev_rwdemail');

				$denom_evaluate = explode("_",$item->get_meta('_tchknwdev_rwdprice'));
				$ro_denomination = $denom_evaluate[0];

				$xoxo_access_token = get_field('access_token', 'option');

				$curl = curl_init();

				$api_url_temp = get_field('api_url', 'option');
				$api_url = $api_url_temp."/v1/oauth/api";

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $api_url,
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
							"contact :"+971'.$ro_phone.'",
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
			  /* echo "<pre>";
					print_r($response);
					echo "</pre>"; */
				curl_close($curl);
            
				update_field( 'reward_api_run', 'yes', $order_get_id );
				//update_field( 'product_type', 'XOXO', $order_get_id );
				if($response->code){
					echo "error";
					$delv_er_mk= $response->error;
					$er_message_apireturn = $response->errorInfo." - ".$response->error;
					$delv_status = $response->data->placeOrder->data->deliveryStatus;
					$api_statuses[] = "error: ".$er_message_apireturn;
					$delivery_statuses[] = "api Error";
					$po_numbers[] = "api Error";
					$delivery_statuses_str = implode( ",", $delivery_statuses );
					wc_update_order_item_meta($item_id, '_tchknwdev_deliverystatus', $delv_er_mk);
				}else{
					//echo "sucess";
					$delv_status = $response->data->placeOrder->data->deliveryStatus;
					//echo $delv_status;
					$delv_er_mk= $response->error;
					//echo $delv_er_mk;
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
							"contact :"+971'.$ro_phone.'",
							"tag":"XOXO",
							"notifyReceiverEmail":"1",
							"poNumber":"'.$ro_ponumber.'"
								
						}
					}
				}';
				$log_file_content .= "________________________________________________________";

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
			
	}
	
	
	 if ($product_type == 'Ding Api'){
		
		if (has_term( 'egifts-plus', 'product_cat', $product_id )){
			$prdids_api = get_field('rwd_product_api_id', $product_id);
			
			if( have_rows('skus',$product_id) ):

			// loop through the rows of data
			while ( have_rows('skus',$product_id) ) : the_row();

				// display a sub field value
			  //  the_sub_field('sub_field_name');
			$dindsndvalue=get_sub_field('min_sku', $product_id);
			endwhile;else :endif;
			$crncy= get_field('rwd_product_currency', $product_id);
			
			
			//$accnumbr=get_field('AccountNumber',$product_id) 
					$prd_quantity = $item->get_quantity();
					$order_phone = $ding_products[$rp_key]['prdphone'];
					$ro_number = $order_get_id.'-'.$order_itr;
					$ro_mail = $item->get_meta('_tchknwdev_rwdemail');
					$ro_phone =$item->get_meta('_tchknwdev_rwdnumv');
					$redmtype =get_field('redemptionmechanism', $product_id);
					  //echo $redmtype;
					    if($redmtype == 'Immediate'){
						$dng_numail = $item->get_meta('_tchknwdev_rwdnumv');
					     echo $dng_numail;
					
					}else if ($redmtype == 'ReadReceipt'){
					$dng_numail = "0000000000";
             //echo $dng_numail;die(1);					
												
					}
					// $ro_phone = $dng_numail;
					$denom_evaluates = explode("_",$item->get_meta('_tchknwdev_rwdprice'));
					$ro_denominations = $denom_evaluates[0];
						
					function secure_random_string($length) {
						$random_string = '';
						for($i = 0; $i < $length; $i++) {
							$number = random_int(0, 36);
							$character = base_convert($number, 10, 36);
							$random_string .= $character;
						}
					 
						return $random_string;
					}
					$randomNumber = secure_random_string(5);
					$randomname=secure_random_string(10,17);
					$randvalue =secure_random_string(9,19);
					
					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/SendTransfer',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => '',
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => 'POST',
					  CURLOPT_POSTFIELDS =>'{
						"SkuCode": "'.$prdids_api.'",
						"SendValue": '.$dindsndvalue.',
						"SendCurrencyIso": "'.$crncy.'",
						"AccountNumber":"'.$dng_numail.'",
						"DistributorRef": "'.$randomNumber.'",
						"Settings": [
						{
						"Name": "'.$randomname.'",
						"Value": "'.$randvalue.'"
						}
						],
						"ValidateOnly": false,
						"BillRef": "string"
					  }',
					  CURLOPT_HTTPHEADER => array(
						'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
						'Content-Type: application/json',
						'Cookie: visid_incap_1694192=/GFjcyk9QCOLEPJazG6zavnZz2IAAAAAQUIPAAAAAADIZLCa+SmmK+YX1cP7z8uY; __cf_bm=NENhxw8Dz_o3s1CCaYoNGV60ss1HMBeRw_cbeopBbNA-1660728577-0-AQmZ+LQmh8QbJO/h7FElz5ZM/oQKglzjJCp4u6kfAGai6FlJ5EIt+vptq4yQ9/XqpXmUNsjzzhd726rzw7CrGyM='
					  ),
					));
				  /* echo '{
					"SkuCode": "'.$prdids_api.'",
					"SendValue": '.$dindsndvalue.',
					"SendCurrencyIso": "'.$crncy.'",
					"AccountNumber":"'.$dng_numail.'",
					"DistributorRef": 0,
					"Settings": [
					{
					"Name": "Madhu",
					"Value": "dgdfg"
					}
					],//if validate true then the api return the success and not recharging.
					"ValidateOnly": true,
					"BillRef": "string"
				}';    */
				$response = curl_exec($curl);
				$response = json_decode($response, true);
				 /*  echo "<pre>";
				print_r($response);
				echo "</pre>"; */ 
				$err = curl_error($curl);
				curl_close($curl);
					$pin = $response['TransferRecord']['ReceiptParams']['pin'];
					//echo $pin;
				if($pin){
					//$pin = "1234567";
					$phoneNumber = $ro_phone;
					$to = $ro_mail; //sendto@example.com
					$subject = 'Reward code';
					$message ="Hi there!
						<p>Thanks for ordering. Please find below your unique code for redemption.
						We hope you will enjoy using it or share it with those who wish to gift it.</p>

						<p class='code_class' style ='color:red;'><strong>Your voucher Code:</strong> ".$pin." </p>


						<p>Please check our FAQs, Help section online, or the terms & conditions of usage for this voucher. </p>

						<p>If you have any feedback, we would love to hear from you.</p>

						<p>Our friendly team is here to help. Reach out via email or chat or by filling in the contact form on our site.</p>


						<p>Best!</p>
						";
					//$body = "Your voucher Code : ".$pin;
					$headers = array('Content-Type: text/html; charset=UTF-8');

				     smsTwilio($phoneNumber, $pin);
					wp_mail( $to, $subject, $message, $headers );

					//smsTwilio($phoneNumber, $pin);
				     }
					 
					 
					 
				update_field( 'reward_api_run', 'yes', $order_get_id );
				//update_field( 'product_type', 'Ding Api', $order_get_id );
				$status = $response['TransferRecord']['ProcessingState'];
				//echo $status;
				$prd_errer = $response['ErrorCodes'][0]['Code'];
				if($status =='failed'){	
				//echo "failed";
					//$prd_errer = $response['ErrorCodes'][0]['Code'];
					//echo $prd_errer;
					$del_status = $response['TransferRecord']['ProcessingState'];
					$ding_message_apireturn = $response['ErrorCodes'][0]['Code']." - ".$response['ErrorCodes'];
					$api_statuses[] = "error: ".$ding_message_apireturn;
					$ding_delivery_sts[] = "api Error";
					$po_numbers[] = "api Error";
					$ding_prdct_err[]= $product_id."error type:".$prd_errer;
						 
				}else{
				//	echo "succes";
					$tpty= $response['Items']['RedemptionMechanism'];
					//echo $tpty;
					$del_status = $response['TransferRecord']['ProcessingState'];
				//	echo $del_status;
					$api_statuses[] = "success";
					$ding_type_prd[] ="type".$tpty;
					$ding_delivery_sts[] = $product_id."-".$del_status;
					$po_numbers[] = $ro_number;
					$complt="complete";
					if($prd_errer){
						$ding_prdct_err[]= $product_id."-".$prd_errer;
					}else{
						$ding_prdct_err[]= $product_id."-".$complt;	
					}
					wc_update_order_item_meta($item_id, '_tchknwdev_deliverystatus', $del_status);		 
						if($del_status=="pending"){
							$pending = 1;
						}
				}

						//content for log files
				$order_log_message = array("Ding Order Status", $response);
				$log_file_content .= print_r($order_log_message, TRUE);
				$log_file_content .= "________________________________________________________";
				$log_file_content .='{
						"SkuCode": "'.$prdids_api.'",
						"SendValue": '.$dindsndvalue.',
						"SendCurrencyIso": "'.$crncy.'",
						"AccountNumber":"'.$dng_numail.'",
						"DistributorRef": "'.$randomNumber.'",
						"Settings": [
						{
						"Name": "'.$randomname.'",
						"Value": "'.$randvalue.'"
						}
						],
						"ValidateOnly": false,
						"BillRef": "string"
					  }';
				$ding_delivery_sts_str = implode( ",", $ding_delivery_sts );
				update_field( 'devivery_status', $ding_delivery_sts_str, $order_get_id );
				$ding_prdct_err_str = implode( ",", $ding_prdct_err );
				update_field( 'error', $ding_prdct_err_str, $order_get_id );
		}
		
	}

// SMS and Mail Functionality After order for Reloadly 
if ($product_type == 'reloadly'){
		
		if (has_term( 'gifto', 'product_cat', $product_id )){
			$prdids_api = get_field('rwd_product_api_id', $product_id);
			
			if( have_rows('skus',$product_id) ):

			// loop through the rows of data
			while ( have_rows('skus',$product_id) ) : the_row();

				// display a sub field value
			  //  the_sub_field('sub_field_name');
			$dindsndvalue=get_sub_field('min_sku', $product_id);
			endwhile;else :endif;
			$crncy= get_field('rwd_product_currency', $product_id);
			
			
			//$accnumbr=get_field('AccountNumber',$product_id) 
					$prd_quantity = $item->get_quantity();
					$order_phone = $ding_products[$rp_key]['prdphone'];
					$ro_number = $order_get_id.'-'.$order_itr;
					$ro_mail = $item->get_meta('_tchknwdev_rwdemail');
					$ro_phone =$item->get_meta('_tchknwdev_rwdnumv');
					//$unit =$prd_info_array['minRecipientDenomination'];
					$redmtype =get_field('redemptionmechanism', $product_id);
					
					  //echo $redmtype;
					    if($redmtype == 'Immediate'){
						$dng_numail = $item->get_meta('_tchknwdev_rwdnumv');
					     echo $dng_numail;
					
					}else if ($redmtype == 'ReadReceipt'){
					$dng_numail = "0000000000";
             //echo $dng_numail;die(1);					
												
					}
					// $ro_phone = $dng_numail;
					$denom_evaluates = explode("_",$item->get_meta('_tchknwdev_rwdprice'));
					$ro_denominations = $denom_evaluates[0];
						
					function secure_random_string($length) {
						$random_string = '';
						for($i = 0; $i < $length; $i++) {
							$number = random_int(0, 36);
							$character = base_convert($number, 10, 36);
							$random_string .= $character;
						}
					 
						return $random_string;
					}
					$randomNumber = secure_random_string(5);
					$randomname=secure_random_string(10,17);
					$randvalue =secure_random_string(9,19);
					
					





$curl = curl_init();
 

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://giftcards.reloadly.com/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
        "productId": "'.$prdids_api.'",
        "countryCode": "'.$crncy.'",
        "quantity": "'.$prd_quantity.'",
         "unitPrice": "'.$ro_denominations.'",
         "recipientEmail": "'.$ro_mail.'",
        "recipientPhoneDetails": {
          "countryCode": "IND",
          "phoneNumber": "+91'.$ro_phone.',"
        }
    
       }',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer eyJraWQiOiI5MTYxZDA4Zi05ODhjLTRiYjItYTI5NS03ODc5NmQ2MzJlM2YiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxNzI5MSIsImlzcyI6Imh0dHBzOi8vcmVsb2FkbHkuYXV0aDAuY29tLyIsImh0dHBzOi8vcmVsb2FkbHkuY29tL3NhbmRib3giOmZhbHNlLCJodHRwczovL3JlbG9hZGx5LmNvbS9wcmVwYWlkVXNlcklkIjoiMTcyOTEiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMiLCJhdWQiOiJodHRwczovL2dpZnRjYXJkcy5yZWxvYWRseS5jb20iLCJuYmYiOjE2Njk2MTU2MDIsImF6cCI6IjE3MjkxIiwic2NvcGUiOiJkZXZlbG9wZXIiLCJleHAiOjE2NzQ3OTk2MDIsImh0dHBzOi8vcmVsb2FkbHkuY29tL2p0aSI6IjQ2MTVmYjE4LWVlYzAtNGVhYi1hMTY1LTljYzdhMzcxMTMzMCIsImlhdCI6MTY2OTYxNTYwMiwianRpIjoiYmM0NDhhZDItY2IyZS00MzI2LTk2YzktOWQ0YTdmMDFkYzM3In0.v-1mLzyhK8A3t-zifTjZNJD3ZK83PjRzN1v3eVx9LaA',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;


					
					
		}
		
	}


$order_itr++;
		
		}

    fwrite( $created_reward_order, $log_file_content );
	fclose( $created_reward_order );

	

	
	
}; 

add_action( 'woocommerce_thankyou', 'action_woocommerce_thankyou', 10, 1 );


///End SMS and  Mail For Reloadly
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
	$product_type = get_field('fromproduct_type', $product->id);
	if($product_type == 'XOXO'){ 
		$deliverytype = get_field('delivery_type', $product->id);
		if($deliverytype=='delayed'){ ?>
			<div class="delivery-type">
				<p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field('deliverytime', $product->id) ?> Days of purchasing.</p>
			</div>
		<?php }
	?>
	<div class="custom-price-buttons"> 
		<p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
			<?php 
				$prd_curr = get_field('rwd_product_currency', $product->id);
				if($prd_curr!="AED"): ?>
					The Prices will get converted to <strong>AED</strong> when you Add this product to your cart.
				<?php endif; ?>
		</p>
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
            <p class="rwd-range-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdprice">
        </div>
        <div class="tchknwdev-custom-fields for-rwdemail">
        	<label>Enter email ID of the person you want to gift to:</label>
        	<p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail" required>
        </div>
		<div class="tchknwdev-custom-fields for-rwdnumv">
		<label>Enter mobile number of the person you want to gift to:</label>
        	<p class="rwd-phone-error rwd-error"></p>
            
		<input id="phone" type="tel" name="tchknwdev_rwdnumv">
			
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
if($product_type == 'reloadly'){ 
		$deliverytype = get_field('delivery_type', $product->id);
		if($deliverytype=='delayed'){ ?>
			<div class="delivery-type">
				<p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field('deliverytime', $product->id) ?> Days of purchasing.</p>
			</div>
		<?php }
	?>
	
	<div class="custom-price-buttons"> 
		<p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
			<?php 
				$prd_curr = get_field('rwd_product_currency', $product->id);
				if($prd_curr!="AED"): ?>
					The Prices will get converted to <strong>AED</strong> when you Add this product to your cart.
				<?php endif; ?>
		</p>
		
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
            <p class="rwd-range-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdprice">
        </div>
        <div class="tchknwdev-custom-fields for-rwdemail">
        	<label>Enter email ID of the person you want to gift to:</label>
        	<p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail" required>
        </div>
		<div class="tchknwdev-custom-fields for-rwdnumv">
		<label>Enter mobile number of the person you want to gift to:</label>
        	<p class="rwd-phone-error rwd-error"></p>
            
		<input id="phone" type="tel" name="tchknwdev_rwdnumv">
			
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











	 if($product_type == 'Ding Api'){ 
		$deliverytype = get_field('delivery_type', $product->id);
		if($deliverytype=='delayed'){ ?>
			<div class="delivery-type">
				<p><strong>NOTE: </strong>This is a delayed Product. This Product Will be Delivered after <?php the_field('deliverytime', $product->id) ?> Days of purchasing.</p>
			</div>
		<?php }
	?>
	<div class="custom-price-buttons"> 
		<p>The prices below are in <strong><?php the_field('rwd_product_currency', $product->id) ?></strong>. 
			<?php 
				$prd_curr = get_field('rwd_product_currency', $product->id);
				if($prd_curr!="AED"): ?>
					The Prices will get converted to <strong>AED</strong> when you Add this product to your cart.
				<?php endif; ?>
		</p>
		
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
            <p class="rwd-range-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdprice">
        </div>
		<?php 
		$product_type = get_field('redemptionmechanism');
		//if($product_type == 'ReadReceipt'){  ?>
        <div class="tchknwdev-custom-fields for-rwdemail">
        	<label>Enter email ID of the person you want to gift to:</label>
        	<p class="rwd-email-error rwd-error"></p>
            <input type="text" name="tchknwdev_rwdemail"  required>
        </div>
		<? //}else if($product_type == 'Immediate'){?>
		<div class="tchknwdev-custom-fields for-rwdnumv">
        	<label>Enter mobile number of the person you want to gift to:</label>
        	<p class="rwd-phone-error rwd-error"></p>
			<input id="phone" type="tel" name="tchknwdev_rwdnumv">
		
		</div>
		<? // } ?>
        <div class="tchknwdev-custom-fields for-rwdorgcurrency">
            <input type="hidden" name="tchknwdev_rwdorgcurrency" value="<?php the_field('rwd_product_currency', $product->id) ?>">
        </div>
        <div class="clear"></div>
     
    <?php
    $content = ob_get_contents();
    ob_end_flush();
    return $content;
	 
		
	
}


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
	 if(isset($_REQUEST['tchknwdev_rwdnumv']))
    {
        $cart_item_data['tchknwdev_rwdnumv'] = sanitize_text_field($_REQUEST['tchknwdev_rwdnumv']);
    } 
    if(isset($_REQUEST['tchknwdev_rwdorgcurrency']))
    {
        $cart_item_data['tchknwdev_rwdorgcurrency'] = sanitize_text_field($_REQUEST['tchknwdev_rwdorgcurrency']);
    }

    return $cart_item_data;
}

//Step Custom: Custom Step to update the price
function set_reward_product_price( $cart_object ) {
    // if( !WC()->session->__isset( "reload_checkout" )) {
        /* Gift wrap 
        		*/
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

                $converted_price = convertCurrency($reward_price, $user_currency_code, 'AED');
                // $converted_price = 50;

                $prd_id = $value["product_id"];

                if(get_field('custom_discount', $prd_id)){
                	$discount_amount = get_field('custom_discount', $prd_id);
					$converted_price = $converted_price - ($converted_price * ($discount_amount/100));
				}elseif(get_field('product_discount', $prd_id)){
					$discount_amount = get_field('product_discount', $prd_id);
					$converted_price = $converted_price - ($converted_price * ($discount_amount/100));
				}	
                

                $value['data']->set_price($converted_price);
            }
        }
    // }
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
   // else 
   	if(array_key_exists('tchknwdev_rwdnumv', $cart_item))
    {
        $custom_details = $cart_item['tchknwdev_rwdnumv'];

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
	
	// else 
		if(array_key_exists('tchknwdev_rwdnumv', $values))
    {
        $item->add_meta_data('_tchknwdev_rwdnumv',$values['tchknwdev_rwdnumv']);
    } 
    $item->add_meta_data('_tchknwdev_deliverystatus','error');
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


function convertCurrency($amount,$from_currency,$to_currency){
  $apikey = 'b855209fdc4cc5bee0d6';

  $from_Currency = strtoupper( urlencode( $from_currency ) );
  $to_Currency = strtoupper( urlencode( $to_currency ) );
  $today_date = date('Y-m-d', strtotime("-1 days"));
  $url =  "https://api.currencyapi.com/v3/convert?currencies=".$to_Currency."&apikey=xqxPPQNhCrGgjuK8ILkQl3AaA3ase3Y9VwwGjS4L&base_currency=".$from_Currency."&date=".$today_date."&value=".$amount;
  // echo $url;

  // echo "https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}";
  // die();
  // change to the free URL if you're using the free version
  $json = file_get_contents($url);
  $obj = json_decode($json, true);

  $val = floatval($obj['data']["AED"]["value"]);


  $total = $val;
  // $total = 55;
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

function get_unique_countries( $key = '', $type = 'post', $status = 'publish' ) {

    global $wpdb;

    if( empty( $key ) )
        return;

    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s 
        AND p.post_status = %s 
        AND p.post_type = %s
    ", $key, $status, $type ) );

    return $r;
}

function get_countries($country_code=""){

	 $code = strtoupper($code);

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

	if($country_code){
		$upper_case_cc = strtoupper($country_code);
		if (array_key_exists($upper_case_cc,$countryList)){
			return array("success"=>1,"country"=>$countryList[$upper_case_cc]);
		}else{
			return array("success"=>0);
		}
	}
	
	

	return $countryList;

	 if ($countries_ret = "get_countries") {
		return $countryList;
	}elseif( !$countryList[$code] ) {
	 	return $code;
	 }else{
    	return $countryList[$code];
	 }
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
//option page for Reloadly giftcards API Token

add_action('acf/init', 'my_acf_op_init_gift');
function my_acf_op_init_gift() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

       //  Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Giftcards API Tokens'),
            'menu_title'    => __('Giftcards API Tokens'),
            'menu_slug'     => 'giftcards-api-tokens',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

// end option page for Reloadly giftcards API Token



//Option page for XOXO API TOken
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

// end Option page for XOXO API TOken
function country_filter_dropdown_function() { 
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

	$country_output = '<form action="'.$shop_page_url.'" method="get" id="filters-form">';
  
	$countries = get_countries('rwd_product_country','ASC');

	$countries_array = array();

	// $countries_array[] = get_countries('in');
	// $countries_array[] = get_countries('us');
	// print_r($countries_array);

	$unique_countries = get_unique_countries( 'rwd_product_country', 'product' );
	foreach($unique_countries as $unique_countrie){
		$temp_country = get_countries($unique_countrie);

		if($temp_country["success"]){
			$countries_array[strtoupper($unique_countrie)] = $temp_country["country"];
		}
	}

	

	
	if ( !empty($countries) ) :
	    $country_output.= '<select name="filterc_country" onchange="this.form.submit()">';
	     $country_output.= '<option value="">Select Country</option>';
	    $country_output.= '<option value="">Show All countries</option>';

	    if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']=='global')){
    		$selected_gb = 'selected="selected"';
    	}
		$countries_data = array();
		foreach( $countries_array as $country_key => $country_val ) {
			$countries_data[$country_key] = $country_val;
			
			
            			    	
	    }//print_r($countries_data);
		asort($countries_data);
	    // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
	    foreach( $countries_data as $country_key => $country_val ) {
	    	$selected = "";
	    	if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']==$country_key)){
	    		$selected = 'selected="selected"';
	    	}

            $country_output.= '<option value="'. esc_attr( $country_key ) .'" '.$selected.'>
	                    '. $country_val .'</option>';				    	
	    }
	    $country_output.='</select>';
	    
	endif;

	$country_output.= '</form>';
	return $country_output;

}
// register shortcode
add_shortcode('country_filter_dropdown', 'country_filter_dropdown_function');


//removing billing address fields
add_filter( 'woocommerce_billing_fields', 'remove_checkout_fields', 100 );
function remove_checkout_fields( $fields ) {
	//unset( $fields['billing_company'] );
	unset( $fields['billing_city'] );
	unset( $fields['billing_postcode'] );
	// unset( $fields['billing_country'] );
	unset( $fields['billing_state'] );
	unset( $fields['billing_address_1'] );
	unset( $fields['billing_address_2'] );
	return $fields;
}

add_filter("woocommerce_checkout_fields", "order_fields", 120);
function order_fields($fields) {
    $fields["billing"]["billing_company"]["priority"] = 120;
    return $fields;
}

//to hide spotii when coutnry changed to other than UAE
add_filter( 'woocommerce_available_payment_gateways', 'payment_gateway_disable_country' );  
function payment_gateway_disable_country( $available_gateways ) {
    if ( is_admin() ) return $available_gateways;
    if ( WC()->customer->get_billing_country() <> 'AE' ) {
        unset( $available_gateways['spotii_shop_now_pay_later'] );
        unset( $available_gateways['spotii_pay_now'] );
    } 
    return $available_gateways;
}

//to show custom text below total in checkout page.
add_filter( 'woocommerce_review_order_after_order_total', 'custom_total_message_html', 10, 1 );
function custom_total_message_html( $value ) {
    if( !in_array( WC()->customer->get_shipping_country(), array('AE') ) ) {
        echo '<div class="total-below-checkout-text">' . __('The Payment Gateway will automatically charged you in UAE Dhirams.') . '</div>';
    }
    // return $value;
}


// function that runs when shortcode is called
function get_product_catgs() { 
 	$html = "";
	$args = array(
	     'taxonomy' => 'product_cat',
	     'orderby' => 'name',
	     'order' => 'ASC',
	     'hide_empty' => true
	);

	$categories_array = get_categories( $args );

	$filled_catgs = array();

	foreach( $categories_array as $val_catg ) :
		if( $val_catg->count > 0 )
			$filled_catgs[] = $val_catg;
	endforeach;

	// echo "<pre>";

	$chunks_catgs = array_chunk( $filled_catgs, 8 );
	$html .= "<div class='catalogue-mega-menu'>";
		foreach ( $chunks_catgs as $chunk ) {
		    $html .= "<div class=\"item\">\n";
		    	$html .= "<ul>";
			    	foreach( $chunk as $chunk_sub ) :
			    		if( $chunk_sub->term_id != 354 && $chunk_sub->term_id != 16 ){
			     			$html .= "<li><a href='".site_url( "/shop/?filtering=1&filter_product_cat=".$chunk_sub->term_id )."'>".$chunk_sub->name."</a></li>";
			    		}
					endforeach;
					$html .= "</ul>";
		    $html .= "</div>\n";
		}
	$html .= "</div>";

	return $html;
}
// register shortcode
add_shortcode('product_catgs_megamenu', 'get_product_catgs');

// Add tax for Swiss country
add_action( 'woocommerce_cart_calculate_fees','custom_tax_surcharge_for_swiss', 10, 1 );
function custom_tax_surcharge_for_swiss( $cart ) {
    if ( is_admin() && ! defined('DOING_AJAX') ) return;

    // Only for Swiss country (if not we exit)
    // if ( 'CH' != WC()->customer->get_shipping_country() ) return;

    $percent = 5;
    # $taxes = array_sum( $cart->taxes ); // <=== This is not used in your function
    $round_five_percent = ( ( $cart->cart_contents_total + $cart->shipping_total ) * $percent / 100 )+1;

    // Calculation
    $surcharge = ( $round_five_percent ) * $percent / 100 ;

    // Add the fee (tax third argument disabled: false)
    $cart->add_fee( __( 'Service Fee', 'woocommerce')." ($percent%) + 1 AED", $round_five_percent, false );
    $cart->add_fee( __( '+ VAT', 'woocommerce'), $surcharge, false );
}
function country_gifts_dropdown_mk() { 
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

	$country_output = '<form action="'.$shop_page_url.'" method="get" id="filters-gifts-form" class="filters-gifts-form">';
  
	$countries = get_countries('rwd_product_country');

	$countries_array = array();

	// $countries_array[] = get_countries('in');
	// $countries_array[] = get_countries('us');
	// print_r($countries_array);

	$unique_countries = get_unique_countries( 'rwd_product_country', 'product' );
	foreach($unique_countries as $unique_countrie){
		$temp_country = get_countries($unique_countrie);

		if($temp_country["success"]){
			$countries_array[strtoupper($unique_countrie)] = $temp_country["country"];
		}
	}

	

	
	if ( !empty($countries) ) :
	
	    $country_output.= '<select name="filterc_country"  id="mk_filter" class="cntry_srch_mk">';
	    // $country_output.= '<option value="">Select Country</option>';
	    $country_output.= '<option value="">Show All countries</option>';

	    if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']=='global')){
    		$selected_gb = 'selected="selected"';
    	}
		$countries_data = array();
		foreach( $countries_array as $country_key => $country_val ) {
			$countries_data[$country_key] = $country_val;
			
			
            			    	
	    }//print_r($countries_data);
		asort($countries_data);

	    // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
	    foreach( $countries_data as $country_key => $country_val ) {
	    	$selected = "";
	    	if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']==$country_key)){
	    		$selected = 'selected="selected"';
	    	}

            $country_output.= '<option value="'. esc_attr( $country_key ) .'" '.$selected.'>
	                    '. $country_val .'</option>';				    	
	    }
	    $country_output.='</select>';
	    
	endif;

	$country_output.= '</form>';
	
	return $country_output;

}
// register shortcode
add_shortcode('country_gifts_mk_dropdown', 'country_gifts_dropdown_mk');
function country_giftfilter_dropdown_function() { 
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

	$country_output = '<form action="'.$shop_page_url.'" method="get" id="filters-gifts-form" class="filters-gifts-form">';
  
	$countries = get_countries('rwd_product_country');
	
	$countries_array = array();

	// $countries_array[] = get_countries('in');
	// $countries_array[] = get_countries('us');
	// print_r($countries_array);

	$unique_countries = get_unique_countries( 'rwd_product_country', 'product' );
	foreach($unique_countries as $unique_countrie){
		$temp_country = get_countries($unique_countrie);

		if($temp_country["success"]){
			$countries_array[strtoupper($unique_countrie)] = $temp_country["country"];
		}
	}

	

	
	if ( !empty($countries) ) :
	
	    $country_output.= '<select name="filterc_country" id="filterc_country" class="filterc_country new_mk_country_filter">';
	    // $country_output.= '<option value="">Select Country</option>';
	    $country_output.= '<option value="">Show All countries</option>';

	    if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']=='global')){
    		$selected_gb = 'selected="selected"';
    	}
			//sorting array by Asc order
			$countries_data = array();
		foreach( $countries_array as $country_key => $country_val ) {
			$countries_data[$country_key] = $country_val;
			
			
            			    	
	    }//print_r($countries_data);
		asort($countries_data);
		//print_r($countries_data);
		
		//$sorti_cntries = wp_list_sort($countries_data, 'ASC', true );
	    // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
	    foreach( $countries_data as $country_key => $country_val ) {
			
	    	$selected = "";
	    	if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']==$country_key)){
	    		$selected = 'selected="selected"';
	    	}

            $country_output.= '<option value="'. esc_attr( $country_key ) .'" '.$selected.'>
	                    '. $country_val .'</option>';				    	
	    }
	    $country_output.='</select>';
	    
	endif;

	$country_output.= '</form>';
	
	return $country_output;

}
// register shortcode
add_shortcode('country_giftfilter_dropdown', 'country_giftfilter_dropdown_function');
function country_filter_dd() { 
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
	$country_output = '<form action="'.$shop_page_url.'" method="get" id="filters-form">';
	$countries = get_countries('rwd_product_country');
	$countries_array = array();
	// $countries_array[] = get_countries('in');
	// $countries_array[] = get_countries('us');
	// print_r($countries_array);
	//$unique_countries = get_unique_countries( 'rwd_product_country', 'product' );
	$unique_countries = get_unique_countries( 'rwd_product_country', 'product' );
	foreach($unique_countries as $unique_countrie){
		$temp_country = get_countries($unique_countrie);

		if($temp_country["success"]){
			$countries_array[strtoupper($unique_countrie)] = $temp_country["country"];
		}
	}
	
	if ( !empty($countries) ) :
	 $country_output.= '<select name="filterc_country"  class="cntry_srch_mk" onchange="this.form.submit()">';
	    // $country_output.= '<option value="">Select Country</option>';
	    $country_output.= '<option value="">Change Country</option>';
	    if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']=='global')){
    		$selected_gb = 'selected="selected"';
    	}
		 $countries_data = array();
		foreach( $countries_array as $country_key => $country_val ) {
			$countries_data[$country_key] = $country_val;
			
			
            			    	
	    }//print_r($countries_data);
		asort($countries_data);

		
	    // $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
	    foreach( $countries_data as $country_key => $rs_srt_dta ) {
	    	$selected = "";
	    	if((isset($_GET['filterc_country'])) && ($_GET['filterc_country']==$country_key)){
	    		$selected = 'selected="selected"';
	    	}
            $country_output.= '<option value="'. esc_attr( $country_key ) .'" '.$selected.'>
	                    '. $rs_srt_dta .'</option>';				    	
	    }
	    $country_output.='</select>';
		endif;
	$country_output.= '</form>';
	return $country_output;

}
// register shortcode
add_shortcode('country_dropdown_mk', 'country_filter_dd');





/*** To get country based on input ****/





 /* ++++++ Create a table +++++++*/
 
 
 
 
 
 

function create_admin_table(){
global $wpdb;


$create_cases_table_name = $wpdb->prefix . "mobile_recharges";

$create_cases_table_query = "CREATE TABLE $create_cases_table_name (
	ID mediumint(9) NOT NULL AUTO_INCREMENT,
	user_name text NOT NULL,
	user_email text NOT NULL, 
	friend_email text NOT NULL, 
	plan_name text NOT NULL,	
	plan_sku_code text NOT NULL,  
	plan_amount text NOT NULL,  
	convenience_fee text NOT NULL,  
	total_amount text NOT NULL,  
	mobile_number text NOT NULL,  
	amount_currency text NOT NULL,  
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	status text NOT NULL,
	UNIQUE KEY ID (ID)
) $charset_collate;";

 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $create_cases_table_query );


 }
 add_action('admin_init','create_admin_table');
 
 
 
 
 


function Get_Product_Descriptions(){
	
	
			$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetProductDescriptions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
    'Cookie: visid_incap_1694192=AzZQD89yRL+NsTN+ODkOv3C712IAAAAAQUIPAAAAAACclhmVXgs41FSyW1Uz/ZyV; __cf_bm=vZkhSammK3OkkB7gdBXcebDkniWnhyBPH7baMFsn8kg-1663931914-0-AQ5bKslx7yVDeSvhh4yptDnfjP2Qz4VslSK15gLWZztoVtUU+3eqSQC7PmDdu0D9vr8ART2UOL7t8+OC5cfOcHc='
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
curl_close($curl);
		
return $response;
				 
}

function send_ajax_response($code,$message){
		
		echo json_encode(array('success' => $code, 'message' => $message));	
		wp_die();
}




function get_providers($number,$providerCodes=true){
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetProviders?accountNumber=' . $number . '&providerCodes=' . $providerCodes,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
    'Cookie: visid_incap_1694192=AzZQD89yRL+NsTN+ODkOv3C712IAAAAAQUIPAAAAAACclhmVXgs41FSyW1Uz/ZyV; __cf_bm=EL__l.JlA4bqWUs7CIvX1PYFgk3qd7ndu7C5ecLVUWo-1664261331-0-AdTg0xFeqYMooe5dk1C2tSBlw5ITguH3tG47JicZnzpRtBXXGUoidGmKPNojVqW+tQkohcVg3NP3igWxQJim0c8='
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
curl_close($curl);
return $response;

}

function get_products($mobile_number,$ProviderCode){
	
	$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetProducts?AccountNumber=' . $mobile_number . '&providerCodes=' . $ProviderCode,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		   CURLOPT_HTTPHEADER => array(
			'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
				"Accept: */*",
				"Cache-Control: no-cache",
				"Connection: keep-alive",
				"Content-Type: application/json",
			),
		
		));

		$response = curl_exec($curl);
		$response = json_decode($response);
		curl_close($curl);
		return $response;											
}


/*------------------------Get Recharge Plans----------------------------*/
add_action("wc_ajax_get_recharge_plans", "get_recharge_plans");
add_action("wp_ajax_nopriv_get_recharge_plans", "get_recharge_plans");

function get_recharge_plans() {
  
  
$operator_name = $operator_logo = '';

$Get_Product_Descriptions = Get_Product_Descriptions();
$pro_des_items = $Get_Product_Descriptions->Items;
$pro_des_items_array = json_decode(json_encode($pro_des_items), true);
	
  
  if(!empty($_POST['search_input'])){
		$mobile_number   = $_POST['search_input'];
		$ProviderCode   = $_POST['ProviderCode'];
		$mobile_number = str_replace("+","",$mobile_number);
		
	if(empty($ProviderCode)){
			$get_mobile_number_plan = get_products($mobile_number,'');
/* 	echo 'before';		
	print_r($get_mobile_number_plan);
	echo 'after'; */			
		 	if($get_mobile_number_plan->ResultCode == 1){
				$Items = $get_mobile_number_plan->Items;
				$Items_array = json_decode(json_encode($Items), true);
				if(!empty($Items_array)){
					$operators_array = array();
				foreach($Items_array as $key=>$print){
					if($print['RedemptionMechanism']=='Immediate'){ 
					$operators_array[] = $print['ProviderCode'];
					 }
				}
					$operators_array = array_unique($operators_array);
					$ProviderCode = current($operators_array);
				}
			} 
	
		}	 
		

		$response = get_products($mobile_number,$ProviderCode);


		/* print_r($response); */

		$immediate_providers = array();
		$all_Benefits_array = array();
		if($response->ResultCode == 1){
			$Items = $response->Items;
			$Items_array = json_decode(json_encode($Items), true);
			
			/*  if(!empty($Items_array) && count($Items_array) <= 1){
				 $Benefits_array = $Items_array[0]['Benefits']; 
			 	if(in_array("Mobile", $Benefits_array) || in_array("Data", $Benefits_array) || in_array("Minutes", $Benefits_array)){
						  
						  
					  }
					  else{
							$code =400;
							$message = "We do not recognise the number.";
							send_ajax_response($code,$message);	
					  } 
			} */
				 
				
			if(!empty($Items_array)){
				
			foreach($Items_array as $key=>$print){
 				/* if($print['RedemptionMechanism']=='Immediate'){   */
				
				//echo $print['ProviderCode'];
				$Benefits_array = $print['Benefits']; 
				$all_Benefits_array = array_merge($all_Benefits_array,$Benefits_array);
				if(!empty($print['SkuCode'])){
					//echo $print['SkuCode'];
					//echo '<br>';
					//echo $print['SkuCode'];
					
				
				if(!empty($pro_des_items_array)){
					foreach($pro_des_items_array as $index=>$result){
						if($result['LocalizationKey']==$print['SkuCode']){
							$Items_array[$key]['product_description'] = $result;	
						}
					}
									
				}
				else{
					$code =400;
					$message = "We do not recognise the number.";
					send_ajax_response($code,$message);	
						
				}
				} 
				
					$immediate_providers[] = $print; 
				  /*  }  */ 
				
				}
			
			
					$all_Benefits_array = array_unique($all_Benefits_array);
					
					
				$get_providers = get_providers($mobile_number,'');
				$get_providers_array = json_decode(json_encode($get_providers), true);
			
				$get_providers_by_code = get_providers($mobile_number,$ProviderCode);
				$get_providers_by_code_array = json_decode(json_encode($get_providers_by_code), true);

				//print_r($get_providers_array);
				if($get_providers_by_code_array['ResultCode'] == 1){
					$provider_Items = $get_providers_by_code_array['Items'];
					$provider_Items_end_array = current($get_providers_by_code_array['Items']);
						$operator_name = $provider_Items_end_array['Name'];
						$operator_logo = $provider_Items_end_array['LogoUrl'];
						if(empty($ProviderCode)){
						$ProviderCode = $provider_Items_end_array['ProviderCode'];
						}
				}
				
		
					/* print_r($Items_array);
					die(); */
	/* 			if(in_array("Mobile", $all_Benefits_array) || in_array("Data", $all_Benefits_array) || in_array("Minutes", $all_Benefits_array)){ */
				if(in_array("Data", $all_Benefits_array) || in_array("Minutes", $all_Benefits_array)){
						  
						  
					  }
					  else{
							$code =400;
							$message = "We do not recognise the number";
							send_ajax_response($code,$message);	
					  } 
					  
			}
			else{
				$code =400;
				$message = "We do not recognise the number.";
				send_ajax_response($code,$message);			
			}
		}
		

		//echo '<pre>';
		//print_r($Items_array);

ob_start();
get_template_part('template-parts/search-mobile-plans/search-mobile-plans', null, ['immediate_providers' => $immediate_providers,'all_Benefits_array' => $all_Benefits_array,'response' => $Items_array]);
$search_result = ob_get_contents();
ob_end_clean();  


ob_start();
get_template_part('template-parts/search-mobile-plans/mobile-operators', null, ['get_providers_array' => $get_providers_array]);
$operators_data = ob_get_contents();
ob_end_clean();  

$total_operators = 0;
if($get_providers_array['ResultCode'] == 1){
		$total_operators = count($get_providers_array['Items']);
}


//print_r($get_providers_array);
echo json_encode(array('success' => 200, 'search_result' => $search_result, 'operators_data' => $operators_data, 'operator_name' => $operator_name, 'operator_logo' => $operator_logo,'total_operators' => $total_operators));	
    wp_die();
	
	
	
  }
   }

 function send_transfer_recharge($number,$SkuCode,$send_value){
	
	$curl = curl_init();
$random = rand(10,100000);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/SendTransfer',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_POSTFIELDS =>'{
    "SkuCode": "'. $SkuCode .'",
    "SendValue": '. $send_value .',
    "SendCurrencyIso": "AED",
    "AccountNumber":'. $number .',
    "DistributorRef":'. $random .',
    "Settings": [
        {
            "Name": "pqvaydbmab",
            "Value": "kjzzv0qh3"
        }
    ],
    "ValidateOnly": false,
    "BillRef": "string"
}',
  CURLOPT_HTTPHEADER => array(
    'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
    'Content-Type: application/json',
    'Cookie: visid_incap_1694192=AzZQD89yRL+NsTN+ODkOv3C712IAAAAAQUIPAAAAAACclhmVXgs41FSyW1Uz/ZyV; __cf_bm=XvpOXO40v8dbA9O7sQdd6_QU6Lsvbz0vBlP7QSlvMoA-1664184884-0-AZbqRXVUF81rj1P6HMeayOcxbuEM9XEfHbgnVOx4HpaWOmxEuUkXxOoidgwUwYlAUB2+YuBLTMWWs2qc7EJYcqg='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;


}


function get_mobile_number_plan($mobile_number=true,$skuCodes){
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetProducts?AccountNumber=' . $mobile_number . '&skuCodes=' . $skuCodes,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		   CURLOPT_HTTPHEADER => array(
			'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
				"Accept: */*",
				"Cache-Control: no-cache",
				"Connection: keep-alive",
				"Content-Type: application/json",
			),
		
		));

		$response = curl_exec($curl);
		$response = json_decode($response);
		curl_close($curl);
	return $response;
		
}
		

/*------------------------stripe_payment----------------------------*/
add_action("wc_ajax_get_payment_breakup", "get_payment_breakup");
add_action("wp_ajax_nopriv_get_payment_breakup", "get_payment_breakup");

function get_payment_breakup() {
  
$message = '';

  if(!empty($_POST['skuCodes'])){
		$mobile_number   = $_POST['mobile_number'];
		$skuCodes   = $_POST['skuCodes'];
		$mobile_number = str_replace("+","",$mobile_number);

			$response = get_mobile_number_plan($mobile_number,$skuCodes);
			$immediate_providers = array();
		
		
			if($response->ResultCode == 1){
			$Items = $response->Items;
			$Items_array = json_decode(json_encode($Items), true);
			if(!empty($Items_array)){
				
			$max_ReceiveValue = $Items_array[0]['Maximum']['ReceiveValue'];
			$max_SendValue = $Items_array[0]['Maximum']['SendValue'];
			$SkuCode = $Items_array[0]['SkuCode'];
			
			ob_start();
			get_template_part('template-parts/search-mobile-plans/payment-breakup', null, ['Items_array' => $Items_array]);
			$search_result = ob_get_contents();
			ob_end_clean();  
			echo json_encode(array('success' => 200, 'search_result' => $search_result));	
			wp_die();
	


			}
		}

/* echo json_encode(array('success' => $success, 'message' => $message));	
    wp_die();
	exit; */
	
	
  }
 
}

		

/*------------------------stripe_payment----------------------------*/
add_action("wc_ajax_stripe_payment", "stripe_payment");
add_action("wp_ajax_nopriv_stripe_payment", "stripe_payment");

function stripe_payment() {
  
$message = '';
$Get_Product_Descriptions = Get_Product_Descriptions();
$pro_des_items = $Get_Product_Descriptions->Items;
$pro_des_items_array = json_decode(json_encode($pro_des_items), true);
	
  
  if(!empty($_POST['search_input'])){
		$mobile_number   = $_POST['search_input'];
		$skuCodes   = $_POST['skuCodes'];
		$mobile_number = str_replace("+","",$mobile_number);

			$response = get_mobile_number_plan($mobile_number,$skuCodes);
			$immediate_providers = array();
		
		
			if($response->ResultCode == 1){
			$Items = $response->Items;
			$Items_array = json_decode(json_encode($Items), true);
			if(!empty($Items_array)){			
			
			
			$max_ReceiveValue = $Items_array[0]['Maximum']['ReceiveValue'];
			$ReceiveCurrencyIso = $Items_array[0]['Maximum']['ReceiveCurrencyIso'];
			$max_SendValue = $Items_array[0]['Maximum']['SendValue'];
			$DefaultDisplayText = $Items_array[0]['DefaultDisplayText'];
			$SkuCode = $Items_array[0]['SkuCode'];
			$convenience_fee = $max_ReceiveValue * 5 / 100;
			$total_amount = $convenience_fee + $max_ReceiveValue;
			
			global $wpdb;
			 $mobile_recharges_table = $wpdb->prefix . "mobile_recharges";
			
			if (isset($_POST['stripeToken']) && !empty($_POST['stripeToken'])) {
  
				try { 
					$token = $_POST['stripeToken'];
					$user_name = $_POST['user_name'];
					$user_email = $_POST['user_email'];
					$friend_email = $_POST['friend_email'];
					
/* =============================secret key============================= */
 		 	       $stripe = new \Stripe\StripeClient('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');     
			       /* $stripe = new \Stripe\StripeClient('sk_test_8iav9xnoELyw6c62CV6En1pl');   */    

					$customer = $stripe->customers->create([
						//'email' => 'email@example.com',
						"source" => $token
					]); 

					if(!empty($customer->id)){
												
						$response = $stripe->charges->create([
							'amount' => (int) $total_amount * 100,
							'currency' => $ReceiveCurrencyIso,
							'metadata' => [
									'meta' => 'value',
								  ],
							'description' => 'description',
							'customer' => $customer->id,
							'capture' => false,
						]);


					   if ($response->status == 'succeeded') {

							//echo "Payment is successful. Your payment id is: ". $response->id;
							//echo $mobile_number . ' = '. $SkuCode . ' = '. $max_SendValue;
							
							$recharge_result = send_transfer_recharge($mobile_number,$SkuCode,$max_SendValue);
							$recharge_result = json_decode($recharge_result);
							
							
							$mobile_recharges_data = array(
								'user_name' => $user_name,
								'user_email' => $user_email,
								'friend_email' => $friend_email,
								'mobile_number' => $mobile_number,
								'plan_name' => $DefaultDisplayText,
								'plan_sku_code' => $SkuCode,
								'plan_amount' => $max_ReceiveValue,
								'convenience_fee' => $convenience_fee,
								'total_amount' => $total_amount,
								'amount_currency' => $ReceiveCurrencyIso
								); 
								
								
							/* print_r($recharge_result);
							die('here'); */
								
							if($recharge_result->ResultCode == 1){
								$success = 200;
								$message = 'Rechage has been done.';
								
						 		$TransferRecord  = $recharge_result->TransferRecord;
								$TransferRecord = json_decode(json_encode($TransferRecord), true);
								
								
								
								if($TransferRecord['ProcessingState'] == 'Complete'){
								//user posted variables
								$stripe_charge = $stripe->charges->capture($response->id, []);
								$stripe_charge_array = json_decode(json_encode($stripe_charge), true);
								if($stripe_charge_array['status']=='succeeded'){
									$mobile_recharges_data['status'] = $TransferRecord['ProcessingState'];
								}
								
							
								$to = $user_email;
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
							/* 	 $admin_to = 'testdeviser@gmail.com';   */  
								$admin_from = 'technodeviser01@gmail.com';
								
								$admin_subject = "Mobile Recharge";
								/* $admin_headers = 'From: '. $admin_from . "\r\n" .
								'Reply-To: ' . $admin_from . "\r\n"; */
								
								$admin_headers = 'From: E-gifty <'. $admin_from . ">\r\n" .
								'Reply-To: ' . $admin_to . "\r\n";
								
   
   
								/* $admin_headers = array('Content-Type: text/html; charset=UTF-8'); */
								$sent_to_admin_admin = wp_mail($admin_to, $admin_subject, $admin_receipt, $admin_headers);


								if(!empty($friend_email)){
								ob_start();
								get_template_part('template-parts/search-mobile-plans/email/friend-recharge-receipt', null, ['mobile_recharges_data' => $mobile_recharges_data]);
								$friend_receipt = ob_get_contents();
								ob_end_clean();  
								
								$friend_email_to = $friend_email;
								//Here put your Validation and send mail
								//$sent = wp_mail($to, $subject, strip_tags($message), $headers);
								$friend_sent = wp_mail($friend_email_to, $subject, $friend_receipt, $headers);
								}						

							}
	  

							}
							else{
								
								$recharge_result->ResultCode;
								$ErrorCodes  = $recharge_result->ErrorCodes;
								$ErrorCodes = json_decode(json_encode($ErrorCodes), true);
								$message = $ErrorCodes[0]['Code'];
								$success = 400;
								//$message = 'Recharge error';
								$mobile_recharges_data['status'] = 'failed';
							}

							$wpdb->insert($mobile_recharges_table, $mobile_recharges_data); 
							
						} else {
							// payment failed: display message to customer
							$success = 400;
							$message = 'Payment error';
							
						}  
					}
					}
					catch(Exception $e) {
						$success = 400;
						$message = $e->getMessage();
					} 
				}



			}
		}

echo json_encode(array('success' => $success, 'message' => $message));	
    wp_die();
	exit;
	
	
  }
 
}


add_menu_page( 'Topup Orders', 'Topup Orders', 'manage_options', 'Topup-orders', 'buffercode_plugin','dashicons-editor-ul',90);

//add_submenu_page('menu-plugin-settings', 'BufferCode Submenu', 'Submenu-1', 'manage_options', 'submenu-1', 'submenu_1_page');

function buffercode_plugin()
{
	//echo 'working';
    include_once 'template-parts/search-mobile-plans/admin/topup-list.php';
}


function wpse27856_set_content_type(){
    return "text/html";
	
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );



//get gift -card products






//twilio SMS code for Ding products

function smsTwilio($phoneNumber, $pin)
{
$account_sid = 'AC1db54b003e50ab389a09d2fd81d47b6b';
$auth_token = '2fbaf28c53b205e03a9471fb612829ca';


$twilio_number = "+18317132608";

$client = new Twilio\Rest\Client($account_sid, $auth_token);
$response = $client->messages->create(
   
   '+91'.$phoneNumber,
    array(
      'from' => $twilio_number,
      'body' => "Your voucher Code : ".$pin
  )
);
echo $client;   
return $response;
}








// <input type="tel" class="form-control" required name="phone" id="phone" value="" placeholder="Phone Number" />
// <input type="hidden" id="country" name="country"/>
// <input type="hidden" name="country_code" id="country_code" />



//function sip_alphabetical_shop_ordering( $sort_args ) {
//$orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
//if ( 'alphabetical' == $orderby_value ) {
//$sort_args['orderby'] = 'title';
//$sort_args['order'] = 'desc';
//$sort_args['meta_key'] = '';
//}
//return $sort_args;
//}
//add_filter( 'woocommerce_get_catalog_ordering_args', 'sip_alphabetical_shop_ordering' );



// custom category wise filter products.
function search_category(){
//	$args = array('hide_empty'=> 0,
 // 'taxonomy'=> 'product_tag',
// );

//wp_dropdown_categories($args,'show_option_none=Select product category');
	echo do_shortcode('[aws_search_form]');
}
add_action( 'woocommerce_before_shop_loop','search_category' );
 
 
 
 ////Sku on single product page
 add_action( 'woocommerce_single_product_summary', 'dev_designs_show_sku', 5 );
function dev_designs_show_sku(){
    global $product;
    echo 'SKU: ' . $product->get_sku();
}