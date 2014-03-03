<?php

/**
 * BuddyPress - Users Plugins
 *
 * This is a fallback file that external plugins can use if the template they
 * need is not installed in the current theme. Use the actions in this template
 * to output everything your plugin needs.
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php get_header( 'buddypress' ); ?>
	
	<header id="profile-header">
		<div class="wrap">
			<div id="item-header" role="complementary">
				<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>
			</div><!-- #item-header -->
		</div>
		<div id="profile-nav">
			<nav class="item-list-tabs no-ajax wrap" role="navigation">
				<ul>
					<?php bp_get_displayed_user_nav(); ?>
					<?php do_action( 'bp_member_options_nav' ); ?>
				</ul>
			</nav>
		</div><!-- #item-nav -->
	</header>

	<div id="content" class="site-content">
		<div class="site-main" id="primary" role="main">

			<?php do_action( 'bp_before_member_plugin_template' ); ?>

			<div id="item-body" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>

				<div class="item-list-tabs no-ajax" id="subnav">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_member_plugin_options_nav' ); ?>

					</ul>
				</div><!-- .item-list-tabs -->

				<h3><?php do_action( 'bp_template_title' ); ?></h3>

				<?php do_action( 'bp_template_content' ); ?>

				<?php do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_plugin_template' ); ?>

		</div> <!-- #primary -->
		<?php get_sidebar( 'buddypress' ); ?>
	</div> <!-- .site-content -->

<?php get_footer( 'buddypress' ); ?>
