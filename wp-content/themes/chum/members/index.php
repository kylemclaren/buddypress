<?php

/**
 * BuddyPress - Members Directory
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

get_header( 'buddypress' ); ?>

	<?php do_action( 'bp_before_directory_members_page' ); ?>

	<div id="content" class="site-content">
		<div class="site-main" role="main">

		<?php do_action( 'bp_before_directory_members' ); ?>

		<form action="" method="post" id="members-directory-form" class="dir-form">

			<h2 class="pagetitle"><span><?php _e( 'Our Members', 'buddypress' ); ?></span></h2>

			<div id="members-dir-list" class="members dir-list">

				<?php locate_template( array( 'members/members-loop.php' ), true ); ?>

			</div><!-- #members-dir-list -->

			<?php do_action( 'bp_directory_members_content' ); ?>

			<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ); ?>

			<?php do_action( 'bp_after_directory_members_content' ); ?>

		</form><!-- #members-directory-form -->

		<?php do_action( 'bp_after_directory_members' ); ?>

		</div> <!-- .site-main -->

		<?php get_template_part('template', 'subfooter'); ?>

	</div> <!-- .site-content -->
	
	<?php do_action( 'bp_after_directory_members_page' ); ?>
<?php get_footer( 'buddypress' ); ?>
