<?php
/**
 * Template part for display register form on modal.
 *
 * @link      https://codex.wordpress.org/Template_Hierarchy
 *
 * @package   Minimog
 * @since     1.0.0
 * @version   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="minimog-modal modal-user-register" id="modal-user-register"
     data-template="template-parts/modal/modal-content-register">
	<div class="modal-overlay"></div>
	<div class="modal-content">
		<div class="button-close-modal"></div>
		<div class="modal-content-wrap">
			<div class="modal-content-inner">
				<div class="modal-content-header">
					<h3 class="modal-title"><?php esc_html_e( 'Sign Up', 'minimog' ); ?></h3>
					<p class="modal-description">
						<?php printf( esc_html__( 'Get more special offers, deals, manage your account & more.'."\n".'Already have an account? %s Log in %s', 'minimog' ), '<a href="#" class="open-modal-login link-transition-01">', '</a>' ); ?>
					</p>
				</div>

				<div class="modal-content-body">
					<form id="minimog-register-form" class="minimog-register-form" method="post">

						<?php do_action( 'minimog/modal_user_register/before_form_fields' ); ?>

						<div class="form-group">
							<label for="ip_reg_fullname" class="form-label">
								<?php esc_html_e( 'Your Name', 'minimog' ); ?>
							</label>
							<input type="text" id="ip_reg_fullname" class="form-control form-input"
							       name="fullname" placeholder="<?php esc_attr_e( 'Your Name', 'minimog' ); ?>"
							       required>
						</div>

						<div class="form-group">
							<label for="ip_reg_username"
							       class="form-label"><?php esc_html_e( 'Username', 'minimog' ); ?></label>
							<input type="text" id="ip_reg_username" class="form-control form-input"
							       name="username" placeholder="<?php esc_attr_e( 'Username', 'minimog' ); ?>"
							       required/>
						</div>

						<div class="form-group">
							<label for="ip_reg_email"
							       class="form-label"><?php esc_html_e( 'Email', 'minimog' ); ?></label>
							<input type="email" id="ip_reg_email" class="form-control form-input"
							       name="email" placeholder="<?php esc_attr_e( 'Your Email', 'minimog' ); ?>" required/>
						</div>

						<div class="form-group">
							<label for="ip_reg_password"
							       class="form-label"><?php esc_html_e( 'Password', 'minimog' ); ?></label>
							<div class="form-input-group form-input-password">
								<input type="password" id="ip_reg_password" class="form-control form-input"
								       name="password" placeholder="<?php esc_attr_e( 'Password', 'minimog' ); ?>"
								       required autocomplete="off">
								<button type="button" class="btn-pw-toggle" data-toggle="0"
								        aria-label="<?php esc_attr_e( 'Show password', 'minimog' ); ?>">
								</button>
							</div>
						</div>

						<?php
						$privacy_page_id   = get_option( 'wp_page_for_privacy_policy', 0 );
						$privacy_link_html = esc_html__( 'Privacy Policy', 'minimog' );
						if ( $privacy_page_id ) {
							$privacy_link_html = sprintf( '<a href="%1$s" class="minimog-privacy-policy-link" target="_blank">%2$s</a>',
								esc_url( get_permalink( $privacy_page_id ) ),
								$privacy_link_html
							);
						}

						$terms_conditions_page_id   = Minimog::setting( 'page_for_terms_and_conditions', 0 );
						$terms_conditions_link_html = esc_html__( 'Terms of Use', 'minimog' );
						if ( $terms_conditions_page_id ) {
							$terms_conditions_link_html = sprintf( '<a href="%1$s" class="minimog-terms-conditions-link" target="_blank">%2$s</a>',
								esc_url( get_permalink( $terms_conditions_page_id ) ),
								$terms_conditions_link_html
							);
						}
						?>
						<div class="form-group accept-account">
							<label class="form-label form-label-checkbox" for="ip_accept_account">
								<input type="checkbox" id="ip_accept_account" class="form-control"
								       name="accept_account" value="1">
								<?php printf( esc_html__( ' Yes, I agree with the %1$s and %2$s', 'minimog' ), $privacy_link_html, $terms_conditions_link_html ); ?>
							</label>
						</div>

						<?php do_action( 'minimog/modal_user_register/after_form_fields' ); ?>

						<div class="form-response-messages"></div>

						<div class="form-group form-submit-wrap">
							<?php wp_nonce_field( 'user_register', 'user_register_nonce' ); ?>
							<input type="hidden" name="action" value="minimog_user_register">
							<button type="submit"
							        class="button form-submit"><span><?php esc_html_e( ' Free Sign Up', 'minimog' ); ?></span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
