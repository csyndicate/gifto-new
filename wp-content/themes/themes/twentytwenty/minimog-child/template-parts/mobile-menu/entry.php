<div id="page-mobile-main-menu" class="page-mobile-main-menu">
	<div class="inner">
		<div id="page-close-mobile-menu" class="page-close-mobile-menu">
			<span class="fal fa-times"></span>
		</div>
		<div class="page-mobile-menu-content scroll-y">
			<?php Minimog::menu_mobile_primary(); ?>

			<div class="mobile-menu-components">
				<?php
				$login_enable = Minimog::setting( 'mobile_menu_login_enable' );

				if ( '1' === $login_enable ) {
					minimog_load_template( 'mobile-menu/components/user-buttons' );
				}
				?>

				<?php
				$wishlist_enable = Minimog::setting( 'mobile_menu_wishlist_enable' );

				if ( '1' === $wishlist_enable ) {
					minimog_load_template( 'mobile-menu/components/wishlist-button' );
				}
				?>

				<?php
				$info_list_enable = Minimog::setting( 'mobile_menu_info_list_enable' );
				$info_list        = Minimog_Helper::parse_redux_repeater_field_values( Minimog::setting( 'info_list' ) );

				if ( '1' === $info_list_enable && ! empty( $info_list ) ) {
					minimog_load_template( 'mobile-menu/components/info-list', null, $args = [ 'info_list' => $info_list ] );
				}
				?>

				<?php
				$social_enable = Minimog::setting( 'mobile_menu_social_networks_enable' );

				if ( '1' === $social_enable ) {
					minimog_load_template( 'mobile-menu/components/social-network' );
				}
				?>
			</div>
		</div>
	</div>
</div>
