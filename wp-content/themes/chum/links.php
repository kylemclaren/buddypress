<?php
/**
 * The template for displaying links.
 *
 * @package Chum
 */
get_header(); ?>

	<div id="content" class="site-content">
		<div class="site-main page" id="primary" role="main">

		<?php do_action( 'bp_before_blog_links' ); ?>

		<div class="page" id="blog-latest" role="main">

			<h2 class="pagetitle"><?php _e( 'Links', 'buddypress' ); ?></h2>

			<ul id="links-list">
				<?php wp_list_bookmarks(); ?>
			</ul>

		</div>

		<?php do_action( 'bp_after_blog_links' ); ?>

		</div> <!-- #primary -->
	</div> <!-- .site-content -->

<?php get_footer(); ?>
