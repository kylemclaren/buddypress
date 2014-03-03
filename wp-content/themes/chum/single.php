<?php
/**
 * The template for displaying single post.
 *
 * @package Chum
 */
get_header(); ?>

	<div id="content" class="site-content">
		<div class="site-main page" id="primary" role="main">

			<?php do_action( 'bp_before_blog_single_post' ); ?>

			<div class="page" id="blog-single" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="post-content">
						<h2 class="posttitle"><?php the_title(); ?></h2>

						<div class="entry-meta">
							<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

								$time_string = sprintf( $time_string,
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_attr( get_the_modified_date( 'c' ) ),
									esc_html( get_the_modified_date() )
								);
								printf( '<span class="posted-on"><a href="%1$s" rel="bookmark"><i class="fa fa-clock-o"></i>%2$s</a></span>',
									esc_url( get_permalink() ),
									$time_string
								);
							?>

							<?php printf( '<span class="author vcard"><a class="url fn n" href="%1$s"><i class="fa fa-user"></i>%2$s</a></span>',
								esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
								esc_html( get_the_author() )
							); ?>
							<span class="comment_count">
								<a href="<?php echo get_comments_link( $post->ID ); ?>"><i class="fa fa-comments"></i><?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></a>
							</span>
							<?php edit_post_link( __( 'Edit', 'wisteria' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
						</div><!-- .entry-meta -->

						<?php if( has_post_thumbnail() ) : ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
							<div class="entry-img" style="background-image:url(<?php echo $image[0]; ?>)"></div>
						<?php else : ?>
							<div class="entry-img"></div>
						<?php endif; ?>

						<div class="entry">
							<?php the_content( __( 'Read the rest of this entry &rarr;', 'buddypress' ) ); ?>

							<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages: ', 'buddypress' ), 'after' => '</p></div>', 'next_or_number' => 'number' ) ); ?>
						</div>
						<div class="navigation">
							<div class="alignleft"><?php previous_post_link( '%link', '&nbsp;' . _x( '<i class="fa fa-arrow-circle-left"></i>', 'Previous post link', 'buddypress' ) . ' %title' ); ?></div>
							<div class="alignright"><?php next_post_link( '%link', '%title ' . _x( '<i class="fa fa-arrow-circle-right"></i>', 'Next post link', 'buddypress' ) . '&nbsp;' ); ?></div>
						</div>
					</div>

				</div>

			<?php comments_template(); ?>

			<?php endwhile; else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.', 'buddypress' ); ?></p>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_blog_single_post' ); ?>

		
		</div> <!-- #primary -->
		<?php get_sidebar(); ?>
	</div> <!-- .site-content -->
<?php get_footer(); ?>