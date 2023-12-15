<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section
 *
 * @link     https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package  Minimog
 * @since    1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php html_class(); ?>>
<head>
	<?php Minimog_THA::instance()->head_top(); ?>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset', 'display' ) ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url', 'display' ) ); ?>">
	<?php endif; ?>
	<?php Minimog_THA::instance()->head_bottom(); ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <!--<style media="screen">
    .iti--allow-dropdown input, .iti--allow-dropdown input[type=text], .iti--allow-dropdown input[type=tel], .iti--separate-dial-code input, .iti--separate-dial-code input[type=text], .iti--separate-dial-code input[type=tel] {
        padding-right: 40px !important;
    }
  </style>-->

</head>

<body <?php body_class(); ?> <?php Minimog::body_attributes(); ?>>

<?php wp_body_open(); ?>

<?php Minimog_Templates::pre_loader(); ?>

<div id="page" class="site">
	<div class="content-wrapper">
		<?php Minimog_Templates::slider( 'above' ); ?>
		<?php Minimog_Top_Bar::instance()->render(); ?>

		<?php minimog_load_template( 'header/entry' ); ?>

		<?php Minimog_Templates::slider( 'below' ); ?>
		<?php Minimog_Title_Bar::instance()->render(); ?>
		  
		
		<!-----country code---->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">