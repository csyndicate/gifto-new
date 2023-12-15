<?php
/*
Plugin Name: WPC Product Tabs for WooCommerce (Premium)
Plugin URI: https://wpclever.net/
Description: Product tabs manager for WooCommerce.
Version: 1.6.1
Author: WPClever
Author URI: https://wpclever.net
Text Domain: wpc-product-tabs
Domain Path: /languages/
Requires at least: 4.0
Tested up to: 5.9
WC requires at least: 3.0
WC tested up to: 6.5
*/

defined( 'ABSPATH' ) || exit;

! defined( 'WOOST_VERSION' ) && define( 'WOOST_VERSION', '1.6.1' );
! defined( 'WOOST_FILE' ) && define( 'WOOST_FILE', __FILE__ );
! defined( 'WOOST_URI' ) && define( 'WOOST_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WOOST_DIR' ) && define( 'WOOST_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'WOOST_SUPPORT' ) && define( 'WOOST_SUPPORT', 'https://wpclever.net/support?utm_source=support&utm_medium=woost&utm_campaign=wporg' );
! defined( 'WOOST_REVIEWS' ) && define( 'WOOST_REVIEWS', 'https://wordpress.org/support/plugin/wpc-product-tabs/reviews/?filter=5' );
! defined( 'WOOST_CHANGELOG' ) && define( 'WOOST_CHANGELOG', 'https://wordpress.org/plugins/wpc-product-tabs/#developers' );
! defined( 'WOOST_DISCUSSION' ) && define( 'WOOST_DISCUSSION', 'https://wordpress.org/support/plugin/wpc-product-tabs' );
! defined( 'WPC_URI' ) && define( 'WPC_URI', WOOST_URI );

include 'includes/wpc-dashboard.php';
include 'includes/wpc-menu.php';
include 'includes/wpc-kit.php';
include 'includes/wpc-premium.php';

if ( ! function_exists( 'woost_init' ) ) {
	add_action( 'plugins_loaded', 'woost_init', 11 );

	function woost_init() {
		// load text-domain
		load_plugin_textdomain( 'wpc-product-tabs', false, basename( __DIR__ ) . '/languages/' );

		if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0', '>=' ) ) {
			add_action( 'admin_notices', 'woost_notice_wc' );

			return;
		}

		if ( ! class_exists( 'WPCleverWoost' ) && class_exists( 'WC_Product' ) ) {
			class WPCleverWoost {
				function __construct() {
					// enqueue
					add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

					// settings page
					add_action( 'admin_menu', array( $this, 'admin_menu' ) );

					// settings link
					add_filter( 'plugin_action_links', array( $this, 'action_links' ), 10, 2 );
					add_filter( 'plugin_row_meta', array( $this, 'row_meta' ), 10, 2 );

					// add tab
					add_filter( 'woocommerce_product_tabs', array( $this, 'product_tabs' ) );

					// ajax
					add_action( 'wp_ajax_woost_add_tab', array( $this, 'add_tab' ) );

					// product data
					add_filter( 'woocommerce_product_data_tabs', array( $this, 'product_data_tabs' ), 10, 1 );
					add_action( 'woocommerce_product_data_panels', array( $this, 'product_data_panels' ) );
					add_action( 'woocommerce_process_product_meta', array( $this, 'process_product_meta' ) );
				}

				function admin_enqueue_scripts() {
					wp_enqueue_style( 'woost-backend', WOOST_URI . 'assets/css/backend.css', array(), WOOST_VERSION );
					wp_enqueue_script( 'woost-backend', WOOST_URI . 'assets/js/backend.js', array(
						'jquery',
						'jquery-ui-sortable'
					), WOOST_VERSION, true );
				}

				function action_links( $links, $file ) {
					static $plugin;

					if ( ! isset( $plugin ) ) {
						$plugin = plugin_basename( __FILE__ );
					}

					if ( $plugin === $file ) {
						$global = '<a href="' . admin_url( 'admin.php?page=wpclever-woost&tab=global' ) . '">' . esc_html__( 'Global Tabs', 'wpc-product-tabs' ) . '</a>';
						//$links['wpc-premium']       = '<a href="' . admin_url( 'admin.php?page=wpclever-woost&tab=premium' ) . '">' . esc_html__( 'Premium Version', 'wpc-product-tabs' ) . '</a>';
						array_unshift( $links, $global );
					}

					return (array) $links;
				}

				function row_meta( $links, $file ) {
					static $plugin;

					if ( ! isset( $plugin ) ) {
						$plugin = plugin_basename( __FILE__ );
					}

					if ( $plugin === $file ) {
						$row_meta = array(
							'support' => '<a href="' . esc_url( WOOST_DISCUSSION ) . '" target="_blank">' . esc_html__( 'Community support', 'wpc-product-tabs' ) . '</a>',
						);

						return array_merge( $links, $row_meta );
					}

					return (array) $links;
				}

				function admin_menu() {
					add_submenu_page( 'wpclever', esc_html__( 'WPC Product Tabs', 'wpc-product-tabs' ), esc_html__( 'Product Tabs', 'wpc-product-tabs' ), 'manage_options', 'wpclever-woost', array(
						$this,
						'admin_menu_content'
					) );
				}

				function admin_menu_content() {
					$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'global';
					?>
                    <div class="wpclever_settings_page wrap">
                        <h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'WPC Product Tabs', 'wpc-product-tabs' ) . ' ' . WOOST_VERSION; ?></h1>
                        <div class="wpclever_settings_page_desc about-text">
                            <p>
								<?php printf( esc_html__( 'Thank you for using our plugin! If you are satisfied, please reward it a full five-star %s rating.', 'wpc-product-tabs' ), '<span style="color:#ffb900">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' ); ?>
                                <br/>
                                <a href="<?php echo esc_url( WOOST_REVIEWS ); ?>"
                                   target="_blank"><?php esc_html_e( 'Reviews', 'wpc-product-tabs' ); ?></a> | <a
                                        href="<?php echo esc_url( WOOST_CHANGELOG ); ?>"
                                        target="_blank"><?php esc_html_e( 'Changelog', 'wpc-product-tabs' ); ?></a>
                                | <a href="<?php echo esc_url( WOOST_DISCUSSION ); ?>"
                                     target="_blank"><?php esc_html_e( 'Discussion', 'wpc-product-tabs' ); ?></a>
                            </p>
                        </div>
                        <div class="wpclever_settings_page_nav">
                            <h2 class="nav-tab-wrapper">
                                <a href="<?php echo admin_url( 'admin.php?page=wpclever-woost&tab=global' ); ?>"
                                   class="<?php echo esc_attr( $active_tab === 'global' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>">
									<?php esc_html_e( 'Global Tabs', 'wpc-product-tabs' ); ?>
                                </a>
                                <!--
                                <a href="<?php echo admin_url( 'admin.php?page=wpclever-woost&tab=premium' ); ?>"
                                   class="<?php echo esc_attr( $active_tab === 'premium' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>" style="color: #c9356e">
									<?php esc_html_e( 'Premium Version', 'wpc-product-tabs' ); ?>
                                </a>
                                -->
                                <a href="<?php echo esc_url( WOOST_SUPPORT ); ?>" class="nav-tab" target="_blank">
									<?php esc_html_e( 'Support', 'wpc-product-tabs' ); ?>
                                </a>
                                <a href="<?php echo admin_url( 'admin.php?page=wpclever-kit' ); ?>" class="nav-tab">
									<?php esc_html_e( 'Essential Kit', 'wpc-product-tabs' ); ?>
                                </a>
                            </h2>
                        </div>
                        <div class="wpclever_settings_page_content">
							<?php if ( 'global' === $active_tab ) {
								if ( isset( $_POST['woost_act'] ) && ( 'woost_tabs_save' === $_POST['woost_act'] ) ) {
									if ( isset( $_POST['woost_tabs'] ) ) {
										update_option( 'woost_tabs', self::format_array( $_POST['woost_tabs'] ) );
									} else {
										delete_option( 'woost_tabs' );
									}
								}

								wp_enqueue_editor();
								$saved_tabs = get_option( 'woost_tabs' );

								if ( empty( $saved_tabs ) ) {
									$saved_tabs = array(
										array(
											'type'    => 'description',
											'title'   => esc_html__( 'Description', 'wpc-product-tabs' ),
											'content' => 'auto'
										),
										array(
											'type'    => 'additional_information',
											'title'   => esc_html__( 'Additional Information', 'wpc-product-tabs' ),
											'content' => 'auto'
										),
										array(
											'type'    => 'reviews',
											'title'   => esc_html__( 'Reviews (%d)', 'wpc-product-tabs' ),
											'content' => 'auto'
										)
									);
								}
								?>
                                <form method="post" action="">
                                    <table class="form-table">
                                        <tr>
                                            <td colspan="2" class="woost-tabs-wrapper">
                                                <div class="woost-tabs">
													<?php if ( is_array( $saved_tabs ) && ( count( $saved_tabs ) > 0 ) ) {
														foreach ( $saved_tabs as $saved_tab ) {
															self::tab( $saved_tab );
														}
													} ?>
                                                </div>
												<?php self::new_tab(); ?>
                                            </td>
                                        </tr>
                                        <tr class="submit">
                                            <th colspan="2">
                                                <input type="hidden" name="woost_act" value="woost_tabs_save"/>
                                                <input type="submit" name="submit" class="button button-primary"
                                                       value="<?php esc_html_e( 'Save Changes', 'wpc-product-tabs' ); ?>"/>
                                            </th>
                                        </tr>
                                    </table>
                                </form>
							<?php } elseif ( $active_tab === 'premium' ) { ?>
                                <div class="wpclever_settings_page_content_text">
                                    <p>
                                        Get the Premium Version just $29! <a
                                                href="https://wpclever.net/downloads/product-tabs?utm_source=pro&utm_medium=woost&utm_campaign=wporg"
                                                target="_blank">https://wpclever.net/downloads/product-tabs</a>
                                    </p>
                                    <p><strong>Extra features for Premium Version:</strong></p>
                                    <ul style="margin-bottom: 0">
                                        <li>- Manage tabs at product basis.</li>
                                        <li>- Get the lifetime update & premium support.</li>
                                    </ul>
                                </div>
							<?php } ?>
                        </div>
                    </div>
					<?php
				}

				function add_tab() {
					$type = isset( $_POST['type'] ) ? $_POST['type'] : 'custom';

					switch ( $type ) {
						case 'description':
							$title = esc_html__( 'Description', 'wpc-product-tabs' );
							break;

						case 'additional_information':
							$title = esc_html__( 'Additional Information', 'wpc-product-tabs' );
							break;

						case 'reviews':
							$title = esc_html__( 'Reviews (%d)', 'wpc-product-tabs' );
							break;

						case 'woosb':
							$title = esc_html__( 'WPC Product Bundles', 'wpc-product-tabs' );
							break;

						case 'woosg':
							$title = esc_html__( 'WPC Grouped Product', 'wpc-product-tabs' );
							break;

						case 'wpcpf':
							$title = esc_html__( 'WPC Product FAQs', 'wpc-product-tabs' );
							break;

						case 'wpcbr':
							$title = esc_html__( 'WPC Brands', 'wpc-product-tabs' );
							break;

						default:
							$title = esc_html__( 'Tab title', 'wpc-product-tabs' );
					}

					self::tab( array(
						'editor'  => isset( $_POST['editor'] ) ? $_POST['editor'] : '',
						'type'    => $type,
						'title'   => $title,
						'content' => ''
					), true );

					die();
				}

				function tab( $tab, $new = false ) {
					if ( 'custom' === $tab['type'] ) {
						$woost_editor_id = ! empty( $tab['editor'] ) ? $tab['editor'] : uniqid( 'woost-editor-' );
						?>
                        <div class="woost-tab woost-tab-custom <?php echo( $new ? 'active' : '' ); ?>">
                            <div class="woost-tab-header">
                                <span class="woost-tab-move"><?php esc_html_e( 'move', 'wpc-product-tabs' ); ?></span>
                                <span class="woost-tab-label">#custom</span>
                                <span class="woost-tab-remove"><?php esc_html_e( 'remove', 'wpc-product-tabs' ); ?></span>
                            </div>
                            <div class="woost-tab-content">
                                <div class="woost-tab-line">
                                    <input type="hidden"
                                           name="woost_tabs[type][]"
                                           value="<?php echo esc_attr( $tab['type'] ); ?>"/>
                                    <input type="text"
                                           name="woost_tabs[title][]"
                                           placeholder="<?php esc_attr_e( 'Tab title', 'wpc-product-tabs' ); ?>"
                                           style="width: 100%"
                                           value="<?php echo esc_attr( $tab['title'] ); ?>"
                                           required/>
                                </div>
                                <div class="woost-tab-line">
									<?php
									if ( $new ) {
										echo '<textarea id="' . $woost_editor_id . '" name="woost_tabs[content][]" rows="10"></textarea>';
									} else {
										$content = html_entity_decode( $tab['content'] );
										$content = stripslashes( $content );

										wp_editor( $content, $woost_editor_id, array(
											'textarea_name' => 'woost_tabs[content][]',
											'textarea_rows' => 10
										) );
									}
									?>
                                </div>
                            </div>
                        </div>
					<?php } else { ?>
                        <div class="<?php echo esc_attr( 'woost-tab woost-tab-' . $tab['type'] ); ?> <?php echo esc_attr( $new ? 'active' : '' ); ?>">
                            <div class="woost-tab-header">
                                <span class="woost-tab-move"><?php esc_html_e( 'move', 'wpc-product-tabs' ); ?></span>
                                <span class="woost-tab-label">#<?php echo esc_attr( $tab['type'] ); ?></span>
                                <span class="woost-tab-remove"><?php esc_html_e( 'remove', 'wpc-product-tabs' ); ?></span>
                            </div>
                            <div class="woost-tab-content">
                                <div class="woost-tab-line">
                                    <input type="hidden"
                                           name="woost_tabs[type][]"
                                           value="<?php echo esc_attr( $tab['type'] ); ?>"/>
                                    <input type="text"
                                           name="woost_tabs[title][]"
                                           placeholder="<?php echo esc_attr( $tab['type'] ); ?>"
                                           style="width: 100%"
                                           value="<?php echo esc_attr( $tab['title'] ); ?>"
                                           required/>
                                    <input type="hidden"
                                           name="woost_tabs[content][]"
                                           value="auto"/>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}

				function new_tab() {
					?>
                    <div class="woost-tabs-new">
                        <select class="woost-tab-type">
                            <option value="description"><?php esc_html_e( 'Description', 'wpc-product-tabs' ); ?></option>
                            <option value="additional_information"><?php esc_html_e( 'Additional Information', 'wpc-product-tabs' ); ?></option>
                            <option value="reviews"><?php esc_html_e( 'Reviews (%d)', 'wpc-product-tabs' ); ?></option>
							<?php
							if ( class_exists( 'WPCleverWoosb' ) && ( ( get_option( '_woosb_bundled_position', 'above' ) === 'tab' ) || ( get_option( '_woosb_bundles_position', 'no' ) === 'tab' ) ) ) {
								echo '<option value="woosb">' . esc_html__( 'WPC Product Bundles', 'wpc-product-tabs' ) . '</option>';
							}

							if ( class_exists( 'WPCleverWoosg' ) && ( get_option( '_woosg_position', 'above' ) === 'tab' ) ) {
								echo '<option value="woosg">' . esc_html__( 'WPC Grouped Product', 'wpc-product-tabs' ) . '</option>';
							}

							if ( class_exists( 'WPCleverWpcpf' ) ) {
								echo '<option value="wpcpf">' . esc_html__( 'WPC Product FAQs', 'wpc-product-tabs' ) . '</option>';
							}

							if ( class_exists( 'WPCleverWpcbr' ) && ( get_option( 'wpcbr_single_position', 'after_meta' ) === 'tab' ) ) {
								echo '<option value="wpcbr">' . esc_html__( 'WPC Brands', 'wpc-product-tabs' ) . '</option>';
							}
							?>
                            <option value="custom"><?php esc_html_e( 'Custom', 'wpc-product-tabs' ); ?></option>
                        </select>
                        <input type="button" class="button woost-tab-new"
                               value="<?php esc_attr_e( '+ Add new tab', 'wpc-product-tabs' ); ?>"/>
                    </div>
					<?php
				}

				function format_array( $array ) {
					$formatted_array = array();

					foreach ( array_keys( $array ) as $fieldKey ) {
						foreach ( $array[ $fieldKey ] as $key => $value ) {
							$formatted_array[ $key ][ $fieldKey ] = wp_kses_post( $value );
						}
					}

					return $formatted_array;
				}

				function product_tabs( $tabs ) {
					global $product, $post;

					if ( $product && ( $product_id = $product->get_id() ) ) {
						if ( get_post_meta( $product_id, 'woost_overwrite', true ) === 'on' ) {
							$saved_tabs = get_post_meta( $product_id, 'woost_tabs', true );
						} else {
							$saved_tabs = get_option( 'woost_tabs' );
						}

						if ( is_array( $saved_tabs ) && ( count( $saved_tabs ) > 0 ) ) {
							$saved_tab_has_description = $saved_tab_has_reviews = $saved_tab_has_additional_information = $saved_tab_has_woosb = $saved_tab_has_woosg = $saved_tab_has_wpcpf = $saved_tab_has_wpcbr = false;

							foreach ( $saved_tabs as $key => $saved_tab ) {
								if ( ( ( $saved_tab_type = $saved_tab['type'] ) === 'description' ) || ( $saved_tab_type === 'additional_information' ) || ( $saved_tab_type === 'reviews' ) || ( $saved_tab_type === 'woosb' ) || ( $saved_tab_type === 'woosg' ) || ( $saved_tab_type === 'wpcpf' ) || ( $saved_tab_type === 'wpcbr' ) ) {
									$tabs[ $saved_tab_type ]['title']     = sprintf( $saved_tab['title'], $product->get_review_count() );
									$tabs[ $saved_tab_type ]['priority']  = $key;
									${'saved_tab_has_' . $saved_tab_type} = true;
								} else {
									$tab_slug          = 'woost_tab_' . $key;
									$tabs[ $tab_slug ] = array(
										'title'    => $saved_tab['title'],
										'priority' => $key,
										'callback' => array( $this, 'tab_content' )
									);
								}
							}

							if ( ! $saved_tab_has_description || ! $post->post_content ) {
								unset( $tabs['description'] );
							}

							if ( ! $saved_tab_has_reviews || ! comments_open() ) {
								unset( $tabs['reviews'] );
							}

							if ( ! $saved_tab_has_additional_information || ( ! $product->has_attributes() && ! apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
								unset( $tabs['additional_information'] );
							}

							if ( ! $saved_tab_has_woosb || ! $product->is_type( 'woosb' ) ) {
								unset( $tabs['woosb'] );
							}

							if ( ! $saved_tab_has_woosg || ! $product->is_type( 'woosg' ) ) {
								unset( $tabs['woosg'] );
							}

							if ( ! $saved_tab_has_wpcpf ) {
								unset( $tabs['wpcpf'] );
							}

							if ( ! $saved_tab_has_wpcbr ) {
								unset( $tabs['wpcbr'] );
							}
						}
					}

					return $tabs;
				}

				function tab_content( $name, $tab ) {
					global $product;

					if ( $product && ( $product_id = $product->get_id() ) ) {
						if ( get_post_meta( $product_id, 'woost_overwrite', true ) === 'on' ) {
							$saved_tabs = get_post_meta( $product_id, 'woost_tabs', true );
						} else {
							$saved_tabs = get_option( 'woost_tabs' );
						}

						$tab_id  = (int) preg_replace( '/\D/', '', $name );
						$content = stripslashes( html_entity_decode( $saved_tabs[ $tab_id ]['content'] ) );

						echo apply_filters( 'woost_tab_content', do_shortcode( $content ), $name, $tab );
					}
				}

				function product_data_tabs( $tabs ) {
					$tabs['woost'] = array(
						'label'  => esc_html__( 'Product Tabs', 'wpc-product-tabs' ),
						'target' => 'woost_settings'
					);

					return $tabs;
				}

				function product_data_panels() {
					global $post;
					$post_id    = $post->ID;
					$saved_tabs = get_post_meta( $post_id, 'woost_tabs', true );
					wp_enqueue_editor();
					?>
                    <div id='woost_settings' class='panel woocommerce_options_panel woost_settings'>
                        <div class="woost-overwrite">
                            <input name="woost_overwrite" id="woost_overwrite"
                                   type="checkbox" <?php echo( get_post_meta( $post_id, 'woost_overwrite', true ) === 'on' ? 'checked' : '' ); ?>/>
                            <label for="woost_overwrite"><?php esc_html_e( 'Overwrite default tabs?', 'wpc-product-tabs' ); ?></label>
                            <a href="<?php echo admin_url( 'admin.php?page=wpclever-woost&tab=global' ); ?>"
                               target="_blank"><?php esc_html_e( 'Manager default tabs', 'wpc-product-tabs' ); ?></a>
                        </div>
                        <div class="woost-tabs">
							<?php if ( is_array( $saved_tabs ) && ( count( $saved_tabs ) > 0 ) ) {
								foreach ( $saved_tabs as $saved_tab ) {
									self::tab( $saved_tab );
								}
							} ?>
                        </div>
						<?php self::new_tab(); ?>
                    </div>
					<?php
				}

				function process_product_meta( $post_id ) {
					if ( isset( $_POST['woost_overwrite'] ) ) {
						update_post_meta( $post_id, 'woost_overwrite', 'on' );
					} else {
						update_post_meta( $post_id, 'woost_overwrite', 'off' );
					}

					if ( isset( $_POST['woost_tabs'] ) ) {
						update_post_meta( $post_id, 'woost_tabs', self::format_array( $_POST['woost_tabs'] ) );
					} else {
						delete_post_meta( $post_id, 'woost_tabs' );
					}
				}
			}

			new WPCleverWoost();
		}
	}
} else {
	add_action( 'admin_notices', 'woost_notice_premium' );
}

if ( ! function_exists( 'woost_notice_wc' ) ) {
	function woost_notice_wc() {
		?>
        <div class="error">
            <p><strong>WPC Product Tabs</strong> requires WooCommerce version 3.0 or greater.</p>
        </div>
		<?php
	}
}

if ( ! function_exists( 'woost_notice_premium' ) ) {
	function woost_notice_premium() {
		?>
        <div class="error">
            <p>Seems you're using both free and premium version of <strong>WPC Product Tabs</strong>. Please
                deactivate the free version when using the premium version.</p>
        </div>
		<?php
	}
}
