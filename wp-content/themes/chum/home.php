<?php
/**
 * The template for displaying index page.
 *
 * @package Chum
 */
get_header(); ?>

	<div id="content" class="site-content">

		<?php do_action( 'bp_before_blog_home' ); ?>

		<div class="site-main page" id="bloglist" role="main">

			<h2 class="pagetitle"><span><?php echo get_theme_mod('bn_theme_blogtitle'); ?></span></h2>
			<p style="text-align: center; font-size: 1.25em; padding: 0 6em; margin-bottom: 3em"><?php echo get_theme_mod('bn_theme_blogdesc'); ?></p>

			<?php do_action( 'template_notices' ); ?>

			<?php if ( have_posts() ) : ?>

				<?php bp_dtheme_content_nav( 'nav-above' ); ?>

				<?php while (have_posts()) : the_post(); ?>

					<?php do_action( 'bp_before_blog_post' ); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if( has_post_thumbnail() ) : ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
							<div class="post-img" style="background-image:url(<?php echo $image[0]; ?>)"><a href="<?php the_permalink(); ?>" rel="bookmark"></a></div>
						<?php else : ?>
							<div class="post-img"><a href="<?php the_permalink(); ?>" rel="bookmark"></a></div>
						<?php endif; ?>

						<div class="post-content">
							<h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'buddypress' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

							<div class="entry">
								<p><?php $excerpt = get_the_content(); echo wp_trim_words( $excerpt, 25, '&nbsp;[&hellip;]' ); ?></p>
								<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages: ', 'buddypress' ), 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
							</div>
						</div>

					</article>

					<?php do_action( 'bp_after_blog_post' ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<h2 class="center"><?php _e( 'Not Found', 'buddypress' ); ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'buddypress' ); ?></p>

				<?php get_search_form(); ?>

			<?php endif; ?>

			<?php include('template-subfooter.php'); ?>

		</div><!-- .page -->

		<?php do_action( 'bp_after_blog_home' ); ?>

	</div>
<?php get_footer(); ?>
