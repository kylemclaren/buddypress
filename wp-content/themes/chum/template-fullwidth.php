<?php
/*
 * Template Name: Template - Full Width
 *
 * A custom page template without sidebar.
 *
 * @package Chum
 */
get_header(); ?>

	<div id="content" class="site-content <?php $check_post = $post->post_content; if(has_shortcode($check_post, 'googleMapStatic')) { echo 'withmap'; } ?>">
		
		<?php do_action( 'bp_before_blog_page' ); ?>

		<div class="site-main" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2 class="pagetitle"><span><?php the_title(); ?></span></h2>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry">

						<?php the_content( __( '<p class="serif">Read the rest of this page &rarr;</p>', 'buddypress' ) ); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages: ', 'buddypress' ), 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
						<?php edit_post_link( __( 'Edit this page.', 'buddypress' ), '<p class="edit-link">', '</p>'); ?>

					</div>

				</article>

			<?php comments_template(); ?>

			<?php endwhile; endif; ?>

			<?php get_template_part('template', 'subfooter'); ?>

		</div><!-- .site-main .page -->

		<?php do_action( 'bp_after_blog_page' ); ?>

	</div> <!-- .site-content -->

<?php get_footer(); ?>