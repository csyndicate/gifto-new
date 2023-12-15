<?php
include_once 'wpc-checker.php';

! defined( 'WOOSC_KEY' ) && define( 'WOOSC_KEY', 'h5O5w7m0' );

if ( ! function_exists( 'woosc_update_checker' ) ) {
	add_action( 'init', 'woosc_update_checker', 99 );
	function woosc_update_checker() {
		if ( defined( 'WOOSC_KEY' ) && wpc_allow_update( WOOSC_KEY ) ) {
			PucFactory::buildUpdateChecker( 'https://api.wpclever.net/update/' . WOOSC_KEY . '.json', WOOSC_FILE, 'woo-smart-compare-premium' );
		}
	}
}

if ( ! function_exists( 'wpc_allow_update' ) ) {
	function wpc_allow_update( $key = '' ) {
		if ( apply_filters( 'wpc_check_update', true ) && ! empty( $key ) ) {
			$plugins = (array) get_option( 'wpc_update_plugins', array() );

			return in_array( $key, $plugins );
		}

		return false;
	}
}

if ( ! class_exists( 'WPCleverPremium' ) ) {
	class WPCleverPremium {
		function __construct() {
			add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
			add_action( 'admin_menu', [ $this, 'admin_menu' ] );
			add_action( 'wp_ajax_wpc_check_update_key', [ $this, 'check_update_key' ] );
		}

		function admin_enqueue_scripts() {
			wp_enqueue_style( 'wpc-premium', WOOSC_URI . 'assets/css/premium.css' );
			wp_enqueue_script( 'wpc-premium', WOOSC_URI . 'assets/js/premium.js', array( 'jquery', ), null, true );
		}

		function admin_menu() {
			add_submenu_page( 'wpclever', 'WPC License Keys', 'License Keys', 'manage_options', 'wpclever-keys', array(
				$this,
				'update_keys_content'
			) );
		}

		function update_keys_content() {
			?>
            <div class="wpclever_page wpclever_update_keys_page wrap">
                <h1>WPClever | License Keys</h1>
                <div class="card">
                    <h2 class="title">Enter Your License Keys</h2>
                    <p>
                        <strong>Enter your License Key to verify the license you’re using and turn on the update
                            notification.
                            Verified licenses can enjoy unlimited update release and get the latest plugin update
                            directly
                            on our website.</strong>
                    </p>
                    <p>
                        Please check the purchase receipt to find your Receipt ID (old-type invoice) or License Key
                        (new-type invoice) to verify your license(s). You can also access the <a
                                href="https://wpclever.net/my-account/" target="_blank">Membership page</a> to get the
                        license key and enter it below for the verification of each purchase attached to your account.
                    </p>
                    <div class="wpclever_update_keys_form">
                        <input type="text" name="wpc_update_key" id="wpc_update_key" class="regular-text"
                               placeholder="Receipt ID or License Key"/> <input type="button" value="Add"
                                                                                id="wpc_add_update_key"/>
                    </div>
                </div>
                <div class="card wpclever_plugins">
                    <h2 class="title">Verified Keys</h2>
					<?php
					$keys = (array) get_option( 'wpc_update_keys', array() );

					if ( ! empty( $keys ) ) {
						?>
                        <table class="wpc_update_keys">
                            <thead>
                            <tr>
                                <th>Key</th>
                                <th>Allowed plugins</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							foreach ( $keys as $key => $val ) {
								echo '<tr>';
								echo '<td>' . substr( $key, 0, 10 ) . '...' . substr( $key, strlen( $key ) - 4, 4 ) . '</td>';
								echo '<td>';
								echo '<ul>';

								foreach ( $val['plugins'] as $plugin ) {
									echo '<li>' . $plugin->name . '</li>';
								}

								echo '</ul>';
								echo '</td>';
								echo '</tr>';
							}
							?>
                            </tbody>
                        </table>
					<?php } else {
						echo 'Have no keys was verified. Please add your first one!';
					} ?>
                </div>
            </div>
			<?php
		}

		function check_update_key() {
			if ( isset( $_POST['key'] ) && ! empty( $_POST['key'] ) ) {
				$key = sanitize_text_field( $_POST['key'] );

				if ( $data = @file_get_contents( 'https://wpclever.net/wp-json/update/v2/key/' . $key ) ) {
					$result = json_decode( $data );

					if ( property_exists( $result, 'id' ) && $result->id && property_exists( $result, 'plugins' ) ) {
						// add keys
						$keys         = (array) get_option( 'wpc_update_keys', array() );
						$keys[ $key ] = array( 'id' => $result->id, 'plugins' => $result->plugins );

						update_option( 'wpc_update_keys', $keys );
					}

					$plugins = (array) get_option( 'wpc_update_plugins', array() );

					foreach ( $result->plugins as $plugin ) {
						array_unshift( $plugins, $plugin->key );
					}

					update_option( 'wpc_update_plugins', array_unique( $plugins ) );

					wp_send_json( $data );
				}
			}

			wp_die();
		}
	}

	new WPCleverPremium();
}