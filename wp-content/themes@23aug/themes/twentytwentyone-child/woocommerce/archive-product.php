	<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */

	?>	
	<div class="shop-filters-main">
		<div class="shop-page-filters">
			<?php
				// get current url with query string.
				$current_url =  home_url( $wp->request ); 

				// get the position where '/page.. ' text start.
				$pos = strpos($current_url , '/page');

				// remove string from the specific postion
				$finalurl = substr($current_url,0,$pos);
			?>
			<form action="<?php echo $finalurl; ?>" method="get" id="filters-form">
				<?php
					$prod_cats = get_terms( array(
					    'taxonomy' => 'product_cat',
					    'hide_empty' => true,
					) );
					
					if ( !empty($prod_cats) ) :
					    $cats_output = '<select name="category_filter" onchange="this.form.submit()">';
					    $cats_output.= '<option value="">Select Catgory</option>';
					    foreach( $prod_cats as $category ) {
					    	$selected = "";
					    	if((isset($_GET['category_filter'])) && ($_GET['category_filter']==$category->slug)){
					    		$selected = 'selected="selected"';
					    	}

					        if( $category->parent == 0 ) {
					            $cats_output.= '<option value="'. esc_attr( $category->slug ) .'" '.$selected.'>
					                    '. esc_html( $category->name ) .'</option>';
					        }
					    }
					    $cats_output.='</select>';
					    echo $cats_output;
					endif;

					// $countries = _get_all_meta_values('rwd_product_country');
					$countries = get_countries('rwd_product_country');
					if ( !empty($countries) ) :
					    $country_output = '<select name="country_filter" onchange="this.form.submit()">';
					    // $country_output.= '<option value="">Select Country</option>';
					    $country_output.= '<option value="all_cnt">Show All countries</option>';

					    if((isset($_GET['country_filter'])) && ($_GET['country_filter']=='global')){
				    		$selected_gb = 'selected="selected"';
				    	}

					    $country_output.= '<option value="global" '.$selected_gb.'>Global</option>';
					    foreach( $countries as $country_key => $country_val ) {
					    	$selected = "";
					    	if((isset($_GET['country_filter'])) && ($_GET['country_filter']==$country_key)){
					    		$selected = 'selected="selected"';
					    	}

				            $country_output.= '<option value="'. esc_attr( $country_key ) .'" '.$selected.'>
					                    '. $country_val .'</option>';				    	
					    }
					    $country_output.='</select>';
					    echo $country_output;
					endif;
				?>
				<input type="reset" value="Reset">
			</form>
			<script>
				jQuery("input[type='reset']").click(function( e ){
					e.preventDefault();
					window.location.href = window.location.href.split('?')[0];
				});
				jQuery(document).ready(function(){
					jQuery(".shop-page-filters").prepend(jQuery(".woocommerce-notices-wrapper")[0].outerHTML);
					jQuery(".shop-page-filters").prepend(jQuery(".woocommerce-result-count")[0].outerHTML);
				});
			</script>
		</div>
		<?php do_action( 'woocommerce_before_shop_loop' ); ?>
	</div>
	<?php
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	?>
	<div class="shop-custom-search">		
		<!-- <form role="search" method="get" action="https://clientsarena.com/tremendous/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
			<div class="wp-block-search__inside-wrapper">
				<input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="" required="">
				<button type="submit" class="wp-block-search__button ">Search</button>
			</div>
		</form> -->
	</div>
	<div class="shop-page-filters">
		<?php
			// get current url with query string.
			$current_url =  home_url( $wp->request ); 

			// get the position where '/page.. ' text start.
			$pos = strpos($current_url , '/page');

			// remove string from the specific postion
			$finalurl = substr($current_url,0,$pos);
		?>
		<form action="<?php echo $finalurl; ?>" method="get" id="filters-form">
			<?php
				// $prod_cats = get_categories('product_cat');
				// $prod_cats = get_terms( array(
				//     'taxonomy' => 'product_cat',
				//     'hide_empty' => true,
				// ) );
				
				// if ( !empty($prod_cats) ) :
				//     $cats_output = '<select name="category_filter" onchange="this.form.submit()">';
				//     $cats_output.= '<option value="">Select Catgory</option>';
				//     foreach( $prod_cats as $category ) {
				//     	$selected = "";
				//     	if((isset($_GET['category_filter'])) && ($_GET['category_filter']==$category->slug)){
				//     		$selected = 'selected="selected"';
				//     	}

				//         if( $category->parent == 0 ) {
				//             $cats_output.= '<option value="'. esc_attr( $category->slug ) .'" '.$selected.'>
				//                     '. esc_html( $category->name ) .'</option>';
				//         }
				//     }
				//     $cats_output.='</select>';
				//     echo $cats_output;
				// endif;

				// $countries = _get_all_meta_values('rwd_product_country');
				$countries = get_countries();

				if ( !empty($countries) ) :
				    $country_output = '<select name="country_filter" onchange="this.form.submit()">';
				    // $country_output.= '<option value="">Select Country</option>';
				    $country_output.= '<option value="all_cnt">Show All countries</option>';
				    $country_output.= '<option value="global">Global</option>';
				    foreach( $countries as $country_key => $country_val ) {
				    	$selected = "";
				    	if((isset($_GET['country_filter'])) && ($_GET['country_filter']==$country_key)){
				    		$selected = 'selected="selected"';
				    	}

			            $country_output.= '<option value="'. esc_attr( $country_key ) .'" '.$selected.'>
				                    '. $country_val .'</option>';				    	
				    }
				    $country_output.='</select>';
				    echo $country_output;
				endif;
			?>
			<input type="reset" value="Reset">
		</form>
		<script>
			jQuery("input[type='reset']").click(function( e ){
				e.preventDefault();
				window.location.href = window.location.href.split('?')[0];
			});
		</script>
	</div>
	<?php do_action( 'woocommerce_before_shop_loop' ); ?>
	<?php

	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
