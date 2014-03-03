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

<?php wp_footer(); ?>
</body>
</html>