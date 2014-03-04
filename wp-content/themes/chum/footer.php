<?php
/**
 * The template for displaying Footer.
 *
 * @package Chum
 */
?>

		<?php do_action( 'bp_after_container' ); ?>

	</div> <!-- site -->

	<?php do_action( 'bp_before_footer'   ); ?>

	<footer id="footer">
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ) || is_active_sidebar( 'third-footer-widget-area' ) || is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
			<div id="footer-widget-area" role="complementary">
				<div class="wrap">
					<?php get_sidebar( 'footer' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<div id="site-generator" role="contentinfo">
			<?php do_action( 'bp_dtheme_credits' ); ?>
			<p><?php printf( __( 'Proudly powered by <a href="%1$s">WordPress</a> and <a href="%2$s">BuddyPress</a>.', 'buddypress' ), 'http://wordpress.org', 'http://buddypress.org' ); ?> | <?php printf( __( 'Theme: %1$s by %2$s', 'chum' ), 'Chum!', '<a href="http://www.attsu.co.jp/" rel="designer" target="_blank">ATTSU Inc.</a>' ); ?></p>
		</div>
		<?php do_action( 'bp_footer' ); ?>
	</footer>
	<?php do_action( 'bp_after_footer' ); ?>

<script>
	jQuery(document).ready(function($) {
		$('#login').on('click', function(){
			$('#login-form').addClass('show');
			return false;
		});
		$('.md-overlay').on('click', function(){
			$(this).removeClass('show');
		});
		$(document).keyup(function(e) {
			if(e.which == 27){
				$('.md-overlay').removeClass('show');
			}
		});
	});
</script>
<!-- Custom Modal Overlay -->
<div id="login-form" class="md-overlay"></div>
<div class="md-content">
	<div class="login-form">

		<?php if ( !is_user_logged_in() ) : ?>

			<?php do_action( 'bp_before_sidebar_login_form' ); ?>

			<?php if ( bp_get_signup_allowed() ) : ?>
			
				<div id="login-text">

					<h2 class="login-title">Create an Account</h2>
					<p><?php print( __('Start connecting with your friends and love ones with chum.', 'buddypress') ); ?></p>
					<p><?php print( __('Register your account now!', 'buddypress') ); ?></p>
					<a class="button button-red" href="<?php echo bp_get_signup_page(); ?>" title="Create an account">Sign Up</a>

				</div>

			<?php endif; ?>

			<form name="login-form" id="sidebar-login-form" class="standard-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ); ?>" method="post">
				<h2 class="login-title">Sign-in to your account</h2>
				<label>
					<span><?php _e( 'Username', 'buddypress' ); ?></span>
					<input type="text" name="log" id="sidebar-user-login" class="input" value="<?php if ( isset( $user_login) ) echo esc_attr(stripslashes($user_login)); ?>" tabindex="97" />
				</label>

				<label>
					<span><?php _e( 'Password', 'buddypress' ); ?></span>
					<input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" tabindex="98" />
				</label>

				<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="99" /> <?php _e( 'Remember Me', 'buddypress' ); ?></label></p>

				<input type="submit" name="wp-submit" id="sidebar-wp-submit" class="button button-red" value="<?php _e( 'Log In', 'buddypress' ); ?>" tabindex="100" />

				<?php do_action( 'bp_sidebar_login_form' ); ?>

			</form>

			<?php do_action( 'bp_after_sidebar_login_form' ); ?>

		<?php endif; ?>
	</div> <!--.login-form -->
</div> <!--.md-content -->

<?php wp_footer(); ?>
</body>
</html>