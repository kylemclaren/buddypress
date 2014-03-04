<?php
/**
 * Template Name: Template - Right Sidebar
 *
 * @package Chum
 */
get_header(); ?>

	<div id="content" class="site-content">

		<?php get_sidebar(); ?>

		<?php do_action( 'bp_before_blog_page' ); ?>

		<div class="site-main" id="primary" role="main" style="margin-right:0; margin-left:2%;">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<h2 class="pagetitle"><span><?php the_title(); ?></span></h2>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry">

						<?php the_content( __( '<p class="serif">Read the rest of this page &rarr;</p>', 'buddypress' ) ); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages: ', 'buddypress' ), 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
						<?php edit_post_link( __( 'Edit this page.', 'buddypress' ), '<p class="edit-link">', '</p>'); ?>

					</div>

				</div>

			<?php comments_template(); ?>

			<?php endwhile; endif; ?>

		</div><!-- .site-main .page -->

		<?php do_action( 'bp_after_blog_page' ); ?>
		
		<?php get_template_part('template', 'subfooter'); ?>

	</div> <!-- .site-content -->

<?php get_footer(); ?>
