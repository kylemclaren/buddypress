<?php
/**
 * The template for search results.
 *
 * @package Chum
 */
get_header(); ?>

	<div id="content" class="site-content">

		<?php do_action( 'bp_before_blog_search' ); ?>

		<div class="site-main page" id="blog-search" role="main">

			<h2 class="pagetitle"><span><?php printf( __( 'Search Results for: %s', 'buddypress' ), '' . get_search_query() . '' ); ?></span></h2>

			<?php if (have_posts()) : ?>


				<?php bp_dtheme_content_nav( 'nav-above' ); ?>

				<?php while (have_posts()) : the_post(); ?>

					<?php do_action( 'bp_before_blog_post' ); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="author-box">
							<?php echo get_avatar( get_the_author_meta( 'email' ), '50' ); ?>
							<p><?php printf( _x( 'by %s', 'Post written by...', 'buddypress' ), bp_core_get_userlink( $post->post_author ) ); ?></p>
						</div>

						<div class="post-content">
							<h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'buddypress' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

							<p class="date"><?php printf( __( '%1$s <span>in %2$s</span>', 'buddypress' ), get_the_date(), get_the_category_list( ', ' ) ); ?></p>

							<div class="entry">
								<p><?php $excerpt = get_the_content(); echo wp_trim_words( $excerpt, 100, '&nbsp;[&hellip;]' ); ?></p>
							</div>

							<p class="postmetadata"><?php the_tags( '<span class="tags">' . __( 'Tags: ', 'buddypress' ), ', ', '</span>' ); ?> <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;', 'buddypress' ), __( '1 Comment &#187;', 'buddypress' ), __( '% Comments &#187;', 'buddypress' ) ); ?></span></p>
						</div>

					</div>

					<?php do_action( 'bp_after_blog_post' ); ?>

				<?php endwhile; ?>

				<?php bp_dtheme_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<div id="post-0" class="post page-404 error404 not-found" role="main">
					<h3 class="postsubtitle"><?php _e( 'No posts found. Try a different search?', 'buddypress' ); ?></h3>
					
					<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/">
						<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
						<button type="submit" id="searchsubmit" value="<?php _e( 'Search', 'buddypress' ); ?>"><i class="fa fa-search"></i></button>

						<?php do_action( 'bp_blog_search_form' ); ?>
					</form>
				</div>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_search' ); ?>

		</div>
	</div>

<?php get_footer(); ?>
