<?php
/**
 * Template Name: Template - Page w/ Registration Banner
 * A custom page template with registration form.
 * @package Chum
 */
get_header(); ?>
	</div>

	<?php if ( !is_user_logged_in() ) : ?>
	<div id="register-banner">
		<div class="wrap">
			<!--
			<div class="register-form">
				<?php// get_template_part( 'form', 'register' ); ?>
			</div>
			-->
			<div class="register-info">
				<h2>Hello!</h2>
				<h3>CONNECT WITH YOUR FRIENDS<br/>AROUND THE WORLD</h3>
				<p>Register on your site and start creating profiles,<br/> posting messages, making connections, creating and<br/>interacting in groupsand much more...</p>
				<a href="" class="button button-green button-large">Sign In</a>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div id="content" class="site-content with-banner">
		<div class="site-main" role="main">
			<?php do_action( 'bp_before_blog_page' ); ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php if ( !is_front_page() ) : ?>
					<h2 class="pagetitle"><?php the_title(); ?></h2>
					<?php endif; ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry">

							<?php the_content( __( '<p class="serif">Read the rest of this page &rarr;</p>', 'buddypress' ) ); ?>

							<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages: ', 'buddypress' ), 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>

						</div>

					</div>

				<?php endwhile; endif; ?>
			<?php do_action( 'bp_after_blog_page' ); ?>

			<div id="bloglist" style="margin-top: 3em; clear: both;">

				<h2 class="pagetitle"><span><?php echo get_theme_mod('bn_theme_blogtitle'); ?></span></h2>
				<p style="text-align: center; font-size: 1.25em; padding: 0 6em; margin-bottom: 3em"><?php echo get_theme_mod('bn_theme_blogdesc'); ?></p>

				<?php
					$args = array('post_type' => 'post', 'posts_per_page' => 6, 'ignore_sticky_posts' => 1);
					$blog_query = new WP_Query( $args );
				?>
				<?php if ( $blog_query->have_posts() ) : ?>

					<?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

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
				<?php wp_reset_postdata(); ?>

			</div><!-- #bloglist -->

		<?php include('template-subfooter.php'); ?>

		</div> <!-- .site-main -->
	</div> <!-- .site-content -->
	
<?php get_footer(); ?>